<x-layout>
    <x-slot:title>Easybuy · Sign In</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md border border-[#231f1d] bg-[#faf8f4] p-6 sm:p-9 shadow-sm">
            <div class="text-center mb-7">
                <a href="{{ route('dashboard') }}" class="font-masthead text-5xl font-black text-[#161413] hover:opacity-70 transition">Easybuy</a>
                <p class="font-editorial-sans text-[9px] uppercase tracking-[0.25em] text-[#787167] mt-2">Sign in to your archive</p>
            </div>

            @if($errors->any())
                <div class="mb-4 p-3 border border-[#231f1d] bg-[#f0ebe1] text-[#9b2c2c] text-xs font-serif-body">{{ $errors->first() }}</div>
            @endif
            @if(session('success'))
                <div class="mb-4 p-3 border border-[#231f1d] bg-[#f0ebe1] text-[#285e61] text-xs font-serif-body">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('auth.login') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" required autofocus placeholder="e.g easybuy@member.com" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Password</label>
                    <input type="password" name="password" required placeholder="Enter password" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                </div>
                <button type="submit" class="w-full py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs tracking-[0.2em] uppercase transition flex items-center justify-center gap-2">
                    <span>Sign In</span><i class="fa-solid fa-arrow-right text-[9px]"></i>
                </button>
                <a href="{{ route('reset') }}" class="block text-center text-[11px] font-serif-body italic text-[#6e6860] hover:text-[#161413] underline transition">Forgot your member ID?</a>
            </form>

            <div class="border-t border-[#dcd7ce] mt-7 pt-5 text-center text-xs font-serif-body text-[#6e6860]">
                New to Easybuy? <a href="{{ route('register.form') }}" class="text-[#161413] font-semibold underline">Register</a>
            </div>
        </div>
    </div>
</x-layout>
