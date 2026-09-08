<x-layout>
    <x-slot:title>Reset Member Access</x-slot:title>

    <div class="w-full max-w-xl mx-auto px-4 py-8 flex-1 flex flex-col justify-center">

        <div class="text-center pb-4">
            <a href="{{ route('home') }}" class="inline-block">
                <h1 class="font-masthead text-5xl sm:text-6xl font-black text-[#161413] tracking-tight hover:opacity-90 transition">
                    Cartly
                </h1>
            </a>
            <p class="font-editorial-sans text-[10px] tracking-[0.3em] uppercase text-[#5e5953] mt-1">
                Member Access Recovery
            </p>
        </div>

        <div class="w-full border-t-2 border-b border-[#231f1d] py-[1px] mb-8"></div>

        <div class="border-2 border-[#231f1d] bg-[#faf8f4] p-8 sm:p-10 shadow-sm">
            <div class="text-center mb-6">
                <div class="text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] mb-1">
                    ✦ Member Identification
                </div>
                <h2 class="font-masthead text-2xl sm:text-3xl text-[#161413] font-bold">
                    Recover Archive Passcode
                </h2>
                <p class="font-serif-body italic text-xs text-[#5e5953] mt-1">
                    Enter your registered email address to receive your access dispatch code.
                </p>
            </div>

            @if($errors->any())
                <div class="mb-4 p-3 border border-[#231f1d] bg-[#f0ebe1] text-[#9b2c2c] text-xs font-serif-body">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('auth.reset') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">
                        Registered Email
                    </label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus
                           placeholder="member@cartly.com" 
                           class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                </div>

                <button type="submit" 
                        class="w-full py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs tracking-[0.2em] uppercase transition flex items-center justify-center gap-2 cursor-pointer mt-2">
                    <span>Dispatch Recovery Code</span>
                    <span>&rarr;</span>
                </button>

                <div class="pt-4 text-center">
                    <a href="{{ route('login') }}" class="text-[11px] font-serif-body italic text-[#6e6860] hover:text-[#161413] underline transition">
                        &larr; Return to Sign In
                    </a>
                </div>
            </form>
        </div>

    </div>
</x-layout>