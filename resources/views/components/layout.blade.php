<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Easybuy · {{$title ?? 'Marketplace & Archive'}}</title>

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

    <!-- Main Content Wrapper -->
    <main class="flex-1 flex flex-col">
        @auth
            <nav class="w-full border-b border-[#231f1d] bg-[#f7f4ee]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-3">
                    <a href="{{ route('dashboard') }}" class="font-masthead text-xl font-bold text-[#161413] hover:opacity-70 transition">
                        Easybuy
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
                    <a href="{{ url('/') }}" class="font-masthead text-2xl sm:text-3xl font-black text-[#161413] hover:opacity-70 transition">Easybuy</a>
                    <div class="hidden lg:flex items-center gap-8 text-[10px] font-editorial-sans uppercase tracking-[0.18em] text-[#5e5953]">
                        <a href="{{ url('/') }}#how-it-works" class="hover:text-[#161413] transition">How It Works</a>
                        <a href="{{ url('/') }}#reviews" class="hover:text-[#161413] transition">Reviews</a>
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

    <footer class="mt-auto border-t-2 border-[#231f1d] bg-[#f7f4ee] text-[#5e5953]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-[#cfc8bc] pb-7">
                <div>
                    <a href="{{ url('/') }}" class="font-masthead text-2xl font-black text-[#161413] hover:opacity-70 transition">Easybuy</a>
                    <p class="font-serif-body text-sm leading-relaxed mt-2 max-w-xs">
                        A simple marketplace for buying and selling everyday products across Nigeria.
                    </p>
                </div>

                <div>
                    <h2 class="font-editorial-sans text-[9px] uppercase tracking-[0.2em] text-[#161413] mb-3">Explore</h2>
                    <div class="flex flex-col gap-2 font-editorial-sans text-[10px] uppercase tracking-[0.12em]">
                        <a href="{{ route('buyer.browse') }}" class="hover:text-[#161413] transition"><i class="fa-solid fa-arrow-right text-[9px] mr-2"></i>Browse Products</a>
                        <a href="{{ url('/') }}#how-it-works" class="hover:text-[#161413] transition"><i class="fa-solid fa-arrow-right text-[9px] mr-2"></i>How It Works</a>
                        <a href="{{ url('/') }}#reviews" class="hover:text-[#161413] transition"><i class="fa-solid fa-arrow-right text-[9px] mr-2"></i>Reviews</a>
                    </div>
                </div>

                <div>
                    <h2 class="font-editorial-sans text-[9px] uppercase tracking-[0.2em] text-[#161413] mb-3">Need Help?</h2>
                    <p class="font-serif-body text-sm leading-relaxed">
                        Sign in to manage your orders, cart, or product listings.
                    </p>
                    <div class="flex items-center gap-4 mt-3 text-[#161413]">
                        <a href="{{ route('login') }}" title="Sign in" class="hover:text-[#787167] transition"><i class="fa-solid fa-right-to-bracket"></i></a>
                        <a href="{{ route('register.form') }}" title="Register" class="hover:text-[#787167] transition"><i class="fa-solid fa-user-plus"></i></a>
                        <span title="Secure marketplace"><i class="fa-solid fa-shield-halved"></i></span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-2 pt-4 text-center sm:text-left font-editorial-sans text-[9px] uppercase tracking-[0.12em]">
                <span><i class="fa-solid fa-check mr-1"></i> Trusted products and sellers</span>
                <span>&copy; {{ date('Y') }} Easybuy, Inc.</span>
            </div>
        </div>
    </footer>

</body>
</html>