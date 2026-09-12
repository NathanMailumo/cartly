<x-layout>
    <x-slot:title>easybuy · Verify Code</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-16">
        <div class="w-full max-w-md bg-white border border-gray-200 p-8 sm:p-10 shadow-sm rounded-sm">
            
            <div class="text-center mb-8">
                <a href="{{ route('dashboard') }}" class="inline-block hover:opacity-85 transition" title="easybuy">
                    <img src="{{ asset('images/easybuy-logo.png') }}" alt="easybuy" class="h-10 sm:h-11 w-auto object-contain mx-auto">
                </a>
                <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mt-3">
                    Security Verification
                </p>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h1 class="text-2xl font-serif font-bold text-gray-950 text-center mb-2">
                    Enter Verification Code
                </h1>
                <p class="text-xs text-gray-500 text-center mb-6">
                    Enter the 6-digit verification code sent to your email address.
                </p>

                @if (session('success'))
                    <div class="mb-5 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-sm text-center font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('auth.verify.submit') }}" class="space-y-5">
                    @csrf
                    <input type="hidden" name="email" value="{{ request('email') }}">

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-2 text-center">
                            6-Digit Code
                        </label>
                        <input type="text" 
                               name="code" 
                               maxLength="6" 
                               placeholder="······"
                               autofocus
                               class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-4 py-3 text-2xl font-mono text-center tracking-[0.5em] text-gray-900 placeholder-gray-300 focus:outline-none focus:border-black transition">
                        @error('code')
                            <span class="text-red-600 text-xs mt-1.5 block text-center">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <button type="submit" 
                            class="w-full py-3 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs uppercase tracking-widest rounded-sm transition shadow-sm flex items-center justify-center gap-2 cursor-pointer">
                        <span>Verify & Continue</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>

                <div class="border-t border-gray-200 mt-6 pt-4 text-center text-xs text-gray-600">
                    Didn't receive code? <a href="{{ route('reset') }}" class="text-black font-bold hover:underline">Resend</a>
                </div>
            </div>

        </div>
    </div>
</x-layout>