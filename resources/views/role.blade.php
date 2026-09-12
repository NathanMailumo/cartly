<x-layout>
    <x-slot:title>easybuy · Choose Account Type</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-16">
        <div class="w-full max-w-lg bg-white border border-gray-200 p-8 sm:p-10 shadow-sm rounded-sm">
            
            <div class="text-center mb-8">
                <a href="{{ route('dashboard') }}" class="inline-block hover:opacity-85 transition" title="easybuy">
                    <img src="{{ asset('images/easybuy-logo.png') }}" alt="easybuy" class="h-10 sm:h-11 w-auto object-contain mx-auto">
                </a>
                <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mt-3">
                    Create your account
                </p>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h1 class="text-2xl sm:text-3xl font-serif font-bold text-gray-950 text-center">
                    Join easybuy as...
                </h1>
                <p class="text-xs sm:text-sm text-gray-600 text-center mt-1 mb-8">
                    Choose how you want to experience our marketplace today.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    
                    <!-- Buyer Card -->
                    <a href="{{ route('register', ['role' => 'buyer']) }}" 
                       class="border-2 border-gray-200 hover:border-black p-6 rounded-sm transition-all group flex flex-col justify-between hover:shadow-md bg-[#faf9f6]">
                        <div>
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-xl text-black shadow-sm mb-4 group-hover:scale-110 transition">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <h2 class="text-xl font-bold font-serif text-gray-950">Buyer</h2>
                            <p class="text-xs text-gray-500 mt-1">Shop thousands of items with fast delivery and easy returns.</p>
                        </div>
                        <span class="mt-6 inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-black group-hover:translate-x-1 transition">
                            <span>Get Started</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </span>
                    </a>

                    <!-- Seller Card -->
                    <a href="{{ route('register', ['role' => 'seller']) }}" 
                       class="border-2 border-gray-200 hover:border-black p-6 rounded-sm transition-all group flex flex-col justify-between hover:shadow-md bg-[#faf9f6]">
                        <div>
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-xl text-black shadow-sm mb-4 group-hover:scale-110 transition">
                                <i class="fa-solid fa-store"></i>
                            </div>
                            <h2 class="text-xl font-bold font-serif text-gray-950">Seller</h2>
                            <p class="text-xs text-gray-500 mt-1">List your products and reach thousands of buyers across Nigeria.</p>
                        </div>
                        <span class="mt-6 inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-black group-hover:translate-x-1 transition">
                            <span>Open Store</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </span>
                    </a>

                </div>

                <p class="text-center text-xs text-gray-500 mt-8">
                    Already registered? <a href="{{ route('login') }}" class="text-black underline font-bold hover:opacity-80">Sign in</a>
                </p>
            </div>

        </div>
    </div>
</x-layout>
