<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Easybuy · Admin Archive Control</title>

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
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row antialiased selection:bg-[#161413] selection:text-[#f7f4ee]">

    <!-- Sidebar Dashboard Navigation -->
    <aside class="w-full md:w-64 bg-[#f7f4ee] border-b md:border-b-0 md:border-r border-[#231f1d] flex-shrink-0 flex flex-col justify-between">
        <div>
            <!-- Header Brand -->
            <div class="p-5 border-b border-[#231f1d]">
                <a href="{{ route('admin.index') }}" class="font-masthead text-2xl font-black text-[#161413] block">
                    Easybuy
                </a>
                <span class="font-editorial-sans text-[9px] uppercase tracking-[0.2em] text-[#787167] block mt-1">
                    Administrator Control
                </span>
            </div>

            <!-- Navigation Links -->
            <nav class="p-3 space-y-1 font-editorial-sans text-xs uppercase tracking-wider">
                <a href="{{ route('admin.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 transition {{ request()->routeIs('admin.index') ? 'bg-[#161413] text-[#f7f4ee] font-bold' : 'text-[#3d3833] hover:bg-[#eae4d7] hover:text-[#161413]' }}">
                    <i class="fa-solid fa-chart-line text-sm w-4"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.admin_product') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 transition {{ request()->routeIs('products.*') ? 'bg-[#161413] text-[#f7f4ee] font-bold' : 'text-[#3d3833] hover:bg-[#eae4d7] hover:text-[#161413]' }}">
                    <i class="fa-solid fa-box text-sm w-4"></i>
                    <span>Products</span>
                </a>

                <a href="#" 
                   class="flex items-center gap-3 px-3 py-2.5 text-[#3d3833] hover:bg-[#eae4d7] hover:text-[#161413] transition">
                    <i class="fa-solid fa-users text-sm w-4"></i>
                    <span>Users</span>
                </a>

                <a href="#" 
                   class="flex items-center gap-3 px-3 py-2.5 text-[#3d3833] hover:bg-[#eae4d7] hover:text-[#161413] transition">
                    <i class="fa-solid fa-receipt text-sm w-4"></i>
                    <span>Orders</span>
                </a>

                <a href="#" 
                   class="flex items-center gap-3 px-3 py-2.5 text-[#3d3833] hover:bg-[#eae4d7] hover:text-[#161413] transition">
                    <i class="fa-solid fa-sliders text-sm w-4"></i>
                    <span>Settings</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer & Logout -->
        <div class="p-4 border-t border-[#231f1d] bg-[#faf8f4]">
            <div class="mb-3">
                <span class="block text-xs font-bold font-masthead text-[#161413]">
                    {{ Auth::guard('admin')->user()->name ?? 'System Admin' }}
                </span>
                <span class="block text-[10px] font-editorial-sans text-[#787167] truncate">
                    {{ Auth::guard('admin')->user()->email ?? 'admin@easybuy.com' }}
                </span>
            </div>

            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="w-full py-2 border border-[#9b2c2c] text-[#9b2c2c] hover:bg-[#9b2c2c] hover:text-[#f7f4ee] font-editorial-sans text-[10px] uppercase tracking-[0.16em] transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 bg-[#faf8f4] min-h-screen flex flex-col">
        <!-- Top Bar Header -->
        <header class="w-full border-b border-[#231f1d] bg-[#f7f4ee] px-6 py-4 flex items-center justify-between">
            <h1 class="font-masthead text-xl font-bold text-[#161413]">
                {{ $header ?? 'System Dashboard' }}
            </h1>
            <div class="font-editorial-sans text-[10px] uppercase tracking-[0.16em] text-[#787167]">
                Issue Date: {{ date('M d, Y') }}
            </div>
        </header>

        <!-- Dynamic Content Slot -->
        <div class="p-4 sm:p-6 lg:p-8 flex-1">
            {{ $slot }}
        </div>
    </main>

</body>
</html>