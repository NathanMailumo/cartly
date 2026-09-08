<x-layout>
    <x-slot:title>Your Selection · Order Form</x-slot:title>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

        <!-- Top Header & Navigation -->
        <div class="flex items-center justify-between py-2 border-b border-[#231f1d] text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#5e5953]">
            <a href="{{ route('buyer.dashboard') }}" class="hover:text-[#161413] transition flex items-center gap-1.5 font-bold">
                <span>&larr;</span>
                <span>Continue Shopping</span>
            </a>
            <span class="hidden sm:inline font-semibold text-[#161413]">✦ Complimentary Shipping on All Orders ✦</span>
            {{-- <span class="hidden sm:inline">U.S. Edition</span> --}}
        </div>

        {{-- <!-- Centered Masthead -->
        <div class="text-center py-6">
            <a href="{{ route('buyer.dashboard') }}" class="inline-block">
                <h1 class="font-masthead text-5xl sm:text-7xl lg:text-8xl font-black text-[#161413] tracking-tight hover:opacity-90 transition">
                    Easybuy
                </h1>
            </a>
            <p class="font-editorial-sans text-[9px] sm:text-[10px] tracking-[0.3em] uppercase text-[#6e6860] mt-1">
                Luxury Fashion · Authenticated & Curated
            </p>
        </div>

        <!-- Issue Ribbon -->
        <div class="border-t-2 border-b border-[#231f1d] py-1.5 text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#5e5953] flex items-center justify-between mb-6">
            <span>{{ date('l, F j, Y') }}</span>
            <span class="font-bold text-[#161413]">✦ Paris · London · New York ✦</span>
            <span>U.S. Edition</span>
        </div> --}}

        <!-- Order Form Banner Box -->
        <div class="border-2 border-[#231f1d] p-3 text-center mb-8 bg-[#faf8f4]">
            <h2 class="font-editorial-sans text-xs sm:text-sm font-bold tracking-[0.25em] uppercase text-[#161413]">
                ✦ Your Selection — Order Form ✦
            </h2>
            <div class="text-[9px] font-editorial-sans tracking-[0.25em] uppercase text-[#787167] mt-0.5">
                Reserved for Collection · Authentication Guaranteed
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-6 p-3 border border-[#231f1d] bg-[#f0ebe1] text-[#161413] text-xs font-serif-body">
                ✦ {{ session('success') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <!-- Empty State -->
            <div class="border border-[#231f1d] bg-[#faf8f4] p-12 text-center my-8">
                <h3 class="font-masthead text-2xl text-[#161413] mb-2">Your Archive Selection is Empty</h3>
                <p class="font-serif-body italic text-sm text-[#5e5953] mb-6">
                    No acquisitions have been selected for your order form yet.
                </p>
                <a href="{{ route('buyer.dashboard') }}" 
                   class="inline-block px-6 py-3 bg-[#1a1918] text-[#f7f4ee] font-editorial-sans text-xs uppercase tracking-[0.2em] hover:bg-black transition">
                    Explore Acquisitions &rarr;
                </a>
            </div>
        @else
            @php
                $subtotal = 0;
                foreach ($cartItems as $item) {
                    $itemPrice = $item->products->productprice ?? 0;
                    $subtotal += $itemPrice * $item->quantity;
                }
                $shipping = 0.00; // Complimentary
                $total = $subtotal + $shipping;
                $totalCount = $cartItems->sum('quantity');
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-12">

                <!-- Main Order Form Ledger Table (8 cols on lg) -->
                <div class="lg:col-span-8 overflow-x-auto border border-[#231f1d] bg-[#faf8f4]">
                    <table class="w-full text-left border-collapse font-serif-body">
                        <thead>
                            <tr class="border-b border-[#231f1d] bg-[#f2ede4] font-editorial-sans text-[10px] uppercase tracking-[0.15em] text-[#5e5953]">
                                <th class="p-3 font-semibold w-24">Item</th>
                                <th class="p-3 font-semibold">Description</th>
                                <th class="p-3 font-semibold text-right">Unit Price</th>
                                <th class="p-3 font-semibold text-center w-28">Qty</th>
                                <th class="p-3 font-semibold text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e5dfd5]">
                            @foreach($cartItems as $item)
                                @php
                                    $product = $item->products;
                                    $itemPrice = $product->productprice ?? 0;
                                    $lineTotal = $itemPrice * $item->quantity;
                                @endphp
                                <tr class="hover:bg-[#ffffff] transition">
                                    <!-- Item Image -->
                                    <td class="p-3 align-top">
                                        <div class="w-20 h-20 border border-[#231f1d] bg-[#e8e2d5] overflow-hidden">
                                            <img src="{{ !empty($product->image_url) ? $product->image_url : 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=400&q=80' }}" 
                                                 alt="{{ $product->productname }}" 
                                                 class="w-full h-full object-cover grayscale contrast-110">
                                        </div>
                                    </td>

                                    <!-- Description & Actions -->
                                    <td class="p-3 align-top">
                                        <h4 class="font-masthead font-bold text-base text-[#161413]">
                                            {{ $product->productname }}
                                        </h4>
                                        <p class="font-serif-body italic text-xs text-[#5e5953] mt-0.5 line-clamp-1">
                                            {{ $product->description }}
                                        </p>
                                        <span class="text-[9px] font-editorial-sans uppercase text-[#8c857b] tracking-wider block mt-1">
                                            SS - 25 · Authenticated
                                        </span>

                                        <!-- Remove Form -->
                                        <form action="{{ route('buyer.removeFromCart') }}" method="POST" class="mt-2 inline-block">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                            <button type="submit" class="text-[10px] font-editorial-sans uppercase tracking-widest text-[#787167] hover:text-[#9b2c2c] transition underline cursor-pointer">
                                                Remove
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Unit Price -->
                                    <td class="p-3 align-top text-right font-serif-body font-semibold text-sm text-[#161413]">
                                        ₦{{ number_format($itemPrice) }}
                                    </td>

                                    <!-- Quantity Stepper Form -->
                                    <td class="p-3 align-top text-center">
                                        <form action="{{ route('buyer.updateCart') }}" method="POST" class="inline-flex items-center border border-[#231f1d] bg-[#f7f4ee]">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                             <button type="button"
                                                 onclick="let inp = this.parentNode.querySelector('input[name=\'quantity\']'); if(parseInt(inp.value) > 1){ inp.value = parseInt(inp.value) - 1; this.form.submit(); }"
                                                 class="w-6 h-6 text-xs text-[#161413] hover:bg-[#161413] hover:text-[#f7f4ee] transition flex items-center justify-center font-bold">
                                                -
                                            </button>
                                            <input type="number" 
                                                   name="quantity" 
                                                   min="1" 
                                                   value="{{ $item->quantity }}" 
                                                   onchange="this.form.submit()"
                                                   class="w-8 text-center text-xs bg-transparent border-x border-[#231f1d] font-bold text-[#161413] focus:outline-none py-0.5">
                                            <button type="button" 
                                                    onclick="let inp = this.previousElementSibling; inp.value++; this.form.submit();"
                                                    class="w-6 h-6 text-xs text-[#161413] hover:bg-[#161413] hover:text-[#f7f4ee] transition flex items-center justify-center font-bold">
                                                +
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Total -->
                                    <td class="p-3 align-top text-right font-serif-body font-bold text-sm text-[#161413]">
                                        ₦{{ number_format($lineTotal) }}
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Subtotal Summary Row -->
                            <tr class="bg-[#f2ede4] font-editorial-sans text-xs uppercase tracking-wider text-[#161413] font-bold">
                                <td colspan="4" class="p-3 text-left">
                                    Subtotal ({{ $totalCount }} {{ Str::plural('item', $totalCount) }})
                                </td>
                                <td class="p-3 text-right font-serif-body font-black text-base">
                                    ₦{{ number_format($subtotal) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Assurance Footnote -->
                    <div class="p-4 border-t border-[#231f1d] font-serif-body italic text-[11px] text-[#6e6860] bg-[#faf8f4]">
                        All pieces are authenticated by our in-house curators before dispatch. Delivery within 5–7 working days. Returns accepted within 14 days of receipt in original condition.
                    </div>
                </div>

                <!-- Right Column: Order Summary Card (4 cols on lg) -->
                <div class="lg:col-span-4 sticky top-6">
                    <div class="border-2 border-[#231f1d] p-6 bg-[#faf8f4] shadow-sm">
                        <!-- Summary Title -->
                        <h3 class="font-editorial-sans text-xs font-bold uppercase tracking-[0.2em] text-[#161413] text-center pb-3 border-b border-[#231f1d]">
                            Order Summary
                        </h3>

                        <!-- Line Items -->
                        <div class="py-4 space-y-3 font-serif-body text-sm text-[#3d3833] border-b border-[#dcd7ce]">
                            <div class="flex items-center justify-between">
                                <span>Subtotal</span>
                                <span class="font-semibold text-[#161413]">₦{{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Shipping</span>
                                <span class="italic text-[#161413]">Complimentary</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Authentication</span>
                                <span class="italic text-[#161413]">Included</span>
                            </div>
                        </div>

                        <!-- Total Due -->
                        <div class="py-4 flex items-baseline justify-between font-serif-body border-b-2 border-[#231f1d]">
                            <span class="font-editorial-sans text-xs uppercase tracking-wider font-bold text-[#161413]">Total Due</span>
                            <span class="text-2xl font-black text-[#161413]">
                                ₦{{ number_format($total) }}
                            </span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-6 space-y-2.5">
                            <a href="{{ route('buyer.checkout') }}"
                               class="w-full py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs uppercase tracking-[0.2em] transition flex items-center justify-center gap-2 text-center font-semibold">
                                <span>Checkout</span>
                                <span>&rarr;</span>
                            </a>

                            <a href="{{ route('buyer.dashboard') }}" 
                               class="w-full py-3 border border-[#231f1d] hover:bg-[#e8e2d5] text-[#161413] font-editorial-sans text-xs uppercase tracking-[0.15em] transition flex items-center justify-center gap-2 text-center">
                                <span>&larr;</span>
                                <span>Continue Shopping</span>
                            </a>
                        </div>

                        <!-- Trust Markers with Diamond Icons (No emojis!) -->
                        <div class="mt-8 pt-4 border-t border-[#dcd7ce] space-y-1.5 text-[10px] font-editorial-sans uppercase tracking-wider text-[#6e6860]">
                            <div class="flex items-center gap-1.5">
                                <span>✦</span>
                                <span>Authenticated by experts</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span>✦</span>
                                <span>Complimentary returns, 14 days</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span>✦</span>
                                <span>Insured & tracked delivery</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span>✦</span>
                                <span>Secure encrypted checkout</span>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="mt-6 pt-3 border-t border-[#e5dfd5] text-[9px] font-editorial-sans uppercase text-[#8c857b] leading-tight">
                            Issue No. 17 · September 2026<br>
                            All prices listed in Nigerian Naira (₦).<br>
                            &copy; 2026 Easybuy. Est. 2024.
                        </div>
                    </div>
                </div>

            </div>
        @endif

    </div>
</x-layout>