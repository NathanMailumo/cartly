<x-layout>
    <x-slot:title>Easybuy · Choose Account Type</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-lg border border-[#231f1d] bg-[#faf8f4] p-6 sm:p-9 shadow-sm">
            <div class="text-center mb-8">
                <a href="{{ route('dashboard') }}" class="font-masthead text-5xl font-black text-[#161413] hover:opacity-70 transition">Easybuy</a>
                <p class="font-editorial-sans text-[9px] uppercase tracking-[0.25em] text-[#787167] mt-2">Create your account</p>
            </div>
            <div class="border-t border-[#231f1d] pt-6">
                <h1 class="font-masthead text-3xl text-[#161413] text-center">Join as...</h1>
                <p class="font-serif-body text-sm text-[#5e5953] text-center mt-2 mb-7">Choose how you would like to participate in Easybuy.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="{{ route('register', ['role' => 'buyer']) }}" class="border border-[#cfc8bc] bg-[#f4efe6] hover:bg-[#161413] hover:text-[#f7f4ee] p-5 transition group">
                        <i class="fa-solid fa-bag-shopping text-xl mb-5"></i>
                        <h2 class="font-masthead text-xl font-bold">Buyer</h2>
                        <p class="font-editorial-sans text-[9px] uppercase tracking-[0.15em] mt-1">Curate your collection</p>
                        <span class="block border-t border-current mt-6 pt-3 font-editorial-sans text-[10px] uppercase tracking-[0.18em]">Continue <i class="fa-solid fa-arrow-right text-[9px] ml-1"></i></span>
                    </a>
                    <a href="{{ route('register', ['role' => 'seller']) }}" class="border border-[#cfc8bc] bg-[#f4efe6] hover:bg-[#161413] hover:text-[#f7f4ee] p-5 transition group">
                        <i class="fa-solid fa-store text-xl mb-5"></i>
                        <h2 class="font-masthead text-xl font-bold">Seller</h2>
                        <p class="font-editorial-sans text-[9px] uppercase tracking-[0.15em] mt-1">Open your atelier</p>
                        <span class="block border-t border-current mt-6 pt-3 font-editorial-sans text-[10px] uppercase tracking-[0.18em]">Continue <i class="fa-solid fa-arrow-right text-[9px] ml-1"></i></span>
                    </a>
                </div>
                <p class="text-center text-xs font-serif-body text-[#6e6860] mt-7">Already registered? <a href="{{ route('login') }}" class="text-[#161413] underline font-semibold">Sign in</a></p>
            </div>
        </div>
    </div>
</x-layout>
