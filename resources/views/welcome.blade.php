<x-layout>
    <x-slot:title>Welcome</x-slot:title>

    <div class="max-w-4xl w-full text-center py-12 px-4">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-500 bg-amber-500/10 px-3 py-1 rounded-full border border-amber-500/20">Marketplace Ecosystem</span>
        <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight mt-4">
            Buy and Sell Everything in One Place<span class="text-amber-500">.</span>
        </h1>
        <p class="text-slate-400 text-lg mt-4 max-w-2xl mx-auto">
            Discover thousands of products from trusted independent sellers, or start your own store in minutes.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">
            <a href="{{ route('register.form') }}" class="w-full sm:w-auto px-8 py-4 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                <i class="fa-solid fa-user-plus"></i> Join Cartly Today
            </a>
            <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl border border-slate-700 transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-right-to-bracket"></i> Sign In to Account
            </a>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16 text-left">
            <div class="p-6 bg-slate-900/60 border border-slate-800 rounded-2xl">
                <i class="fa-solid fa-truck-fast text-amber-500 text-2xl mb-3"></i>
                <h3 class="font-bold text-white text-base">Fast Shipping</h3>
                <p class="text-slate-400 text-sm mt-1">Get items delivered quickly with trackable updates from store owners.</p>
            </div>
            <div class="p-6 bg-slate-900/60 border border-slate-800 rounded-2xl">
                <i class="fa-solid fa-store text-amber-500 text-2xl mb-3"></i>
                <h3 class="font-bold text-white text-base">Verified Vendors</h3>
                <p class="text-slate-400 text-sm mt-1">Set up shop instantly with full store customisation and inventory tools.</p>
            </div>
            <div class="p-6 bg-slate-900/60 border border-slate-800 rounded-2xl">
                <i class="fa-solid fa-shield-halved text-amber-500 text-2xl mb-3"></i>
                <h3 class="font-bold text-white text-base">Secure Checkout</h3>
                <p class="text-slate-400 text-sm mt-1">Shop confidently with buyer protection and verified user security.</p>
            </div>
        </div>
    </div>
</x-layout>