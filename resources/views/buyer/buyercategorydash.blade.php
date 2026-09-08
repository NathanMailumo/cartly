<x-layout>
    <x-slot:title>Browse Categories · The Archive</x-slot:title>

    <div class="w-full max-w-[1360px] mx-auto px-3 sm:px-6 py-2">

        <!-- Main Category Page Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 border border-[#231f1d] bg-[#faf8f4] mb-12">

            <!-- ================= LEFT COLUMN: CATEGORIES (3 cols on lg) ================= -->
            <aside class="lg:col-span-3 border-b lg:border-b-0 lg:border-r border-[#231f1d] p-5 bg-[#f7f4ee] flex flex-col justify-between">
                <div>
                    <!-- Header -->
                    <div class="pb-3 mb-4 border-b border-[#231f1d] flex items-center justify-between text-xs font-editorial-sans uppercase tracking-widest text-[#161413] font-bold">
                        <span>Department Index</span>
                        <i class="fa-solid fa-layer-group text-[11px] text-[#787167]"></i>
                    </div>

                    <!-- All Categories Link -->
                    <nav class="space-y-1 font-editorial-sans text-[11px] uppercase tracking-wider">
                        <a href="{{ route('buyer.browse') }}"
                           class="flex items-center justify-between px-3 py-2 border border-transparent transition {{ !$selectedCategory ? 'bg-[#161413] text-[#f7f4ee] font-bold' : 'text-[#3d3833] hover:bg-[#eae4d7]' }}">
                            <span>All Acquisitions</span>
                            <span class="text-[10px] opacity-80">{{ $categories->sum('products_count') }}</span>
                        </a>

                        <!-- Preserved Database Categories -->
                        @foreach($categories as $cat)
                            <a href="{{ route('buyer.browse', ['category' => $cat->id]) }}"
                               class="flex items-center justify-between px-3 py-2 border border-transparent transition {{ $selectedCategory && $selectedCategory->id === $cat->id ? 'bg-[#161413] text-[#f7f4ee] font-bold' : 'text-[#3d3833] hover:bg-[#eae4d7]' }}">
                                <span>{{ $cat->categoryname }}</span>
                                <span class="text-[10px] opacity-80">{{ $cat->products_count }}</span>
                            </a>
                        @endforeach
                    </nav>
                </div>

                <!-- Boxed Fine Print -->
                <div class="mt-8 pt-4 border-t border-[#dcd7ce] text-[9px] font-editorial-sans uppercase text-[#787167] leading-tight">
                    Issue No. 17 · Archive Registry<br>
                    All categories certified authentic.
                </div>
            </aside>

            <!-- ================= RIGHT COLUMN: PRODUCTS & SEARCH (9 cols on lg) ================= -->
            <section class="lg:col-span-9 p-6 sm:p-8 bg-[#faf8f4]">

                <!-- Header & Search -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-[#231f1d] gap-4 mb-8">
                    <div>
                        <div class="text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] mb-1">
                            ✦ Authenticated Archive
                        </div>
                        <h2 class="font-masthead text-2xl sm:text-3xl text-[#161413] font-bold">
                            {{ $selectedCategory ? $selectedCategory->categoryname : 'All Cataloged Pieces' }}
                        </h2>
                        <p class="font-serif-body italic text-xs text-[#5e5953] mt-0.5">
                            Showing {{ $products->count() }} authenticated piece{{ $products->count() !== 1 ? 's' : '' }}
                        </p>
                    </div>

                    <!-- Search Form -->
                    <form action="{{ route('buyer.browse') }}" method="GET" class="flex items-center">
                        @if($selectedCategory)
                            <input type="hidden" name="category" value="{{ $selectedCategory->id }}">
                        @endif
                        <div class="relative w-full sm:w-64">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Search archive..." 
                                   class="w-full bg-[#f4efe6] border border-[#231f1d] px-3 py-2 text-xs font-serif-body text-[#161413] placeholder-[#8c857b] focus:outline-none">
                            <button type="submit" class="absolute right-0 top-0 bottom-0 px-3 text-[#161413] hover:opacity-60 transition">
                                <i class="fa-solid fa-magnifying-glass text-xs"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Product Catalog Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-0 border-t border-l border-[#231f1d]">
                    @php
                        $catalogImages = [
                            'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1591561954557-26941169b49e?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=800&q=80',
                        ];
                    @endphp

                    @forelse($products as $product)
                        @php
                            $imageFallback = $catalogImages[$loop->index % count($catalogImages)];
                        @endphp

                        <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between group hover:bg-[#ffffff] transition">
                            <div>
                                <!-- Season Tag -->
                                <div class="flex items-center justify-between text-[10px] font-editorial-sans uppercase text-[#787167] mb-2 tracking-widest">
                                    <span>{{ $loop->iteration % 2 === 0 ? 'AW - 24' : 'SS - 25' }}</span>
                                    @if($product->category)
                                        <span class="text-[9px] text-[#8c857b]">{{ $product->category->categoryname }}</span>
                                    @endif
                                </div>

                                <!-- Product Image -->
                                <div class="border border-[#231f1d] overflow-hidden mb-3 bg-[#f0ebe1] h-48 flex items-center justify-center">
                                    <img src="{{ !empty($product->image_url) ? $product->image_url : $imageFallback }}" 
                                         alt="{{ $product->productname }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                </div>

                                <!-- Title & Description -->
                                <h3 class="font-masthead text-base font-bold text-[#161413] tracking-tight">
                                    {{ $product->productname }}
                                </h3>
                                <p class="font-serif-body italic text-xs text-[#5e5953] line-clamp-2 mt-0.5">
                                    {{ $product->description }}
                                </p>
                            </div>

                            <!-- Price & Add To Bag -->
                            <div class="mt-4 pt-3 border-t border-[#e5dfd5]">
                                <div class="flex items-baseline justify-between mb-3 font-serif-body">
                                    <span class="text-xs text-[#787167]">{{ $product->productname }}</span>
                                    <span class="text-base font-bold text-[#161413]">
                                        ₦{{ number_format($product->productprice) }}
                                    </span>
                                </div>

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
                            <p class="font-serif-body italic text-base text-[#787167]">No acquisitions found in this category.</p>
                        </div>
                    @endforelse
                </div>

            </section>

        </div>

    </div>
</x-layout>