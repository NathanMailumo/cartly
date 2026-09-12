<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>easybuy · Admin Control</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome Vector Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            background-color: #faf9f6;
            color: #111111;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .font-masthead {
            font-family: 'Playfair Display', Georgia, serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row antialiased selection:bg-[#f5ce42] selection:text-black">

    <!-- Sidebar Dashboard Navigation -->
    <aside class="w-full md:w-64 bg-white border-b md:border-b-0 md:border-r border-gray-200 flex-shrink-0 flex flex-col justify-between">
        <div>
            <!-- Header Brand -->
            <div class="p-6 border-b border-gray-200">
                <a href="{{ route('admin.index') }}" class="font-bold text-2xl text-black tracking-tight block">
                    easybuy
                </a>
                <span class="text-[10px] font-bold tracking-widest uppercase text-gray-400 block mt-1">
                    Administration Panel
                </span>
            </div>

            <!-- Nav Links -->
            <nav class="p-4 space-y-1.5 text-xs font-semibold">
                <a href="{{ route('admin.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded transition {{ request()->routeIs('admin.index') ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-black' }}">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.admin_product') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded transition {{ request()->routeIs('admin.admin_product') ? 'bg-black text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-black' }}">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span>Product Approvals</span>
                </a>

                <a href="{{ route('buyer.browse') }}" target="_blank"
                   class="flex items-center gap-3 px-4 py-3 rounded text-gray-600 hover:bg-gray-100 hover:text-black transition">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>View Public Store</span>
                </a>
            </nav>
        </div>

        <!-- Admin User / Logout Info -->
        <div class="p-5 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold text-gray-900 block">{{ Auth::guard('admin')->user()->name ?? 'Administrator' }}</span>
                    <span class="text-[10px] text-emerald-600 font-semibold block">&bull; Superuser Active</span>
                </div>
                <form method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="text-xs text-gray-400 hover:text-red-600 transition" title="Logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Panel -->
    <main class="flex-1 p-6 sm:p-10 overflow-y-auto">
        {{ $slot }}
    </main>

</body>
</html>