<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cartly : {{$title ?? ''}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-950 min-h-screen text-slate-100 antialiased flex flex-col font-sans">

    <!-- Navigation Bar -->
    <nav class="bg-slate-900 border-b border-slate-800 sticky top-0 z-50 w-full shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 gap-4">

                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-black text-white tracking-wider flex items-center gap-1">
                        CARTLY<span class="text-amber-500">.</span>
                    </a>
                </div>

                @auth
                    <!-- BUYER NAV: Search Bar, Cart, Logout -->
                    @if(Auth::user()->role === 'buyer')
                        <div class="flex-1 max-w-2xl mx-4">
                            <form action="{{ route('products.product') }}" method="GET" class="flex items-center">
                                <div class="relative w-full">
                                    <input type="text" name="search" placeholder="Search Cartly products..." 
                                        class="w-full bg-slate-800 text-white placeholder-slate-400 text-sm rounded-l-lg pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 border border-slate-700">
                                    <button type="submit" class="absolute right-0 top-0 bottom-0 px-4 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-r-lg transition">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="flex items-center space-x-6 shrink-0">
                            <a href="{{ route('buyer.browse') }}" class="text-sm font-semibold text-slate-300 hover:text-amber-400 transition flex items-center gap-2">
                                <i class="fa-solid fa-border-all"></i> Browse
                            </a>

                            <a href="#" class="relative text-slate-300 hover:text-amber-400 transition flex items-center gap-1.5 font-semibold text-sm">
                                <i class="fa-solid fa-cart-shopping text-lg"></i>
                                <span class="hidden sm:inline">Cart</span>
                                <span class="bg-amber-500 text-slate-950 font-bold text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                            </a>

                            <form method="POST" action="{{ route('auth.logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-sm font-semibold text-slate-400 hover:text-red-400 transition flex items-center gap-1.5">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="hidden sm:inline">Logout</span>
                                </button>
                            </form>
                        </div>

                    <!-- SELLER NAV: Products & Logout -->
                    @elseif(Auth::user()->role === 'seller')
                        <div class="flex items-center space-x-6 ml-auto">
                            <a href="{{ route('products.product') }}" class="text-sm font-semibold text-slate-300 hover:text-amber-400 transition flex items-center gap-2">
                                <i class="fa-solid fa-box-archive"></i> Products
                            </a>

                            <form method="POST" action="{{ route('auth.logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-sm font-semibold text-slate-400 hover:text-red-400 transition flex items-center gap-1.5">
                                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth

                <!-- GUEST NAV: Login & Register -->
                @guest
                    <div class="flex items-center space-x-4 ml-auto">
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-300 hover:text-white transition px-3 py-2">
                            Sign In
                        </a>
                        <a href="{{ route('register.form') }}" class="text-sm font-semibold bg-amber-500 hover:bg-amber-600 text-slate-950 px-4 py-2 rounded-lg transition shadow-md">
                            Get Started
                        </a>
                    </div>
                @endguest

            </div>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <main class="flex-1 flex flex-col">
        {{$slot}}
    </main>

    <footer class="bg-slate-900 border-t border-slate-800 text-slate-500 text-xs text-center py-6">
        &copy; {{ date('Y') }} Cartly Marketplace. All rights reserved.
    </footer>

</body>
</html>