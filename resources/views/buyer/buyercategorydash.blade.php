<x-layout>
    <x-slot:title>Browse Categories</x-slot:title>

    <div class="w-full flex min-h-screen">

        {{-- ===================== LEFT SIDEBAR ===================== --}}
        <aside class="w-64 shrink-0 bg-slate-900 border-r border-slate-800 sticky top-16 self-start h-[calc(100vh-4rem)] overflow-y-auto">
            <div class="p-5">
                <h2 class="text-xs font-bold text-amber-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-layer-group"></i> Categories
                </h2>

                {{-- All Categories link --}}
                <a href="{{ route('buyer.browse') }}"
                   class="flex items-center justify-between w-full px-3 py-2.5 rounded-xl mb-1 text-sm font-semibold transition
                          {{ !$selectedCategory ? 'bg-amber-500 text-slate-950' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <span class="flex items-center gap-2">
                        <i class="fa-solid fa-shapes w-4 text-center"></i>
                        All Categories
                    </span>
                    <span class="text-xs font-bold {{ !$selectedCategory ? 'bg-amber-600 text-white' : 'bg-slate-800 text-slate-400' }} rounded-full px-2 py-0.5">
                        {{ $categories->sum('products_count') }}
                    </span>
                </a>

                {{-- Individual category links --}}
                @foreach($categories as $cat)
                    <a href="{{ route('buyer.browse', ['category' => $cat->id]) }}"
                       class="flex items-center justify-between w-full px-3 py-2.5 rounded-xl mb-1 text-sm font-semibold transition
                              {{ $selectedCategory && $selectedCategory->id === $cat->id
                                  ? 'bg-amber-500 text-slate-950'
                                  : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-tag w-4 text-center text-xs"></i>
                            {{ $cat->categoryname }}
                        </span>
                        <span class="text-xs font-bold {{ $selectedCategory && $selectedCategory->id === $cat->id ? 'bg-amber-600 text-white' : 'bg-slate-800 text-slate-400' }} rounded-full px-2 py-0.5">
                            {{ $cat->products_count }}
                        </span>
                    </a>
                @endforeach

                @if($categories->isEmpty())
                    <p class="text-slate-500 text-xs text-center py-8">No categories yet.</p>
                @endif
            </div>
        </aside>

        {{-- ===================== MAIN CONTENT ===================== --}}
        <div class="flex-1 px-6 py-8">

            {{-- ---- Page Header ---- --}}
            <div class="flex items-center justify-between mb-8 border-b border-slate-800 pb-5">
                <div>
                    @if($selectedCategory)
                        <div class="flex items-center gap-2 mb-1">
                            <a href="{{ route('buyer.browse') }}" class="text-slate-500 hover:text-amber-400 text-xs transition">
                                <i class="fa-solid fa-arrow-left mr-1"></i>All Categories
                            </a>
                        </div>
                        <h1 class="text-2xl font-black text-white tracking-tight">{{ $selectedCategory->categoryname }}</h1>
                        <p class="text-slate-400 text-xs mt-1">{{ $products->count() }} product{{ $products->count() !== 1 ? 's' : '' }} available</p>
                    @else
                        <h1 class="text-2xl font-black text-white tracking-tight">Browse Categories</h1>
                        <p class="text-slate-400 text-xs mt-1">Explore everything Cartly has to offer</p>
                    @endif
                </div>

                {{-- Search bar --}}
                <form action="{{ route('buyer.browse') }}" method="GET" class="flex items-center gap-2">
                    @if($selectedCategory)
                        <input type="hidden" name="category" value="{{ $selectedCategory->id }}">
                    @endif
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search products..."
                               value="{{ request('search') }}"
                               class="bg-slate-800 border border-slate-700 text-white text-sm rounded-lg pl-4 pr-10 py-2 w-52 focus:outline-none focus:ring-2 focus:ring-amber-500 placeholder-slate-500">
                        <button type="submit" class="absolute right-0 top-0 bottom-0 px-3 text-slate-400 hover:text-amber-400 transition">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- ============================================================
                 CASE A: No category selected - show category cards grid
                 ============================================================ --}}
            @if(!$selectedCategory)

                @php
                    $iconMap = [
                        'electronics'   => ['icon' => 'fa-microchip',            'gradient' => 'from-blue-600 to-cyan-500'],
                        'clothing'      => ['icon' => 'fa-shirt',                'gradient' => 'from-pink-600 to-rose-400'],
                        'fashion'       => ['icon' => 'fa-shirt',                'gradient' => 'from-pink-600 to-rose-400'],
                        'food'          => ['icon' => 'fa-bowl-food',            'gradient' => 'from-orange-500 to-yellow-400'],
                        'books'         => ['icon' => 'fa-book-open',            'gradient' => 'from-emerald-600 to-teal-400'],
                        'sports'        => ['icon' => 'fa-dumbbell',             'gradient' => 'from-lime-600 to-green-400'],
                        'home'          => ['icon' => 'fa-couch',                'gradient' => 'from-amber-600 to-yellow-400'],
                        'furniture'     => ['icon' => 'fa-couch',                'gradient' => 'from-amber-600 to-yellow-400'],
                        'beauty'        => ['icon' => 'fa-spa',                  'gradient' => 'from-fuchsia-600 to-pink-400'],
                        'health'        => ['icon' => 'fa-heart-pulse',          'gradient' => 'from-red-600 to-rose-400'],
                        'toys'          => ['icon' => 'fa-gamepad',              'gradient' => 'from-violet-600 to-purple-400'],
                        'games'         => ['icon' => 'fa-gamepad',              'gradient' => 'from-violet-600 to-purple-400'],
                        'automotive'    => ['icon' => 'fa-car',                  'gradient' => 'from-slate-500 to-slate-400'],
                        'jewelry'       => ['icon' => 'fa-gem',                  'gradient' => 'from-yellow-500 to-amber-300'],
                        'music'         => ['icon' => 'fa-music',                'gradient' => 'from-indigo-600 to-blue-400'],
                        'art'           => ['icon' => 'fa-palette',              'gradient' => 'from-orange-600 to-red-400'],
                        'garden'        => ['icon' => 'fa-seedling',             'gradient' => 'from-green-600 to-lime-400'],
                        'pets'          => ['icon' => 'fa-paw',                  'gradient' => 'from-amber-500 to-orange-400'],
                        'tools'         => ['icon' => 'fa-screwdriver-wrench',   'gradient' => 'from-slate-600 to-slate-400'],
                        'appliances'    => ['icon' => 'fa-blender',              'gradient' => 'from-sky-600 to-blue-400'],
                        'default'       => ['icon' => 'fa-box-open',             'gradient' => 'from-amber-600 to-amber-400'],
                    ];

                    $gradients = [
                        'from-blue-600 to-cyan-500',
                        'from-violet-600 to-purple-400',
                        'from-emerald-600 to-teal-400',
                        'from-rose-600 to-pink-400',
                        'from-amber-600 to-yellow-400',
                        'from-indigo-600 to-blue-400',
                        'from-lime-600 to-green-400',
                        'from-fuchsia-600 to-pink-400',
                    ];

                    $icons = [
                        'fa-box-open','fa-tag','fa-star','fa-bolt','fa-fire',
                        'fa-cube','fa-layer-group','fa-shapes',
                    ];
                @endphp

                @if($categories->isEmpty())
                    <div class="flex flex-col items-center justify-center py-24 text-center">
                        <div class="w-20 h-20 rounded-full bg-slate-800 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-layer-group text-3xl text-slate-600"></i>
                        </div>
                        <p class="text-slate-400 text-sm font-semibold">No categories found</p>
                        <p class="text-slate-600 text-xs mt-1">Categories will appear here once sellers start listing products.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                        @foreach($categories as $index => $cat)
                            @php
                                $key = strtolower(trim($cat->categoryname));
                                $display = $iconMap['default'];
                                foreach ($iconMap as $k => $v) {
                                    if ($k !== 'default' && str_contains($key, $k)) {
                                        $display = $v;
                                        break;
                                    }
                                }
                                // fallback cycling gradient/icon for unknown categories
                                if ($display === $iconMap['default']) {
                                    $display = [
                                        'icon'     => $icons[$index % count($icons)],
                                        'gradient' => $gradients[$index % count($gradients)],
                                    ];
                                }
                            @endphp
                            <a href="{{ route('buyer.browse', ['category' => $cat->id]) }}"
                               class="group relative bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:border-slate-600 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col cursor-pointer">

                                {{-- Gradient banner --}}
                                <div class="h-32 bg-gradient-to-br {{ $display['gradient'] }} flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(ellipse_at_top_right,_white,_transparent)]"></div>
                                    <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-white/10 blur-xl"></div>
                                    <i class="fa-solid {{ $display['icon'] }} text-4xl text-white drop-shadow-lg relative z-10 group-hover:scale-110 transition-transform duration-300"></i>
                                </div>

                                {{-- Card body --}}
                                <div class="p-4 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-base group-hover:text-amber-400 transition">
                                            {{ $cat->categoryname }}
                                        </h3>
                                        <p class="text-slate-500 text-xs mt-1">
                                            {{ $cat->products_count }}
                                            {{ $cat->products_count === 1 ? 'product' : 'products' }} available
                                        </p>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-amber-400 group-hover:gap-2 transition-all duration-200">
                                            Shop Now <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                        </span>
                                        <span class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center group-hover:bg-amber-500 group-hover:border-amber-500 transition-all">
                                            <i class="fa-solid fa-chevron-right text-[10px] text-slate-400 group-hover:text-slate-950 transition-colors"></i>
                                        </span>
                                    </div>
                                </div>

                                {{-- Bottom accent line --}}
                                <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r {{ $display['gradient'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        @endforeach
                    </div>
                @endif

            {{-- ============================================================
                 CASE B: Category selected - show filtered products
                 ============================================================ --}}
            @else
                @if($products->isEmpty())
                    <div class="flex flex-col items-center justify-center py-24 text-center">
                        <div class="w-20 h-20 rounded-full bg-slate-800 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-box-open text-3xl text-slate-600"></i>
                        </div>
                        <p class="text-slate-400 text-sm font-semibold">No products in this category yet</p>
                        <p class="text-slate-600 text-xs mt-1">Check back soon — sellers are adding new items daily.</p>
                        <a href="{{ route('buyer.browse') }}"
                           class="mt-6 px-5 py-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl text-sm transition">
                            Browse all categories
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                        @foreach($products as $product)
                            <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:border-slate-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 group flex flex-col">

                                {{-- Product image placeholder --}}
                                <div class="h-44 bg-slate-800 flex items-center justify-center text-slate-600 relative overflow-hidden">
                                    <i class="fa-solid fa-image text-4xl group-hover:scale-110 transition-transform duration-300"></i>
                                    <div class="absolute top-3 right-3 bg-amber-500 text-slate-950 text-[10px] font-black px-2 py-0.5 rounded-full uppercase tracking-wide">
                                        {{ $product->category->categoryname ?? 'N/A' }}
                                    </div>
                                </div>

                                {{-- Product info --}}
                                <div class="p-4 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-sm group-hover:text-amber-400 transition leading-tight">
                                            {{ $product->productname }}
                                        </h3>
                                        <p class="text-slate-500 text-xs mt-1 line-clamp-2">
                                            {{ $product->description ?? 'No description provided.' }}
                                        </p>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-lg font-black text-amber-400">
                                            ${{ number_format($product->productprice, 2) }}
                                        </span>
                                        <button class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 active:scale-95 text-slate-950 font-bold rounded-xl text-xs transition-all flex items-center gap-1.5">
                                            <i class="fa-solid fa-cart-plus text-[10px]"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif

        </div>{{-- /main content --}}
    </div>{{-- /flex wrapper --}}

</x-layout>
