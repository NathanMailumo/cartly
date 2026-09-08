<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cartly · {{$title ?? 'Marketplace & Archive'}}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Playfair Display, EB Garamond, Cinzel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <!-- FontAwesome Vector Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --paper-bg: #f7f4ee;
            --paper-border: #231f1d;
            --paper-subtle-border: #dcd7ce;
            --ink-black: #161413;
            --ink-muted: #5e5953;
        }

        body {
            background-color: var(--paper-bg);
            color: var(--ink-black);
            font-family: 'EB Garamond', Georgia, serif;
            -webkit-font-smoothing: antialiased;
        }

        .font-masthead {
            font-family: 'Playfair Display', Georgia, serif;
            letter-spacing: -0.02em;
        }

        .font-serif-body {
            font-family: 'EB Garamond', Georgia, serif;
        }

        .font-editorial-sans {
            font-family: 'Cinzel', serif;
            letter-spacing: 0.08em;
        }

        .double-border-bottom {
            border-bottom: 3px double #231f1d;
        }

        .double-border-top {
            border-top: 3px double #231f1d;
        }

        .border-ink {
            border-color: #231f1d;
        }

        .border-subtle {
            border-color: #dcd7ce;
        }

        /* Newspaper Column Dividers */
        .col-rule-right {
            border-right: 1px solid #dcd7ce;
        }

        .col-rule-left {
            border-left: 1px solid #dcd7ce;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased selection:bg-[#161413] selection:text-[#f7f4ee]">

    <!-- Global Top Utility Notice -->
    <header class="w-full border-b border-[#231f1d] bg-[#f7f4ee] text-[11px] font-editorial-sans uppercase tracking-widest text-[#5e5953]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-2 flex items-center justify-between">
            <span class="hidden sm:inline">Vol. VIII No. 17 · Est. 2024</span>
                <span class="text-center font-semibold text-[#161413] tracking-[0.15em] mx-auto sm:mx-0">
                <i class="fa-solid fa-star text-[8px] mr-1"></i> Complimentary Shipping on All Orders <i class="fa-solid fa-star text-[8px] ml-1"></i>
            </span>
            <span class="hidden sm:inline">U.S. Edition · {{ date('l, F j, Y') }}</span>
        </div>
    </header>

    <!-- Main Content Wrapper -->
    <main class="flex-1 flex flex-col">
        @auth
            <nav class="w-full border-b border-[#231f1d] bg-[#f7f4ee]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-3">
                    <a href="{{ route('dashboard') }}" class="font-masthead text-xl font-bold text-[#161413] hover:opacity-70 transition">
                        Cartly
                    </a>

                    <div class="flex items-center gap-4 sm:gap-6 text-[10px] font-editorial-sans uppercase tracking-[0.16em] text-[#5e5953]">
                        <a href="{{ route('dashboard') }}" class="hover:text-[#161413] transition">Dashboard</a>
                        @if(Auth::user()->role === 'seller')
                            <a href="{{ route('products.product') }}" class="hover:text-[#161413] transition">Products</a>
                            <a href="{{ route('addProduct') }}" class="hover:text-[#161413] transition">Add Product</a>
                        @else
                            <a href="{{ route('buyer.browse') }}" class="hover:text-[#161413] transition">Browse</a>
                            <a href="{{ route('buyer.cart') }}" class="hover:text-[#161413] transition">Cart</a>
                        @endif
                        <form method="POST" action="{{ route('auth.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-[#9b2c2c] hover:text-[#161413] transition">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        @else
            <nav class="w-full border-b border-[#231f1d] bg-[#f7f4ee]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ url('/') }}" class="font-masthead text-2xl sm:text-3xl font-black text-[#161413] hover:opacity-70 transition">Cartly</a>
                    <div class="hidden lg:flex items-center gap-8 text-[10px] font-editorial-sans uppercase tracking-[0.18em] text-[#5e5953]">
                        <a href="{{ url('/') }}" class="hover:text-[#161413] transition">Shop</a>
                        <a href="{{ url('/') }}#collection" class="hover:text-[#161413] transition">Collection</a>
                        <a href="{{ url('/') }}#archive" class="hover:text-[#161413] transition">Editorial</a>
                        <a href="{{ url('/') }}#craftsmanship" class="hover:text-[#161413] transition">Craftsmanship</a>
                        <a href="{{ url('/') }}#archive" class="hover:text-[#161413] transition">Journal</a>
                    </div>
                    <div class="flex items-center gap-4 text-[10px] font-editorial-sans uppercase tracking-[0.16em]">
                        <a href="{{ route('login') }}" class="text-[#5e5953] hover:text-[#161413] transition">Sign In</a>
                        <a href="{{ route('register.form') }}" class="bg-[#1a1918] text-[#f7f4ee] px-4 py-2 hover:bg-black transition">Register <i class="fa-solid fa-arrow-right text-[9px] ml-1"></i></a>
                    </div>
                </div>
            </nav>
        @endauth

        {{$slot}}
    </main>

    <!-- Newspaper Editorial Footer -->
    <footer class="mt-auto border-t-2 border-[#231f1d] bg-[#f7f4ee] text-[11px] font-editorial-sans uppercase text-[#5e5953] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
            <span>All pieces are authenticated · Cartly Marketplace Archive</span>
            <span class="hidden sm:inline text-xs"><i class="fa-solid fa-star"></i></span>
            <span>&copy; {{ date('Y') }} Cartly, Inc. · Paris · London · New York</span>
        </div>
    </footer>

</body>
</html>