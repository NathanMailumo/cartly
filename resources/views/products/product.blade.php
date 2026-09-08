<x-layout>
    <x-slot:title>Atelier Registry · Products</x-slot:title>

    <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 py-6">

        <div class="flex items-center justify-between pb-3 border-b border-[#231f1d] text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#5e5953]">
            <a href="{{ route('seller.dashboard') }}" class="hover:text-[#161413] transition flex items-center gap-1.5 font-bold">
                <span>&larr;</span>
                <span>Seller Dashboard</span>
            </a>
            <span class="font-semibold text-[#161413]">✦ Atelier Inventory Registry ✦</span>
            <a href="{{ route('addProduct') }}" class="hover:text-[#161413] font-bold transition">
                + Catalog New Piece
            </a>
        </div>

        <!-- Masthead -->
        <div class="text-center py-6">
            <h1 class="font-masthead text-5xl sm:text-7xl font-black text-[#161413] tracking-tight">
                Easybuy
            </h1>
            <p class="font-editorial-sans text-[9px] tracking-[0.3em] uppercase text-[#6e6860] mt-1">
                Atelier Catalog · Curator Management
            </p>
        </div>

        <!-- Double Rule Divider -->
        <div class="w-full border-t-2 border-b border-[#231f1d] py-[1px] mb-8"></div>

        <!-- Catalog Items Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 border-t border-l border-[#231f1d] mb-12">
            @forelse ($products ?? [] as $product)
                <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between group hover:bg-white transition">
                    <div>
                        <!-- Header with actions -->
                        <div class="flex items-center justify-between pb-2 mb-3 border-b border-[#e5dfd5]">
                            <span class="text-[9px] font-editorial-sans uppercase tracking-widest text-[#787167]">
                                {{ $product->category->categoryname ?? 'Collection' }}
                            </span>

                            <div class="flex items-center gap-3 text-xs">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-[#5e5953] hover:text-[#161413] transition" title="Edit Catalog Item">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Remove piece from registry?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[#5e5953] hover:text-[#9b2c2c] transition cursor-pointer" title="Archive / Delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Title & Description -->
                        <h2 class="font-masthead text-lg font-bold text-[#161413]">
                            {{ $product->productname }}
                        </h2>
                        <p class="font-serif-body italic text-xs text-[#5e5953] line-clamp-3 mt-1">
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-[#e5dfd5] flex items-baseline justify-between font-serif-body">
                        <span class="text-[10px] font-editorial-sans uppercase text-[#787167] tracking-wider">Catalog Price</span>
                        <span class="text-base font-bold text-[#161413]">
                            ₦{{ number_format($product->productprice) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full border-r border-b border-[#231f1d] p-12 text-center bg-[#faf8f4]">
                    <p class="font-serif-body italic text-base text-[#787167] mb-4">No pieces cataloged in your atelier yet.</p>
                    <a href="{{ route('addProduct') }}" 
                       class="inline-block px-6 py-3 bg-[#1a1918] text-[#f7f4ee] font-editorial-sans text-xs uppercase tracking-[0.2em] hover:bg-black transition">
                        Catalog First Piece &rarr;
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</x-layout>