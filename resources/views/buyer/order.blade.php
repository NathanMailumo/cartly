<x-layout>
    <x-slot:title>Acquisition Certificate · Order Receipt</x-slot:title>

    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 py-6">

        <!-- Top Navigation -->
        <div class="flex items-center justify-between pb-3 border-b border-[#231f1d] text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#5e5953]">
            <a href="{{ route('buyer.cart') }}" class="hover:text-[#161413] transition flex items-center gap-1.5 font-bold">
                <span>&larr;</span>
                <span>Return to Cart</span>
            </a>
            <span class="font-semibold text-[#161413]">✦ Authentication Guaranteed ✦</span>
            {{-- <span>Est. Delivery: {{ $estimatedDate }}</span> --}}
        </div>

        {{-- <!-- Masthead -->
        <div class="text-center py-6">
            <a href="{{ route('buyer.dashboard') }}" class="inline-block">
                <h1 class="font-masthead text-5xl sm:text-6xl font-black text-[#161413] tracking-tight hover:opacity-90 transition">
                    Easybuy
                </h1>
            </a>
            <p class="font-editorial-sans text-[9px] tracking-[0.3em] uppercase text-[#6e6860] mt-1">
                Registry of Acquisitions · Order Confirmation
            </p>
        </div> --}}

        <!-- Double Rule Divider -->
        <div class="w-full border-t-2 border-b border-[#231f1d] py-[1px] mb-8"></div>

        <!-- Ledger Invoice Box -->
        <div class="border-2 border-[#231f1d] bg-[#faf8f4] p-6 sm:p-10 shadow-sm mb-10">

            <!-- Certificate Header -->
            <div class="text-center pb-6 border-b border-[#231f1d] mb-6">
                <div class="text-[10px] font-editorial-sans uppercase tracking-[0.25em] text-[#787167] mb-1">
                    Official Acquisition Record
                </div>
                <h2 class="font-masthead text-2xl sm:text-3xl text-[#161413] font-bold">
                    Certificate of Order Summary
                </h2>
                <p class="font-serif-body italic text-xs text-[#5e5953] mt-1">
                    Issued to {{ Auth::user()->name }} · {{ date('l, F j, Y') }}
                </p>
            </div>

            @if($cartItems->isNotEmpty())
                <!-- Items Table -->
                <div class="overflow-x-auto mb-8 border border-[#231f1d]">
                    <table class="w-full text-left border-collapse font-serif-body">
                        <thead>
                            <tr class="border-b border-[#231f1d] bg-[#f2ede4] font-editorial-sans text-[10px] uppercase tracking-[0.15em] text-[#5e5953]">
                                <th class="p-3 font-semibold">Acquisition Piece</th>
                                <th class="p-3 font-semibold text-right">Unit Price</th>
                                <th class="p-3 font-semibold text-center">Qty</th>
                                <th class="p-3 font-semibold text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e5dfd5]">
                            @foreach($cartItems as $item)
                                @php
                                    $product = $item->products;
                                    $unitPrice = $product->productprice ?? 0;
                                    $lineTotal = $unitPrice * $item->quantity;
                                @endphp
                                <tr class="hover:bg-white transition">
                                    <td class="p-3">
                                        <h4 class="font-masthead font-bold text-sm text-[#161413]">
                                            {{ $product->productname }}
                                        </h4>
                                        <p class="font-serif-body italic text-xs text-[#5e5953]">
                                            {{ $product->description }}
                                        </p>
                                        <span class="text-[9px] font-editorial-sans uppercase text-[#787167] tracking-wider block mt-0.5">
                                            Estimated Dispatch: {{ $estimatedDate }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-right font-serif-body text-sm font-semibold text-[#161413]">
                                        ₦{{ number_format($unitPrice) }}
                                    </td>
                                    <td class="p-3 text-center font-editorial-sans text-xs font-bold text-[#161413]">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="p-3 text-right font-serif-body text-sm font-bold text-[#161413]">
                                        ₦{{ number_format($lineTotal) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Order Total Breakdown -->
                <div class="border-t-2 border-[#231f1d] pt-4 font-serif-body space-y-2 text-sm text-[#3d3833]">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span class="font-semibold text-[#161413]">₦{{ number_format($subtotal) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Complimentary Insured Courier</span>
                        <span class="italic text-[#161413]">Included</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Authentication & Certification</span>
                        <span class="italic text-[#161413]">Included</span>
                    </div>
                    <div class="flex justify-between border-t border-[#231f1d] pt-3 text-base">
                        <span class="font-editorial-sans font-bold uppercase tracking-wider text-[#161413]">Total Remittance</span>
                        <span class="text-xl font-black text-[#161413]">₦{{ number_format($total) }}</span>
                    </div>
                </div>
            @else
                <div class="text-center py-8 font-serif-body italic text-sm text-[#787167]">
                    No items found in your order.
                </div>
            @endif

            <!-- Authentic Seal Notice -->
            <div class="mt-8 pt-6 border-t border-[#dcd7ce] text-center font-serif-body italic text-xs text-[#5e5953]">
                "Every acquisition through Easybuy is individually examined and certified by our curators before dispatch."
            </div>

            <div class="mt-8 text-center flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('buyer.dashboard') }}" 
                   class="px-8 py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs uppercase tracking-[0.2em] transition">
                    Return to the Archive &rarr;
                </a>
                <a href="{{ route('buyer.browse') }}" 
                   class="px-8 py-3.5 border border-[#231f1d] hover:bg-[#e8e2d5] text-[#161413] font-editorial-sans text-xs uppercase tracking-[0.15em] transition">
                    Browse More Pieces
                </a>
            </div>

        </div>

    </div>
</x-layout>
