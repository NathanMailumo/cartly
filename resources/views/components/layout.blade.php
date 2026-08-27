<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cartly : {{$title ?? ''}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-slate-100 to-indigo-100 min-h-screen text-slate-800 antialiased flex flex-col">

    <!-- Navigation Bar (Only visible when user is logged in) -->
    @auth
        <nav class="bg-white/90 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">

                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-slate-900 tracking-tight">
                            Cartly<span class="text-indigo-600">.</span>
                        </a>
                    </div>

                    <!-- Right Nav Links -->
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('products.product') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">
                            Products
                        </a>

                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('auth.logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-sm font-semibold text-slate-500 hover:text-red-600 transition bg-transparent border-0 p-0 cursor-pointer">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </nav>
    @endauth

    <!-- Main Content Wrapper (Centers guest cards automatically) -->
    <main class="flex-1 flex flex-col justify-center items-center p-4">
        {{$slot}}
    </main>

</body>
</html>