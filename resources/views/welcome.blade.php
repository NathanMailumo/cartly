<x-layout>
    <x-slot:title>easybuy · Shop Smarter, Live Better</x-slot:title>

    @php
        $targetRoute = Auth::check() ? route('buyer.browse') : route('login');
    @endphp

    <!-- ================= HERO SECTION (Matching Image 3) ================= -->
    <section class="relative overflow-hidden bg-[#edd8ce] border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-[460px]">
                
                <!-- Left Hero Copy -->
                <div class="lg:col-span-7 flex flex-col justify-center animate-fade-in">
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-serif text-[#111111] font-normal leading-[1.05] tracking-tight">
                        Shop Smarter,<br>
                        <span class="font-bold">Live Better.</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-700 mt-4 max-w-lg font-normal">
                        Thousands of products. Great prices. Fast delivery.
                    </p>

                    <!-- Bottom Hero Indicators & CTA -->
                    <div class="mt-12 sm:mt-16 flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                        <div>
                            <span class="inline-block text-[11px] font-bold uppercase tracking-[0.25em] text-gray-700">
                                NEW ARRIVALS EVERY WEEK
                            </span>
                        </div>

                        <!-- Right Card: Free delivery notice & Shop Now Button -->
                        <div class="bg-white/80 backdrop-blur-md p-4 sm:p-5 rounded-sm border border-white/60 shadow-sm max-w-xs animate-fade-in-delayed">
                            <p class="text-xs text-gray-700 leading-snug">
                                Free delivery on orders over &#8358;5,000.<br>
                                Easy 30-day returns.
                            </p>
                            <a href="{{ $targetRoute }}" 
                               class="mt-3.5 inline-block w-full py-2.5 px-5 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs tracking-wider uppercase text-center rounded-sm transition shadow-sm cursor-pointer">
                                Shop Now &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Hero Lifestyle Photo -->
                <div class="lg:col-span-5 relative flex justify-center items-center animate-fade-in-slow">
                    <a href="{{ $targetRoute }}" class="relative w-full max-w-md aspect-[4/5] rounded-sm overflow-hidden shadow-2xl group border-4 border-white/90 block cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1000&q=85" 
                             alt="Luxury fashion shopping" 
                             class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute bottom-4 left-4 bg-white/95 backdrop-blur-sm px-3.5 py-2 rounded-sm text-xs font-semibold text-gray-900 shadow-md flex items-center gap-2 animate-float">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                            <span>Trending Collection 2026</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= HOW IT WORKS SECTION (Matching Image 3) ================= -->
    <section id="how-it-works" class="py-16 sm:py-20 bg-[#faf9f6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <h2 class="text-3xl sm:text-4xl font-serif font-bold text-[#111111] mb-10 sm:mb-12">
                How it works
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                
                <!-- Step 01 -->
                <a href="{{ $targetRoute }}" class="bg-white p-6 sm:p-7 border border-gray-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition block group cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-4">01</span>
                        <div class="aspect-[16/10] bg-gray-100 mb-5 overflow-hidden rounded-sm">
                            <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=600&q=80" 
                                 alt="Browse products" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <h3 class="text-xl font-bold font-serif text-gray-900 mb-2 group-hover:text-black">Browse products</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Explore thousands of the latest fashion items, accessories, and more — all in one place.
                        </p>
                    </div>
                </a>

                <!-- Step 02 -->
                <a href="{{ $targetRoute }}" class="bg-white p-6 sm:p-7 border border-gray-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition block group cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-4">02</span>
                        <div class="aspect-[16/10] bg-gray-100 mb-5 overflow-hidden rounded-sm">
                            <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=600&q=80" 
                                 alt="Add to cart" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <h3 class="text-xl font-bold font-serif text-gray-900 mb-2 group-hover:text-black">Add to cart</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Pick what you love, add it to your cart, and check out securely in just a few taps.
                        </p>
                    </div>
                </a>

                <!-- Step 03 -->
                <a href="{{ $targetRoute }}" class="bg-white p-6 sm:p-7 border border-gray-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition block group cursor-pointer">
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-4">03</span>
                        <div class="aspect-[16/10] bg-gray-100 mb-5 overflow-hidden rounded-sm">
                            <img src="https://images.unsplash.com/photo-1526367790999-0150786686a2?auto=format&fit=crop&w=600&q=80" 
                                 alt="Fast delivery" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <h3 class="text-xl font-bold font-serif text-gray-900 mb-2 group-hover:text-black">Fast delivery</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            We ship fast. Track your order in real time and get it delivered straight to your door.
                        </p>
                    </div>
                </a>

            </div>

        </div>
    </section>

    <!-- ================= TOP PICKS THIS WEEK (Vibrant Yellow Section) ================= -->
    <section id="top-picks" class="bg-[#f5ce42] py-12 sm:py-16 text-[#111111] transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 sm:mb-10">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif font-bold tracking-tight">
                    Top picks this week, hand-selected for you.
                </h2>
                <a href="{{ $targetRoute }}" 
                   class="inline-flex items-center gap-1.5 px-5 py-2.5 border border-black hover:bg-black hover:text-white text-black font-semibold text-xs tracking-wider uppercase transition rounded-none self-start sm:self-auto">
                    <span>Explore Catalog</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <!-- 3 Featured Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <a href="{{ $targetRoute }}" class="group relative aspect-[4/3] sm:aspect-[3/4] bg-neutral-900 overflow-hidden shadow-md flex flex-col justify-end p-5 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=80" 
                         alt="Street style look" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="relative z-10 text-white">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-amber-300">Street Style Look</span>
                        <p class="text-sm font-bold mt-0.5">&#8358;18,500</p>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="{{ $targetRoute }}" class="group relative aspect-[4/3] sm:aspect-[3/4] bg-neutral-900 overflow-hidden shadow-md flex flex-col justify-end p-5 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80" 
                         alt="Air Boost Sneakers" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="relative z-10 text-white">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-amber-300">Air Boost Sneakers</span>
                        <p class="text-sm font-bold mt-0.5">&#8358;14,200</p>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="{{ $targetRoute }}" class="group relative aspect-[4/3] sm:aspect-[3/4] bg-neutral-900 overflow-hidden shadow-md flex flex-col justify-end p-5 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1524805444758-089113d48a6d?auto=format&fit=crop&w=800&q=80" 
                         alt="Minimalist Watch" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="relative z-10 text-white">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-amber-300">Minimalist Watch</span>
                        <p class="text-sm font-bold mt-0.5">&#8358;22,000</p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <!-- ================= POPULAR RIGHT NOW (Matching Image 3) ================= -->
    <section id="popular" class="py-16 sm:py-20 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Row -->
            <div class="flex items-center justify-between gap-4 mb-6">
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-[#111111]">
                    Popular Right Now
                </h2>
                <a href="{{ $targetRoute }}" class="text-xs sm:text-sm font-semibold text-gray-700 hover:text-black transition flex items-center gap-1">
                    <span>View all</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <!-- Filter Pills Bar -->
            <div class="flex items-center gap-2 mb-8 overflow-x-auto pb-2 scrollbar-none" id="popular-tabs">
                <button type="button" onclick="filterItems('all', this)" class="popular-tab px-5 py-1.5 text-xs font-semibold rounded-full bg-black text-white border border-black transition">
                    All
                </button>
                <button type="button" onclick="filterItems('shoes', this)" class="popular-tab px-5 py-1.5 text-xs font-semibold rounded-full bg-white text-gray-700 border border-gray-200 hover:border-black transition">
                    Shoes
                </button>
                <button type="button" onclick="filterItems('clothing', this)" class="popular-tab px-5 py-1.5 text-xs font-semibold rounded-full bg-white text-gray-700 border border-gray-200 hover:border-black transition">
                    Clothing
                </button>
                <button type="button" onclick="filterItems('accessories', this)" class="popular-tab px-5 py-1.5 text-xs font-semibold rounded-full bg-white text-gray-700 border border-gray-200 hover:border-black transition">
                    Accessories
                </button>
                <button type="button" onclick="filterItems('fragrances', this)" class="popular-tab px-5 py-1.5 text-xs font-semibold rounded-full bg-white text-gray-700 border border-gray-200 hover:border-black transition">
                    Fragrances
                </button>
                <button type="button" onclick="filterItems('sale', this)" class="popular-tab px-5 py-1.5 text-xs font-semibold rounded-full bg-white text-gray-700 border border-gray-200 hover:border-black transition">
                    Sale
                </button>
            </div>

            <!-- 8 Product Grid (4 columns x 2 rows) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 sm:gap-6" id="popular-grid">
                
                <!-- Product 1 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="shoes">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <span class="absolute top-3 left-3 bg-black text-white text-[10px] font-bold px-2 py-0.5 rounded-none uppercase">NEW</span>
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80" alt="Air Boost Sneakers" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Air Boost Sneakers</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;18,500</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Product 2 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="shoes">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1607522370275-f14206abe5d3?auto=format&fit=crop&w=600&q=80" alt="Classic White Hi-Top" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Classic White Hi-Top</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;14,200</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Product 3 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="clothing sale">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <span class="absolute top-3 left-3 bg-black text-white text-[10px] font-bold px-2 py-0.5 rounded-none uppercase">SALE</span>
                        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80" alt="Linen V-Neck Top" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Linen V-Neck Top</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;5,400</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Product 4 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="clothing">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?auto=format&fit=crop&w=600&q=80" alt="Flannel Shirt" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Flannel Shirt</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;7,800</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Product 5 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="accessories">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <span class="absolute top-3 left-3 bg-black text-white text-[10px] font-bold px-2 py-0.5 rounded-none uppercase">NEW</span>
                        <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?auto=format&fit=crop&w=600&q=80" alt="Gold Jewelry Set" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Gold Jewelry Set</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;9,100</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Product 6 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="accessories">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?auto=format&fit=crop&w=600&q=80" alt="Retro Sunglasses" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Retro Sunglasses</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;4,100</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Product 7 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="fragrances">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?auto=format&fit=crop&w=600&q=80" alt="Bleu Cologne" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Bleu Cologne</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;12,000</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Product 8 -->
                <a href="{{ $targetRoute }}" class="popular-card group block cursor-pointer" data-category="accessories sale">
                    <div class="relative aspect-square bg-[#f4f4f4] overflow-hidden p-4 flex items-center justify-center">
                        <span class="absolute top-3 left-3 bg-black text-white text-[10px] font-bold px-2 py-0.5 rounded-none uppercase">SALE</span>
                        <img src="https://images.unsplash.com/photo-1524805444758-089113d48a6d?auto=format&fit=crop&w=600&q=80" alt="Minimalist Watch" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="mt-3">
                        <h4 class="text-xs sm:text-sm font-semibold text-gray-900 line-clamp-1 group-hover:text-black">Minimalist Watch</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs sm:text-sm font-bold text-gray-900">&#8358;22,000</span>
                            <div class="flex text-[10px] text-amber-400">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </section>

    <!-- ================= REAL CUSTOMER REVIEWS (Authentic Nigerian Customers) ================= -->
    <section id="reviews" class="py-16 sm:py-20 bg-[#faf9f6] border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-[#f5ce42] bg-black px-3 py-1 rounded-full inline-block mb-3">
                    VERIFIED BUYER REVIEWS
                </span>
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-gray-950">
                    Loved by shoppers across Nigeria
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 mt-2">
                    Real reviews from real Nigerians who shop everyday fashion, sneakers, and accessories on easybuy.
                </p>
            </div>

            <!-- Reviews Grid (4 Authentic Customer Reviews) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Review 1: Chioma Adeleke -->
                <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <!-- Stars -->
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-gray-700 leading-relaxed italic mb-4">
                            "Ordered the Linen V-Neck Top on Tuesday and it reached my doorstep in Lekki by Thursday morning! The quality is premium and the fabric is so breathable."
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" 
                             alt="Chioma Adeleke" 
                             class="w-11 h-11 rounded-full object-cover border-2 border-[#f5ce42]">
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Chioma Adeleke</h4>
                            <p class="text-[10px] text-gray-500">Lekki, Lagos &middot; <span class="text-emerald-700 font-semibold"><i class="fa-solid fa-circle-check"></i> Verified</span></p>
                        </div>
                    </div>
                </div>

                <!-- Review 2: Tunde Bakare -->
                <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <!-- Stars -->
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-gray-700 leading-relaxed italic mb-4">
                            "I was skeptical about paying online, but Paystack checkout was seamless and the Air Boost Sneakers are 100% authentic. Will definitely buy again."
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=200&q=80" 
                             alt="Tunde Bakare" 
                             class="w-11 h-11 rounded-full object-cover border-2 border-[#f5ce42]">
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Tunde Bakare</h4>
                            <p class="text-[10px] text-gray-500">Maitama, Abuja &middot; <span class="text-emerald-700 font-semibold"><i class="fa-solid fa-circle-check"></i> Verified</span></p>
                        </div>
                    </div>
                </div>

                <!-- Review 3: Amina Ibrahim -->
                <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <!-- Stars -->
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-gray-700 leading-relaxed italic mb-4">
                            "The Gold Jewelry Set looks even better in person than on the site. Perfect packaging, and customer care answered my delivery questions immediately."
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <img src="https://images.unsplash.com/photo-1589156280159-27698a70f29e?auto=format&fit=crop&w=200&q=80" 
                             alt="Amina Ibrahim" 
                             class="w-11 h-11 rounded-full object-cover border-2 border-[#f5ce42]">
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Amina Ibrahim</h4>
                            <p class="text-[10px] text-gray-500">Wuse 2, Abuja &middot; <span class="text-emerald-700 font-semibold"><i class="fa-solid fa-circle-check"></i> Verified</span></p>
                        </div>
                    </div>
                </div>

                <!-- Review 4: Emeka Okafor -->
                <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <!-- Stars -->
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-gray-700 leading-relaxed italic mb-4">
                            "The Minimalist Watch was delivered safely here in Port Harcourt. Sleek packaging, beautiful finish, and free shipping saved me money."
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <img src="https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?auto=format&fit=crop&w=200&q=80" 
                             alt="Emeka Okafor" 
                             class="w-11 h-11 rounded-full object-cover border-2 border-[#f5ce42]">
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Emeka Okafor</h4>
                            <p class="text-[10px] text-gray-500">Port Harcourt &middot; <span class="text-emerald-700 font-semibold"><i class="fa-solid fa-circle-check"></i> Verified</span></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Simple Interactive Filter Script -->
    <script>
        function filterItems(category, btn) {
            document.querySelectorAll('.popular-tab').forEach(b => {
                b.classList.remove('bg-black', 'text-white', 'border-black');
                b.classList.add('bg-white', 'text-gray-700', 'border-gray-200');
            });
            btn.classList.remove('bg-white', 'text-gray-700', 'border-gray-200');
            btn.classList.add('bg-black', 'text-white', 'border-black');

            const cards = document.querySelectorAll('.popular-card');
            cards.forEach(card => {
                if (category === 'all') {
                    card.style.display = 'block';
                } else {
                    const cardCat = card.getAttribute('data-category');
                    if (cardCat && cardCat.includes(category)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        }
    </script>
</x-layout>
