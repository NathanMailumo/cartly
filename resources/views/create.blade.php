<x-layout>
    <x-slot:title>Establish New Passcode · The Archive</x-slot:title>

    <div class="w-full max-w-xl mx-auto px-4 py-8 flex-1 flex flex-col justify-center">

        <div class="text-center pb-4">
            <a href="{{ route('home') }}" class="inline-block">
                <h1 class="font-masthead text-5xl sm:text-6xl font-black text-[#161413] tracking-tight hover:opacity-90 transition">
                    Cartly
                </h1>
            </a>
            <p class="font-editorial-sans text-[10px] tracking-[0.3em] uppercase text-[#5e5953] mt-1">
                Passcode Renewal
            </p>
        </div>

        <div class="w-full border-t-2 border-b border-[#231f1d] py-[1px] mb-8"></div>

        <div class="border-2 border-[#231f1d] bg-[#faf8f4] p-8 sm:p-10 shadow-sm">
            <div class="text-center mb-6">
                <div class="text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] mb-1">
                    ✦ Member Credentials
                </div>
                <h2 class="font-masthead text-2xl sm:text-3xl text-[#161413] font-bold">
                    Set New Passcode
                </h2>
                <p class="font-serif-body italic text-xs text-[#5e5953] mt-1">
                    Please enter and confirm your renewed archive access credentials.
                </p>
            </div>

            <form method="POST" action="{{ route('auth.password.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="email" value="{{ request('email') }}">

                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">
                        New Password
                    </label>
                    <input type="password" 
                           name="password" 
                           required 
                           placeholder="Enter new password"
                           class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                    @error('password')
                        <span class="text-[#9b2c2c] text-xs font-serif-body mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">
                        Confirm New Password
                    </label>
                    <input type="password" 
                           name="password_confirmation" 
                           required 
                           placeholder="Confirm new password"
                           class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                </div>

                <button type="submit" 
                        class="w-full py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs tracking-[0.2em] uppercase transition flex items-center justify-center gap-2 cursor-pointer mt-4">
                    <span>Update Archive Passcode</span>
                    <span>&rarr;</span>
                </button>
            </form>
        </div>

    </div>
</x-layout>