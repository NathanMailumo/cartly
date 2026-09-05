<x-layout>
    <x-slot:title>Order Details</x-slot:title>

    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Top Navigation & Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-800 gap-4 mb-8">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-500 mb-2">
                    <a href="{{ route('buyer.dashboard') }}" class="hover:text-amber-400 transition">Shop</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <a href="{{ route('buyer.cart') }}" class="hover:text-amber-400 transition">Shopping Cart</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-slate-300">Order</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight flex items-center gap-3">
                    <i class="fa-solid fa-box-open text-amber-500"></i>
                    Your Order
                </h1>
            </div>

            <a href="{{ route('buyer.cart') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-amber-400 transition py-2 px-3.5 rounded-xl bg-slate-900 border border-slate-800 hover:border-slate-700 self-start sm:self-auto">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Cart
            </a>
        </div>

        {{-- Ordered Products List with Estimated Delivery Date Underneath --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl mb-8">
            <div class="flex items-center justify-between pb-5 border-b border-slate-800 mb-6">
                <div>
                    <h2 class="text-lg sm:text-xl font-bold text-white tracking-tight">Ordered Items</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Summary of products and estimated arrival date</p>
                </div>
                <span class="text-xs font-bold bg-slate-800 text-amber-400 px-3 py-1.5 rounded-full border border-slate-700">
                    {{ $cartItems->sum('quantity') }} {{ Str::plural('Item', $cartItems->sum('quantity')) }}
                </span>
            </div>

            @if($cartItems->isNotEmpty())
                <div class="divide-y divide-slate-800/80">
                    @foreach($cartItems as $item)
                        @php
                            $product = $item->products;
                            $unitPrice = $product->productprice ?? 0;
                            $lineTotal = $unitPrice * $item->quantity;
                        @endphp
                        <div class="py-5 first:pt-0 last:pb-0 flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                            {{-- Product Details --}}
                            <div class="flex items-start gap-4 min-w-0 flex-1">
                                <div class="w-16 h-16 rounded-xl bg-slate-950 border border-slate-800 overflow-hidden shrink-0 flex items-center justify-center relative shadow-sm">
                                    @if(!empty($product->image_url))
                                        <img src="{{ $product->image_url }}" alt="{{ $product->productname ?? 'Product' }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fa-solid fa-box text-amber-500/70 text-xl"></i>
                                    @endif
                                </div>

                                <div class="min-w-0 flex-1">
                                    <h3 class="text-base font-bold text-white truncate">
                                        {{ $product->productname ?? 'Product Item' }}
                                    </h3>

                                    <div class="flex flex-wrap items-center gap-2 mt-1">
                                        <span class="text-[11px] font-semibold text-amber-400 bg-amber-500/10 px-2 py-0.5 rounded-md border border-amber-500/20">
                                            {{ $product->category->categoryname ?? 'General' }}
                                        </span>
                                        <span class="text-xs text-slate-400">
                                            Qty: <strong class="text-white">{{ $item->quantity }}</strong>
                                        </span>
                                        <span class="text-slate-600">•</span>
                                        <span class="text-xs text-slate-400">
                                            ${{ number_format($unitPrice, 2) }} each
                                        </span>
                                    </div>

                                    {{-- Estimated Delivery Date Underneath Product --}}
                                    <div class="mt-3 inline-flex items-center gap-2 text-xs text-amber-400 bg-amber-500/10 border border-amber-500/20 px-3 py-1.5 rounded-lg">
                                        <i class="fa-solid fa-truck-fast text-[11px]"></i>
                                        <span>Estimated Delivery: <strong class="text-white">{{ $estimatedDate }}</strong></span>
                                    </div>
                                </div>
                            </div>

                            {{-- Price Total for Product --}}
                            <div class="sm:text-right shrink-0 pt-1">
                                <span class="text-lg font-black text-white block">
                                    ${{ number_format($lineTotal, 2) }}
                                </span>
                                <span class="text-[11px] text-emerald-400 font-semibold flex items-center gap-1 sm:justify-end mt-0.5">
                                    <i class="fa-solid fa-check text-[10px]"></i> Free Shipping
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Concise Order Total --}}
                <div class="mt-6 pt-6 border-t border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-950/60 rounded-2xl p-4 sm:p-5 border border-slate-800/80">
                    <div class="text-xs text-slate-400 space-y-1">
                        <div>Items Total: <strong class="text-white">${{ number_format($subtotal, 2) }}</strong></div>
                        <div>Shipping: <strong class="text-emerald-400">FREE</strong></div>
                    </div>

                    <div class="flex items-baseline justify-between sm:justify-end gap-3 pt-2 sm:pt-0 border-t sm:border-t-0 border-slate-800">
                        <span class="text-sm font-bold text-slate-300">Total:</span>
                        <span class="text-2xl font-black text-amber-400">
                            ${{ number_format($total, 2) }}
                        </span>
                    </div>
                </div>
            @else
                {{-- Empty state if no items --}}
                <div class="text-center py-10">
                    <div class="w-16 h-16 rounded-2xl bg-slate-800/80 border border-slate-700 flex items-center justify-center text-slate-500 text-2xl mx-auto mb-4">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <h3 class="text-base font-bold text-white mb-1">No items in your order</h3>
                    <p class="text-xs text-slate-400 mb-6 max-w-sm mx-auto">
                        Your shopping cart is currently empty. Browse products to place an order.
                    </p>
                    <a href="{{ route('buyer.browse') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl text-xs transition shadow-lg shadow-amber-500/20">
                        <i class="fa-solid fa-border-all"></i>
                        Browse Products
                    </a>
                </div>
            @endif
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('buyer.browse') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-200 hover:text-white font-bold text-sm border border-slate-800 hover:border-slate-700 transition shadow">
                <i class="fa-solid fa-bag-shopping text-amber-500"></i>
                Continue Shopping
            </a>

            <a href="{{ route('buyer.dashboard') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-black text-sm transition shadow-lg shadow-amber-500/20 active:scale-[0.99]">
                <i class="fa-solid fa-house text-xs"></i>
                Buyer Dashboard
            </a>
        </div>
    </div>
</x-layout>
