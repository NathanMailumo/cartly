<x-layout>
    <x-slot:title>Role</x-slot:title>

    <div class="max-w-lg w-full space-y-8 text-center py-6">
        <div>
            <h2 class="text-3xl font-black text-white tracking-tight">Join Cartly</h2>
            <p class="text-slate-400 text-sm mt-2">Choose how you want to interact with our marketplace</p>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mt-6">
            <!-- Buyer Choice -->
            <a href="{{ route('register', ['role' => 'buyer']) }}"
                class="group p-8 border border-slate-800 hover:border-amber-500 bg-slate-900/80 rounded-2xl shadow-xl transition-all flex flex-col items-center hover:bg-slate-900 hover:-translate-y-1">
                <div class="w-16 h-16 bg-amber-500/10 text-amber-500 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <span class="font-bold text-lg text-white">I am a Buyer</span>
                <span class="text-xs text-slate-400 mt-2 text-center">Shop products from independent sellers world-wide</span>
            </a>

            <!-- Seller Choice -->
            <a href="{{ route('register', ['role' => 'seller']) }}"
                class="group p-8 border border-slate-800 hover:border-amber-500 bg-slate-900/80 rounded-2xl shadow-xl transition-all flex flex-col items-center hover:bg-slate-900 hover:-translate-y-1">
                <div class="w-16 h-16 bg-amber-500/10 text-amber-500 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                    <i class="fa-solid fa-store"></i>
                </div>
                <span class="font-bold text-lg text-white">I am a Seller</span>
                <span class="text-xs text-slate-400 mt-2 text-center">List products, manage inventory, and grow your shop</span>
            </a>
        </div>
    </div>
</x-layout>