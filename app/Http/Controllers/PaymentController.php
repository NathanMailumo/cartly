<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class PaymentController extends Controller
{
    public function pay()
    {
        return view('pay.index');
    }

    // public function make_payment()
    // {

    // }
    public function initialize_payment(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:30',
            'shipping_address' => 'required|string|max:500',
            'delivery_city' => 'required|string|max:100',
            'delivery_state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'payment_method' => 'required|in:paystack',
        ]);

        $cartItems = cart::where('buyer_id', Auth::id())
            ->with('products')
            ->get();

        abort_if($cartItems->isEmpty(), 422, 'Your cart is empty.');

        // Recalculate the amount from current database prices; never trust a browser total.
        $total = $cartItems->sum(function ($item) {
            return ($item->products->productprice ?? 0) * $item->quantity;
        });

        $formData = [
            'email' => Auth::user()->email,
            'amount' => $total * 100,
            'reference' => 'EASYBUY-' . strtoupper(uniqid()),
            'callback_url' => config('services.paystack.callback_url'),
            'metadata' => [
                'user_id' => Auth::id(),
                'payment_method' => 'paystack',
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone_number' => $validated['phone_number'],
                'shipping_address' => $validated['shipping_address'],
                'delivery_city' => $validated['delivery_city'],
                'delivery_state' => $validated['delivery_state'],
                'zip_code' => $validated['zip_code'],
                'country' => $validated['country'],
            ],
        ];
        $response = Http::withToken(config('services.paystack.secret'))
            ->acceptJson()
            ->post('https://api.paystack.co/transaction/initialize', $formData);

        if ($response->failed() || ! $response->json('status')) {
            return back()
                ->withInput()
                ->withErrors([
                    'payment' => $response->json('message', 'Unable to initialize Paystack payment.'),
                ]);
        }

        return redirect()->away($response->json('data.authorization_url'));
    }
    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        if (! $reference) {
            return redirect()->route('buyer.checkout')
                ->withErrors(['payment' => 'No Paystack payment reference was received.']);
        }

            if (session('completed_payment.reference') === $reference) {
                return redirect()->route('buyer.order')
                ->with('success', 'Payment confirmed successfully.');
            }

        $response = Http::withToken(config('services.paystack.secret'))
            ->acceptJson()
            ->get('https://api.paystack.co/transaction/verify/' . urlencode($reference));

        if ($response->failed() || ! $response->json('status')) {
            return redirect()->route('buyer.checkout')
                ->withErrors(['payment' => $response->json('message', 'Unable to verify payment.')]);
        }

        $transaction = $response->json('data');

        if (($transaction['status'] ?? null) !== 'success') {
            return redirect()->route('buyer.checkout')
                ->withErrors(['payment' => 'Payment was not successful.']);
        }

        if ((int) ($transaction['metadata']['user_id'] ?? 0) !== (int) Auth::id()) {
            return redirect()->route('buyer.checkout')
                ->withErrors(['payment' => 'This payment does not belong to the authenticated buyer.']);
        }

        $cartItems = cart::where('buyer_id', Auth::id())
            ->with('products')
            ->get();

        $total = $cartItems->sum(function ($item) {
            return ($item->products->productprice ?? 0) * $item->quantity;
        });

        if ((int) ($transaction['amount'] ?? 0) !== $total * 100) {
            return redirect()->route('buyer.checkout')
                ->withErrors(['payment' => 'The verified payment amount does not match the current cart total.']);
        }

        $orderItems = $cartItems->map(function ($item) {
            return [
                'productname' => $item->products->productname,
                'description' => $item->products->description,
                'unit_price' => $item->products->productprice ?? 0,
                'quantity' => $item->quantity,
            ];
        })->values()->all();

        session()->put('completed_payment', [
            'reference' => $reference,
            'cart_items' => $orderItems,
            'subtotal' => $total,
            'total' => $total,
            'payment_method' => 'Paystack',
            'customer_name' => trim(($transaction['metadata']['first_name'] ?? '') . ' ' . ($transaction['metadata']['last_name'] ?? '')),
            'phone_number' => $transaction['metadata']['phone_number'] ?? null,
            'shipping_address' => $transaction['metadata']['shipping_address'] ?? null,
            'delivery_city' => $transaction['metadata']['delivery_city'] ?? null,
            'delivery_state' => $transaction['metadata']['delivery_state'] ?? null,
            'country' => $transaction['metadata']['country'] ?? 'Nigeria',
            'paid_at' => now()->toDateTimeString(),
        ]);

        cart::where('buyer_id', Auth::id())->delete();

        return redirect()->route('buyer.order')->with('success', 'Payment confirmed successfully.');
    }
}
