<x-admin-layout>
    {{-- <x-slot:header>Product Verification & Moderation</x-slot:header> --}}

    <!-- Header Section -->
    <div class="text-center mb-8">
        <div class="flex items-center justify-center gap-4">
            <div class="flex-1 border-b border-[#231f1d]"></div>
            <div class="text-sm font-editorial-sans uppercase tracking-[0.2em] text-[#161413] font-bold px-2">
                ✦ Pending & Registered Submissions ✦
            </div>
            <div class="flex-1 border-b border-[#231f1d]"></div>
        </div>
        <div class="text-[10px] font-editorial-sans uppercase tracking-[0.25em] text-[#787167] mt-1">
            Review, Approve, or Reject Seller Acquisitions
        </div>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="mb-6 p-3 border border-[#231f1d] bg-[#f0ebe1] text-[#161413] text-xs font-serif-body">
            ✦ {{ session('success') }}
        </div>
    @endif

    <!-- Products Moderation Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 border-t border-l border-[#231f1d]">
        @forelse($products as $product)
            <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between">
                <div>
                    <!-- Status Badge & Category -->
                    <div class="flex items-center justify-between pb-2 mb-3 border-b border-[#e5dfd5]">
                        <span class="text-[9px] font-editorial-sans uppercase tracking-widest text-[#787167]">
                            {{ $product->category->categoryname ?? 'Uncategorized' }}
                        </span>

                        <!-- Status Indicator -->
                        @if(($product->status ?? 'waiting') === 'approved')
                            <span class="px-2 py-0.5 border border-[#2c7a7b] bg-[#e6fffa] text-[#2c7a7b] font-editorial-sans text-[9px] uppercase tracking-wider">
                                Approved
                            </span>
                        @elseif(($product->status ?? 'waiting') === 'rejected')
                            <span class="px-2 py-0.5 border border-[#9b2c2c] bg-[#fff5f5] text-[#9b2c2c] font-editorial-sans text-[9px] uppercase tracking-wider">
                                Rejected
                            </span>
                        @else
                            <span class="px-2 py-0.5 border border-[#d69e2e] bg-[#fefcbf] text-[#744210] font-editorial-sans text-[9px] uppercase tracking-wider">
                                Pending
                            </span>
                        @endif
                    </div>

                    <!-- Title & Details -->
                    <h3 class="font-masthead text-lg font-bold text-[#161413]">
                        {{ $product->productname }}
                    </h3>
                    <p class="font-serif-body italic text-xs text-[#5e5953] line-clamp-2 mt-1">
                        {{ $product->description }}
                    </p>
                    
                    <div class="mt-3 text-[10px] font-editorial-sans uppercase text-[#787167]">
                        Price: <strong class="text-[#161413]">₦{{ number_format($product->productprice) }}</strong>
                    </div>
                </div>

                <!-- Action Controls -->
                <div class="mt-5 pt-3 border-t border-[#e5dfd5] flex items-center gap-2">
                    @if(($product->status ?? 'waiting') !== 'approved')
                        <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full py-2 bg-[#161413] text-[#f7f4ee] font-editorial-sans text-[10px] uppercase tracking-widest hover:bg-black transition cursor-pointer">
                                Approve
                            </button>
                        </form>
                    @endif

                    @if(($product->status ?? 'waiting') !== 'rejected')
                        <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full py-2 border border-[#9b2c2c] text-[#9b2c2c] hover:bg-[#9b2c2c] hover:text-white font-editorial-sans text-[10px] uppercase tracking-widest transition cursor-pointer">
                                Reject
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full border-r border-b border-[#231f1d] p-12 text-center bg-[#faf8f4]">
                <p class="font-serif-body italic text-base text-[#787167]">No products available for review.</p>
            </div>
        @endforelse
    </div>
</x-admin-layout>