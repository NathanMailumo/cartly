<x-layout>
    <x-slot:title>easybuy · Checkout</x-slot:title>

    <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        
        <!-- Header -->
        <div class="flex items-center justify-between pb-6 mb-8 border-b border-gray-200">
            <div>
                <p class="text-xs font-bold tracking-widest uppercase text-gray-500 mb-1">CHECKOUT</p>
                <h1 class="text-3xl sm:text-4xl font-serif text-gray-950 font-normal">Complete your order</h1>
            </div>
            <a href="{{ route('buyer.cart') }}" class="text-sm font-medium text-gray-600 hover:text-black transition flex items-center gap-1.5">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Return to Bag</span>
            </a>
        </div>

        @if($errors->any())
            <div class="mb-8 border border-red-200 bg-red-50 p-4 rounded-sm text-red-800" role="alert">
                <div class="flex items-start gap-3">
                    <i class="fa-solid fa-circle-exclamation mt-0.5 text-red-600"></i>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider">Please fix the following issues:</p>
                        <ul class="mt-1.5 space-y-1 text-xs">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        @if($cartItems->isEmpty())
            <div class="bg-white border border-gray-200 p-16 text-center rounded-sm">
                <i class="fa-solid fa-bag-shopping text-4xl text-gray-300 mb-3"></i>
                <p class="text-lg text-gray-600 font-serif">Your bag is empty.</p>
                <a href="{{ route('buyer.browse') }}" class="inline-block mt-4 px-6 py-2.5 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs rounded transition shadow-sm">
                    Browse Products
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                
                <!-- Left Column: Delivery & Payment Details Form (7 cols) -->
                <form id="checkout-form" method="POST" action="{{ route('payment.initialize') }}" class="lg:col-span-7 space-y-8">
                    @csrf
                    
                    <!-- Delivery Details Card -->
                    <section class="bg-white border border-gray-200 p-6 sm:p-8 rounded-sm shadow-sm">
                        <div class="flex items-center gap-2.5 pb-4 mb-6 border-b border-gray-200">
                            <i class="fa-solid fa-location-dot text-gray-900"></i>
                            <h2 class="text-xl font-serif font-bold text-gray-900">Delivery Details</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">First Name</label>
                                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" placeholder="John" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                            </div>
                            <div>
                                <label for="last_name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">Last Name</label>
                                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name" placeholder="Doe" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="shipping_address" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">Delivery Address</label>
                                <textarea id="shipping_address" name="shipping_address" rows="3" required autocomplete="street-address" placeholder="House number, street name, area" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">{{ old('shipping_address', Auth::user()->buyer->shipping_address ?? '') }}</textarea>
                            </div>
                            <div>
                                <label for="phone_number" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">Mobile Number</label>
                                <input id="phone_number" type="tel" name="phone_number" value="{{ old('phone_number', Auth::user()->buyer->phone_number ?? '') }}" required autocomplete="tel" placeholder="0800 000 0000" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                            </div>
                            <div>
                                <label for="delivery_city" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">City</label>
                                <input id="delivery_city" type="text" name="delivery_city" value="{{ old('delivery_city') }}" required autocomplete="address-level2" placeholder="Lagos" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                            </div>
                            <div>
                                <label for="delivery_state" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">State</label>
                                <input id="delivery_state" type="text" name="delivery_state" value="{{ old('delivery_state') }}" required autocomplete="address-level1" placeholder="Lagos State" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                            </div>
                            <div>
                                <label for="zip_code" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">Postal Code</label>
                                <input id="zip_code" type="text" name="zip_code" value="{{ old('zip_code') }}" autocomplete="postal-code" placeholder="100001" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="country" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">Country</label>
                                <select id="country" name="country" class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-black transition">
                                    <option value="Nigeria" selected>Nigeria</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    <!-- Payment Method Section -->
                    <section class="bg-white border border-gray-200 p-6 sm:p-8 rounded-sm shadow-sm">
                        <div class="flex items-center gap-2.5 pb-4 mb-6 border-b border-gray-200">
                            <i class="fa-solid fa-credit-card text-gray-900"></i>
                            <h2 class="text-xl font-serif font-bold text-gray-900">Payment Method</h2>
                        </div>

                        <div class="space-y-3" id="payment-options">
                            <label class="payment-option flex items-start gap-3 border-2 border-black bg-amber-50/50 p-4 rounded-sm cursor-pointer transition">
                                <input type="radio" name="payment_method" value="paystack" checked class="mt-1 accent-black">
                                <div>
                                    <span class="block text-sm font-bold text-gray-900"><i class="fa-solid fa-credit-card mr-2 text-gray-700"></i>Paystack (Instant Card / Bank / USSD)</span>
                                    <span class="block text-xs text-gray-600 mt-0.5">Pay securely with Debit Card, Bank Transfer, or USSD via Paystack.</span>
                                </div>
                            </label>

                            <label class="payment-option flex items-start gap-3 border border-gray-200 bg-white p-4 rounded-sm cursor-pointer hover:border-black transition">
                                <input type="radio" name="payment_method" value="bank_transfer" class="mt-1 accent-black">
                                <div>
                                    <span class="block text-sm font-bold text-gray-900"><i class="fa-solid fa-building-columns mr-2 text-gray-700"></i>Direct Bank Transfer</span>
                                    <span class="block text-xs text-gray-600 mt-0.5">Receive account transfer details upon placing your order.</span>
                                </div>
                            </label>

                            <label class="payment-option flex items-start gap-3 border border-gray-200 bg-white p-4 rounded-sm cursor-pointer hover:border-black transition">
                                <input type="radio" name="payment_method" value="cash_on_delivery" class="mt-1 accent-black">
                                <div>
                                    <span class="block text-sm font-bold text-gray-900"><i class="fa-solid fa-money-bill-wave mr-2 text-gray-700"></i>Cash on Delivery</span>
                                    <span class="block text-xs text-gray-600 mt-0.5">Pay cash when your order arrives at your doorstep.</span>
                                </div>
                            </label>
                        </div>

                        <p id="payment-note" class="mt-4 text-xs text-gray-500 italic">
                            <i class="fa-solid fa-lock mr-1"></i> You will be redirected to Paystack's encrypted gateway to complete payment.
                        </p>
                    </section>

                </form>

                <!-- Right Column: Order Summary (5 cols) -->
                <aside class="lg:col-span-5 sticky top-24">
                    <div class="bg-white border border-gray-200 p-6 sm:p-8 shadow-sm">
                        <h2 class="text-xl font-serif font-bold text-gray-900 pb-4 mb-4 border-b border-gray-200">
                            Order Summary
                        </h2>

                        <!-- Items list -->
                        <div class="divide-y divide-gray-100 max-h-64 overflow-y-auto pr-1">
                            @foreach($cartItems as $item)
                                <div class="py-3 flex items-center justify-between gap-3 text-sm">
                                    <div class="min-w-0 flex-1">
                                        <p class="font-medium text-gray-900 truncate">{{ $item->products->productname }}</p>
                                        <span class="text-xs text-gray-500">Qty: {{ $item->quantity }}</span>
                                    </div>
                                    <span class="font-semibold text-gray-900 whitespace-nowrap">
                                        &#8358;{{ number_format(($item->products->productprice ?? 0) * $item->quantity) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-200 pt-4 mt-4 space-y-2 text-xs text-gray-600">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span class="font-semibold text-gray-900">&#8358;{{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span class="text-emerald-700 font-medium">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Protection</span>
                                <span class="text-emerald-700 font-medium">Included</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-4 mt-4 flex items-baseline justify-between">
                            <span class="text-base font-semibold text-gray-900">Total</span>
                            <span class="text-2xl font-serif font-bold text-gray-950">&#8358;{{ number_format($total) }}</span>
                        </div>

                        <button id="checkout-submit" form="checkout-form" type="submit" 
                                class="w-full mt-6 py-3.5 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-sm rounded-sm transition flex items-center justify-center gap-2 shadow-sm cursor-pointer">
                            <span>Proceed to Payment</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </button>

                        <div class="mt-6 pt-4 border-t border-gray-100 text-[11px] text-gray-400 space-y-1">
                            <div class="flex items-center gap-1.5">
                                <i class="fa-solid fa-shield-halved text-gray-500"></i>
                                <span>256-bit SSL encrypted checkout</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <i class="fa-solid fa-truck-fast text-gray-500"></i>
                                <span>Fast dispatch across Nigeria</span>
                            </div>
                        </div>
                    </div>
                </aside>

            </div>
        @endif
    </div>

    <script>
        document.querySelectorAll('input[name="payment_method"]').forEach(function (option) {
            option.addEventListener('change', function () {
                document.querySelectorAll('.payment-option').forEach(el => {
                    el.classList.remove('border-2', 'border-black', 'bg-amber-50/50');
                    el.classList.add('border', 'border-gray-200', 'bg-white');
                });
                this.closest('.payment-option').classList.remove('border', 'border-gray-200', 'bg-white');
                this.closest('.payment-option').classList.add('border-2', 'border-black', 'bg-amber-50/50');

                const submit = document.getElementById('checkout-submit');
                const note = document.getElementById('payment-note');
                const isCash = this.value === 'cash_on_delivery';

                submit.querySelector('span').textContent = isCash ? 'Place Order' : 'Proceed to Payment';
                note.innerHTML = isCash
                    ? '<i class="fa-solid fa-truck mr-1"></i> Pay cash when your order is delivered to your door.'
                    : '<i class="fa-solid fa-lock mr-1"></i> You will be taken to Paystack\'s encrypted gateway to complete payment.';
            });
        });
    </script>
</x-layout>
