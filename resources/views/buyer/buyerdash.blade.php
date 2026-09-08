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
                    <!-- Utility Icons Line (Mail, Phone, Archive) - No emojis! -->
                    <div class="flex items-center gap-3 text-[#5e5953] pb-4 mb-4 border-b border-[#dcd7ce] text-xs">
                        <i class="fa-regular fa-envelope"></i>
                        <i class="fa-solid fa-phone text-[11px]"></i>
                        <i class="fa-regular fa-user"></i>
                    </div>

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

            <!-- ================= CENTER & RIGHT COLUMNS: EDITORIAL FRONT PAGE STORIES (10 cols on lg) ================= -->
            <section class="lg:col-span-10 p-4 sm:p-6 bg-[#faf8f4]">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

                    <!-- Main Story Feature (7 cols) -->
                    <div class="lg:col-span-7 pr-0 lg:pr-6 border-b lg:border-b-0 lg:border-r border-[#dcd7ce]">
                        <div class="text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] mb-1.5 flex items-center gap-1.5">
                            <span>✦</span>
                            <span>Feature · Spring Collection</span>
                        </div>

                        <h2 class="font-masthead text-2xl sm:text-3xl lg:text-4xl text-[#161413] font-bold leading-tight mb-4">
                            Spring 2025 Collection Unveiled in New York
                        </h2>

                        <!-- Feature Photography (Real Editorial) -->
                        <div class="border border-[#231f1d] overflow-hidden mb-3 bg-[#e8e2d5]">
                            <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1200&q=80" 
                                 alt="Spring 2025 haute couture showcase" 
                                 class="w-full h-[260px] sm:h-[320px] object-cover filter grayscale contrast-110">
                        </div>

                        <p class="font-serif-body italic text-[11px] text-[#5e5953] leading-relaxed">
                            As dawn broke over the Manhattan skyline, the fashion world's elite gathered to witness the debut of Cartly's Spring 2025 collection at the Astoria Hotel. — <span class="not-italic uppercase font-editorial-sans text-[9px]">Photo: A. Beaumont</span>
                        </p>
                    </div>

                    <!-- Editorial Column (5 cols) -->
                    <div class="lg:col-span-5 flex flex-col justify-between">
                        <div>
                            <div class="text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] mb-1.5">
                                Style · Editorial
                            </div>

                            <h3 class="font-serif-body italic text-xl sm:text-2xl text-[#161413] font-normal leading-snug mb-3">
                                Creative Director Simons on How to Dress for Your Ultimate Winter Getaway
                            </h3>

                            <p class="font-serif-body text-xs text-[#5e5953] leading-relaxed mb-4">
                                Embrace the charm of winter with Simons' curated guide to dressing for your snowy escapade. As temperatures dip and the landscape transforms into a winter wonderland, your wardrobe should reflect both the necessities and the charms of the new season.
                            </p>

                            <p class="font-serif-body text-xs text-[#5e5953] leading-relaxed mb-4">
                                Begin with the foundation: reach for an ambitious, oversized wool Bourdel coat. With a rich herringbone texture, opt for burgundy, forest green, or classic charcoal.
                            </p>

                            <!-- Editorial Pull Quote -->
                            <div class="border-l-2 border-[#161413] pl-3 py-1 my-4 bg-[#f4efe6]">
                                <p class="font-serif-body italic text-sm text-[#161413] leading-snug">
                                    "Every piece should carry the weight of a story, not merely a season."
                                </p>
                                <span class="font-editorial-sans text-[8px] uppercase tracking-[0.2em] text-[#787167] block mt-1">
                                    — RAF SIMONS, CREATIVE DIRECTOR
                                </span>
                            </div>
                        </div>

                        <!-- Secondary Real Editorial Portrait -->
                        <div class="mt-4 pt-3 border-t border-[#dcd7ce]">
                            <div class="border border-[#231f1d] overflow-hidden mb-2 bg-[#e8e2d5]">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80" 
                                     alt="Editorial style portrait" 
                                     class="w-full h-36 object-cover grayscale contrast-125">
                            </div>
                            <span class="font-serif-body italic text-[10px] text-[#6e6860]">
                                Knit-wear from the Winter Essentials series. Available in stores and online.
                            </span>
                        </div>
                    </div>

                </div>
            </section>

        </div>

        <!-- ================= LOWER SECTION: THIS SEASON'S FINEST ACQUISITIONS ================= -->
        <section class="py-6 bg-[#f7f4ee]">

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
                @forelse($products ?? [] as $product)
                    @php
                        // Cycle through real curated catalog photography fallbacks
                        $catalogImages = [
                            'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1591561954557-26941169b49e?auto=format&fit=crop&w=800&q=80',
                            'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=800&q=80',
                        ];
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

                            <!-- Product Photography (Real) -->
                            <div class="border border-[#231f1d] overflow-hidden mb-3.5 bg-[#f0ebe1] h-56 flex items-center justify-center relative">
                                <img src="{{ !empty($product->image_url) ? $product->image_url : $imageFallback }}" 
                                     alt="{{ $product->productname }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
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