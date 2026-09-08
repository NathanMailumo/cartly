<x-layout>
    <x-slot:title>Verification · The Archive</x-slot:title>

    <div class="w-full max-w-xl mx-auto px-4 py-8 flex-1 flex flex-col justify-center">

        <div class="text-center pb-4">
            <a href="{{ route('home') }}" class="inline-block">
                <h1 class="font-masthead text-5xl sm:text-6xl font-black text-[#161413] tracking-tight hover:opacity-90 transition">
                    Cartly
                </h1>
            </a>
            <p class="font-editorial-sans text-[10px] tracking-[0.3em] uppercase text-[#5e5953] mt-1">
                Security Verification
            </p>
        </div>

        <div class="w-full border-t-2 border-b border-[#231f1d] py-[1px] mb-8"></div>

        <div class="border-2 border-[#231f1d] bg-[#faf8f4] p-8 sm:p-10 shadow-sm">
            @if (session('success'))
                <div class="mb-4 p-3 border border-[#231f1d] bg-[#f0ebe1] text-[#285e61] text-xs font-serif-body text-center">
                    ✦ {{ session('success') }}
                </div>
            @endif

            <div class="text-center mb-6">
                <div class="text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] mb-1">
                    ✦ Authentication Seal
                </div>
                <h2 class="font-masthead text-2xl sm:text-3xl text-[#161413] font-bold">
                    Enter Verification Code
                </h2>
                <p class="font-serif-body italic text-xs text-[#5e5953] mt-1">
                    Enter the 6-digit authentication cipher dispatched to your address.
                </p>
            </div>

            <form method="POST" action="{{ route('auth.verify.submit') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="email" value="{{ request('email') }}">

                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1 text-center">
                        6-Digit Cipher
                    </label>
                    <input type="text" 
                           name="code" 
                           maxLength="6" 
                           placeholder="······"
                           class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-3 text-xl font-mono text-center tracking-[0.4em] placeholder-[#a39c91] focus:outline-none transition">
                    @error('code')
                        <span class="text-[#9b2c2c] text-xs font-serif-body mt-1 block text-center">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <button type="submit" 
                        class="w-full py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs tracking-[0.2em] uppercase transition flex items-center justify-center gap-2 cursor-pointer mt-4">
                    <span>Verify Credentials</span>
                    <span>&rarr;</span>
                </button>
            </form>
        </div>

    </div>
</x-layout>