<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'easybuy · Shop Smarter, Live Better' }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            yellow: '#f5ce42',
                            'yellow-hover': '#e6c035',
                            dark: '#111111',
                            muted: '#737373',
                            cream: '#faf9f6',
                            border: '#e5e5e5',
                        }
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'Georgia', 'serif'],
                        sans: ['Plus Jakarta Sans', 'Inter', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts: Playfair Display & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome Vector Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #faf9f6;
            color: #111111;
            -webkit-font-smoothing: antialiased;
        }

        .font-serif-heading {
            font-family: 'Playfair Display', Georgia, serif;
            letter-spacing: -0.02em;
        }

        /* Smooth CSS Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.96); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        .animate-fade-in {
            animation: fadeIn 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-fade-in-delayed {
            animation: fadeIn 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.15s forwards;
            opacity: 0;
        }

        .animate-fade-in-slow {
            animation: fadeIn 1s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
            opacity: 0;
        }

        .animate-float {
            animation: floatSlow 4s ease-in-out infinite;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #d1d1d1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased selection:bg-[#f5ce42] selection:text-black pt-[68px]">

    @php
        $cartCount = Auth::check() ? \App\Models\cart::where('buyer_id', Auth::id())->sum('quantity') : 0;
        $navCategories = \App\Models\Category::take(5)->get();
    @endphp

    <!-- Global Fixed Header / Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 w-full bg-[#faf9f6]/95 backdrop-blur-md border-b border-gray-200/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-[68px] flex items-center justify-between gap-4">
            
            <!-- Logo: Image Logo (icon on mobile, full logo on desktop) -->
            <a href="{{ route('dashboard') }}" class="flex items-center hover:opacity-85 transition flex-shrink-0" title="easybuy">
                <!-- Mobile: Icon Only (<640px) -->
                <img src="{{ asset('images/easybuy-icon.png') }}" alt="easybuy" class="h-9 w-auto object-contain block sm:hidden">
                <!-- Desktop: Full Logo with Text (>=640px) -->
                <img src="{{ asset('images/easybuy-logo.png') }}" alt="easybuy" class="h-8 sm:h-9 w-auto object-contain hidden sm:block">
            </a>

            <!-- Center Navigation Links (Only shown to guests linking to welcome page sections on desktop) -->
            @guest
                <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-gray-700">
                    <a href="{{ url('/') }}#how-it-works" class="hover:text-black transition">
                        How It Works
                    </a>
                    <a href="{{ url('/') }}#top-picks" class="hover:text-black transition">
                        Top Picks
                    </a>
                    <a href="{{ url('/') }}#popular" class="hover:text-black transition">
                        Popular
                    </a>
                    <a href="{{ url('/') }}#reviews" class="hover:text-black transition">
                        Reviews
                    </a>
                </nav>
            @endguest

            <!-- Desktop Right Actions -->
            <div class="hidden md:flex items-center gap-5 text-sm">
                @auth
                    @if(Auth::user()->role === 'seller')
                        <a href="{{ route('seller.dashboard') }}" class="text-xs font-semibold uppercase tracking-wider text-gray-700 hover:text-black transition">
                            Dashboard
                        </a>
                        <a href="{{ route('products.product') }}" class="text-xs font-semibold uppercase tracking-wider text-gray-700 hover:text-black transition">
                            Products
                        </a>
                        <a href="{{ route('addProduct') }}" class="bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs px-3.5 py-1.5 rounded transition shadow-sm">
                            + Add Product
                        </a>
                    @else
                        <a href="{{ route('buyer.dashboard') }}" class="text-xs font-semibold uppercase tracking-wider text-gray-700 hover:text-black transition">
                            Dashboard
                        </a>
                        <a href="{{ route('buyer.browse') }}" class="text-xs font-semibold uppercase tracking-wider text-gray-700 hover:text-black transition">
                            Browse
                        </a>

                        <!-- Cart with live count badge -->
                        <a href="{{ route('buyer.cart') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-700 hover:text-black transition" title="View Cart">
                            <i class="fa-solid fa-bag-shopping text-base text-gray-900"></i>
                            <span>Cart</span>
                            <span class="bg-[#f5ce42] text-black text-[11px] font-bold px-2 py-0.5 rounded-full min-w-[20px] text-center shadow-sm">
                                {{ $cartCount }}
                            </span>
                        </a>
                    @endif

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('auth.logout') }}" class="inline ml-1">
                        @csrf
                        <button type="submit" class="text-xs font-semibold uppercase tracking-wider text-red-600 hover:text-red-700 transition flex items-center gap-1.5" title="Sign Out">
                            <span>Logout</span>
                            <i class="fa-solid fa-arrow-right-from-bracket text-[11px]"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-gray-700 hover:text-black transition">
                        Sign In
                    </a>
                    <a href="{{ route('register.form') }}" class="bg-[#111111] hover:bg-black text-white font-medium text-xs sm:text-sm px-4 py-2 rounded transition flex items-center gap-1.5 shadow-sm">
                        <span>Get Started</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                @endauth
            </div>

            <!-- Mobile Right Actions (Cart Quick-Link + Hamburger Dropdown Toggle) -->
            <div class="flex md:hidden items-center gap-3">
                @auth
                    @if(Auth::user()->role === 'buyer')
                        <a href="{{ route('buyer.cart') }}" class="relative p-2 text-gray-800" title="View Cart">
                            <i class="fa-solid fa-bag-shopping text-lg"></i>
                            @if($cartCount > 0)
                                <span class="absolute 0 top-0.5 -right-1 bg-[#f5ce42] text-black text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    @endif
                @endauth

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button" class="p-2 text-gray-800 hover:text-black focus:outline-none transition rounded" aria-label="Toggle navigation menu">
                    <i id="mobile-menu-icon" class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Collapsible Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden w-full bg-[#faf9f6] border-t border-gray-200 shadow-xl transition-all">
            <div class="px-5 py-5 space-y-4">
                @guest
                    <div class="space-y-3 font-medium text-sm text-gray-800 pb-4 border-b border-gray-200">
                        <a href="{{ url('/') }}#how-it-works" class="mobile-nav-link block hover:text-black py-1">
                            <i class="fa-solid fa-circle-question mr-2 text-gray-500"></i> How It Works
                        </a>
                        <a href="{{ url('/') }}#top-picks" class="mobile-nav-link block hover:text-black py-1">
                            <i class="fa-solid fa-fire mr-2 text-amber-500"></i> Top Picks
                        </a>
                        <a href="{{ url('/') }}#popular" class="mobile-nav-link block hover:text-black py-1">
                            <i class="fa-solid fa-star mr-2 text-amber-500"></i> Popular
                        </a>
                        <a href="{{ url('/') }}#reviews" class="mobile-nav-link block hover:text-black py-1">
                            <i class="fa-solid fa-comments mr-2 text-gray-500"></i> Reviews
                        </a>
                    </div>
                    <div class="pt-2 flex flex-col gap-2.5">
                        <a href="{{ route('login') }}" class="w-full py-2.5 text-center text-sm font-semibold border border-gray-300 rounded text-gray-800 hover:bg-gray-100 transition">
                            Sign In
                        </a>
                        <a href="{{ route('register.form') }}" class="w-full py-2.5 text-center text-sm font-semibold bg-[#f5ce42] hover:bg-[#e6c035] text-black rounded transition shadow-sm">
                            Get Started &rarr;
                        </a>
                    </div>
                @else
                    @if(Auth::user()->role === 'seller')
                        <div class="space-y-3 font-medium text-sm text-gray-800 pb-4 border-b border-gray-200">
                            <a href="{{ route('seller.dashboard') }}" class="mobile-nav-link block hover:text-black py-1">
                                <i class="fa-solid fa-chart-pie mr-2 text-gray-500"></i> Dashboard
                            </a>
                            <a href="{{ route('products.product') }}" class="mobile-nav-link block hover:text-black py-1">
                                <i class="fa-solid fa-boxes-stacked mr-2 text-gray-500"></i> Products
                            </a>
                            <a href="{{ route('addProduct') }}" class="mobile-nav-link block hover:text-black py-1 text-amber-700 font-semibold">
                                <i class="fa-solid fa-plus mr-2"></i> Add Product
                            </a>
                        </div>
                    @else
                        <div class="space-y-3 font-medium text-sm text-gray-800 pb-4 border-b border-gray-200">
                            <a href="{{ route('buyer.dashboard') }}" class="mobile-nav-link block hover:text-black py-1">
                                <i class="fa-solid fa-house mr-2 text-gray-500"></i> Dashboard
                            </a>
                            <a href="{{ route('buyer.browse') }}" class="mobile-nav-link block hover:text-black py-1">
                                <i class="fa-solid fa-compass mr-2 text-gray-500"></i> Browse Store
                            </a>
                            <a href="{{ route('buyer.cart') }}" class="mobile-nav-link flex items-center justify-between hover:text-black py-1">
                                <span class="flex items-center"><i class="fa-solid fa-bag-shopping mr-2 text-gray-500"></i> Your Bag</span>
                                <span class="bg-[#f5ce42] text-black text-xs font-bold px-2 py-0.5 rounded-full">{{ $cartCount }}</span>
                            </a>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('auth.logout') }}" class="pt-2">
                        @csrf
                        <button type="submit" class="w-full py-2.5 text-center text-xs font-bold uppercase tracking-wider text-red-600 hover:text-red-700 border border-red-200 bg-red-50/50 rounded flex items-center justify-center gap-1.5 transition">
                            <span>Logout</span>
                            <i class="fa-solid fa-arrow-right-from-bracket text-[11px]"></i>
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col">
        {{ $slot }}
    </main>

    <!-- Global Easybuy Dark Footer with Social Links -->
    <footer class="mt-auto bg-[#111111] text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 border-b border-gray-800 pb-8 items-start">
                
                <!-- Brand Info with Logo Image -->
                <div class="md:col-span-6">
                    <a href="{{ route('dashboard') }}" class="inline-block bg-white/95 px-3 py-1.5 rounded hover:opacity-90 transition shadow-sm mb-2" title="easybuy">
                        <img src="{{ asset('images/easybuy-logo.png') }}" alt="easybuy" class="h-7 w-auto object-contain">
                    </a>
                    <p class="text-xs sm:text-sm text-gray-400 mt-2 max-w-md leading-relaxed">
                        The easiest way to shop for fashion, electronics, and accessories online in Nigeria. Fast delivery, safe payment, and hassle-free returns.
                    </p>

                    <!-- Social Media Links (Icons) -->
                    <div class="flex items-center gap-3 mt-5">
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-[#f5ce42] hover:text-black flex items-center justify-center transition text-sm text-gray-300" title="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-[#f5ce42] hover:text-black flex items-center justify-center transition text-sm text-gray-300" title="X (Twitter)">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-[#f5ce42] hover:text-black flex items-center justify-center transition text-sm text-gray-300" title="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-[#f5ce42] hover:text-black flex items-center justify-center transition text-sm text-gray-300" title="TikTok">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="https://whatsapp.com" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-[#f5ce42] hover:text-black flex items-center justify-center transition text-sm text-gray-300" title="WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Navigation Shortcuts -->
                <div class="md:col-span-3">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-white mb-3">Quick Navigation</h3>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="{{ url('/') }}#how-it-works" class="hover:text-white transition">How It Works</a></li>
                        <li><a href="{{ url('/') }}#top-picks" class="hover:text-white transition">Top Picks</a></li>
                        <li><a href="{{ url('/') }}#popular" class="hover:text-white transition">Popular Right Now</a></li>
                        <li><a href="{{ url('/') }}#reviews" class="hover:text-white transition">Customer Reviews</a></li>
                    </ul>
                </div>

                <!-- Account Actions -->
                <div class="md:col-span-3">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-white mb-3">Account</h3>
                    @guest
                        <div class="flex flex-col gap-2.5">
                            <a href="{{ route('login') }}" class="inline-block text-xs text-gray-300 hover:text-white transition py-2 px-4 border border-gray-700 rounded text-center">
                                Sign In
                            </a>
                            <a href="{{ route('register.form') }}" class="inline-block text-xs bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold py-2 px-4 rounded text-center transition shadow-sm">
                                Create Account &rarr;
                            </a>
                        </div>
                    @else
                        <ul class="space-y-2 text-xs text-gray-400">
                            @if(Auth::user()->role === 'seller')
                                <li><a href="{{ route('seller.dashboard') }}" class="hover:text-white transition">Seller Dashboard</a></li>
                                <li><a href="{{ route('products.product') }}" class="hover:text-white transition">Manage Products</a></li>
                            @else
                                <li><a href="{{ route('buyer.dashboard') }}" class="hover:text-white transition">My Dashboard</a></li>
                                <li><a href="{{ route('buyer.browse') }}" class="hover:text-white transition">Browse Store</a></li>
                                <li><a href="{{ route('buyer.cart') }}" class="hover:text-white transition">My Bag ({{ $cartCount }})</a></li>
                            @endif
                        </ul>
                    @endguest
                </div>

            </div>

            <!-- Bottom Copyright & Badges -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-8 text-xs text-gray-500">
                <span>&copy; {{ date('Y') }} easybuy, Inc. All rights reserved.</span>
                <div class="flex items-center gap-3">
                    <span>Free delivery over &#8358;5,000</span>
                    <span>&middot;</span>
                    <span>Safe Nigerian Payments</span>
                    <span>&middot;</span>
                    <span>Easy 30-day returns</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuIcon = document.getElementById('mobile-menu-icon');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isHidden = mobileMenu.classList.contains('hidden');
                if (isHidden) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenuIcon.classList.remove('fa-bars');
                    mobileMenuIcon.classList.add('fa-xmark');
                } else {
                    mobileMenu.classList.add('hidden');
                    mobileMenuIcon.classList.remove('fa-xmark');
                    mobileMenuIcon.classList.add('fa-bars');
                }
            });

            document.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    mobileMenuIcon.classList.remove('fa-xmark');
                    mobileMenuIcon.classList.add('fa-bars');
                });
            });

            document.addEventListener('click', function(e) {
                if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuIcon.classList.remove('fa-xmark');
                    mobileMenuIcon.classList.add('fa-bars');
                }
            });
        }
    </script>

</body>
</html>