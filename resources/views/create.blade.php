<x-layout>
    <x-slot:title>easybuy · Create New Password</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-16">
        <div class="w-full max-w-md bg-white border border-gray-200 p-8 sm:p-10 shadow-sm rounded-sm">
            
            <div class="text-center mb-8">
                <a href="{{ route('dashboard') }}" class="inline-block hover:opacity-85 transition" title="easybuy">
                    <img src="{{ asset('images/easybuy-logo.png') }}" alt="easybuy" class="h-10 sm:h-11 w-auto object-contain mx-auto">
                </a>
                <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mt-3">
                    Password Renewal
                </p>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h1 class="text-2xl font-serif font-bold text-gray-950 text-center mb-2">
                    Set New Password
                </h1>
                <p class="text-xs text-gray-500 text-center mb-6">
                    Enter and confirm your new account password below.
                </p>

                <form method="POST" action="{{ route('auth.password.update') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="email" value="{{ request('email') }}">

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">New Password</label>
                        <input type="password" 
                               name="password" 
                               required 
                               placeholder="••••••••" 
                               class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                        @error('password')
                            <span class="text-red-600 text-xs mt-1 block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">Confirm New Password</label>
                        <input type="password" 
                               name="password_confirmation" 
                               required 
                               placeholder="••••••••" 
                               class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                    </div>

                    <button type="submit" 
                            class="w-full py-3 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs uppercase tracking-widest rounded-sm transition shadow-sm flex items-center justify-center gap-2 cursor-pointer mt-2">
                        <span>Save Password & Sign In</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-layout>