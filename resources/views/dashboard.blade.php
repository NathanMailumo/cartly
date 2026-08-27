<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Welcome Header & Action Card -->
        <div class="bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-slate-100 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">
                    Welcome back, {{ Auth::user()->name ?? 'User' }}! 👋
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Manage your store products and account details right from your dashboard.
                </p>
            </div>

            <div>
                <a href="{{ route('addProduct') }}"
                    class="inline-flex items-center justify-center px-5 py-3 bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold rounded-xl shadow-sm transition duration-150 active:scale-[0.99]">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Product
                </a>
            </div>
        </div>

    </div>
</x-layout>