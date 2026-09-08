<x-layout>
    <x-slot:title>The Archive · Front Page</x-slot:title>

    @php
        // Preserve all existing database categories without modification
        $existingCategories = \App\Models\Category::withCount('products')->get();
    @endphp

    <div class="w-full max-w-[1360px] mx-auto px-3 sm:px-6 py-2">

        <!-- Main Front Page Layout (3-Zone Grid) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 border-b border-[#231f1d] min-h-[700px]">

            <!-- ================= LEFT COLUMN: CATEGORIES & PRIVATE SALE (2 cols on lg) ================= -->
            <aside class="lg:col-span-2 border-b lg:border-b-0 lg:border-r border-[#231f1d] p-4 flex flex-col justify-between bg-[#f7f4ee]">
                <div>
                    <!-- Categories List (Existing Categories Preserved!) -->
                    <nav class="space-y-1 font-editorial-sans text-[11px] uppercase tracking-wider">
                        <!-- What's New active pill -->
                        <a href="{{ route('buyer.dashboard') }}" 
                           class="block px-3 py-1.5 bg-[#161413] text-[#f7f4ee] font-bold text-left tracking-[0.15em]">
                            What's New
                        </a>

                        @foreach($existingCategories as $cat)
                            <a href="{{ route('buyer.browse', ['category' => $cat->id]) }}" 
                               class="block px-3 py-1.5 text-[#3d3833] hover:bg-[#eae4d7] hover:text-[#161413] transition text-left">
                                {{ $cat->categoryname }}
                            </a>
                        @endforeach
                    </nav>
                </div>

                <!-- Boxed Private Sale Card -->
                <div class="mt-8 pt-4 border-t border-[#dcd7ce]">
                    <div class="border border-[#231f1d] p-3 text-center bg-[#faf8f4]">
                        <span class="text-[9px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] block">
                            Private Sale
                        </span>
                        <h4 class="font-serif-body italic text-base text-[#161413] my-1 leading-snug">
                            Archive Pieces from ₦2,400
                        </h4>
                        <div class="w-8 border-b border-[#231f1d] mx-auto my-1.5"></div>
                        <span class="text-[8px] font-editorial-sans uppercase tracking-[0.25em] text-[#787167]">
                            Limited Time
                        </span>
                    </div>

                    <div class="mt-3 text-[9px] font-editorial-sans uppercase text-[#8c857b] leading-tight">
                        Issue No. 17 · Sept. 2026<br>
                        All pieces authenticated.
                    </div>
                </div>
            </aside>

            <!-- ================= RIGHT COLUMN: PRODUCTS ================= -->
            <section class="lg:col-span-10 p-4 sm:p-6 bg-[#faf8f4]">

            <!-- Section Banner Divider -->
            <div class="text-center my-6">
                <div class="flex items-center justify-center gap-4">
                    <div class="flex-1 border-b border-[#231f1d]"></div>
                    <div class="text-xs font-editorial-sans uppercase tracking-[0.25em] text-[#161413] font-bold px-2">
                        ✦ What's New — This Season's Finest Acquisitions ✦
                    </div>
                    <div class="flex-1 border-b border-[#231f1d]"></div>
                </div>
                <div class="text-[9px] font-editorial-sans uppercase tracking-[0.3em] text-[#787167] mt-1">
                    Authenticated · Curated · Delivered
                </div>
            </div>

            <!-- Product Success Flash Message -->
            @if(session('success'))
                <div class="mb-6 p-3 border border-[#231f1d] bg-[#f0ebe1] text-[#161413] text-xs font-serif-body flex items-center justify-between">
                    <span>✦ {{ session('success') }}</span>
                    <a href="{{ route('buyer.cart') }}" class="font-editorial-sans uppercase text-[10px] tracking-widest underline font-bold">
                        View Cart &rarr;
                    </a>
                </div>
            @endif

            <!-- Newspaper Catalog Grid (3 columns on md/lg) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 border-t border-l border-[#231f1d]">
                @php
                    $catalogImages = [
                        'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=800&q=80',
                        'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80',
                        'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80',
                        'https://images.unsplash.com/photo-1524805444758-089113d48a6d?auto=format&fit=crop&w=800&q=80',
                        'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80',
                        'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=800&q=80',
                    ];
                @endphp
                @forelse($products ?? [] as $product)
                    @php
                        $imageFallback = $catalogImages[$loop->index % count($catalogImages)];
                    @endphp
                    <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between group hover:bg-[#ffffff] transition">
                        <div>
                            <!-- Header Code / Season (e.g. SS - 25) -->
                            <div class="flex items-center justify-between text-[10px] font-editorial-sans uppercase text-[#787167] mb-2 tracking-widest">
                                <span>{{ $loop->iteration % 2 === 0 ? 'AW - 24' : 'SS - 25' }}</span>
                                @if($product->category)
                                    <span class="text-[9px] text-[#8c857b]">{{ $product->category->categoryname }}</span>
                                @endif
                            </div>

                            <!-- Seller images take priority; mixed fallback images fill the catalog until uploads are available. -->
                            <div class="border border-[#231f1d] overflow-hidden mb-3.5 bg-white h-56 flex items-center justify-center">
                                <img src="{{ !empty($product->image_url) ? $product->image_url : $imageFallback }}" alt="{{ $product->productname }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-500">
                            </div>

                            <!-- Product Info -->
                            <h3 class="font-masthead text-lg font-bold text-[#161413] tracking-tight">
                                {{ $product->productname }}
                            </h3>
                            <p class="font-serif-body italic text-xs text-[#5e5953] line-clamp-2 mt-0.5">
                                {{ $product->description }}
                            </p>
                        </div>

                        <!-- Price & Add To Bag Action -->
                        <div class="mt-4 pt-3 border-t border-[#e5dfd5]">
                            <div class="flex items-baseline justify-between mb-3 font-serif-body">
                                <span class="text-xs text-[#787167]">{{ $product->productname }}</span>
                                <span class="text-base font-bold text-[#161413]">
                                    ₦{{ number_format($product->productprice) }}
                                </span>
                            </div>

                            <!-- Cart Addition Form (Preserving routes and parameters) -->
                            <form action="{{ route('buyer.addToCart') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" 
                                        class="w-full py-2 border border-[#161413] hover:bg-[#161413] hover:text-[#f7f4ee] text-[#161413] font-editorial-sans text-[10px] uppercase tracking-[0.2em] transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <span>Add to Bag</span>
                                    <span>&rarr;</span>
                                </button>
                            </form>

                            @if(session('added_product_id') == $product->id)
                                <div class="mt-1.5 text-center text-[10px] font-serif-body italic text-[#2c7a7b]">
                                    ✦ Added to your collection.
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full border-r border-b border-[#231f1d] p-12 text-center bg-[#faf8f4]">
                        <p class="font-serif-body italic text-base text-[#787167]">No archive acquisitions cataloged at this time.</p>
                    </div>
                @endforelse
            </div>

        </section>

    </div>
</x-layout>