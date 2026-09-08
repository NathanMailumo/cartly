<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="border-2 border-[#231f1d] bg-[#faf8f4] p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h1 class="font-masthead text-3xl sm:text-4xl font-bold text-[#161413]">
                    Welcome back, {{ Auth::user()->name ?? 'User' }}
                </h1>
                <p class="font-serif-body italic text-sm text-[#5e5953] mt-1">
                    Manage your store products and account details from your dashboard.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('products.product') }}"
                    class="inline-flex items-center justify-center px-5 py-3 border border-[#231f1d] text-[#161413] font-editorial-sans text-xs uppercase tracking-[0.16em] hover:bg-[#161413] hover:text-[#f7f4ee] transition">
                    View Products
                </a>
                <a href="{{ route('addProduct') }}"
                    class="inline-flex items-center justify-center px-5 py-3 bg-[#161413] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs uppercase tracking-[0.16em] transition">
                    Add Product
                </a>
            </div>
        </div>

    </div>
</x-layout>