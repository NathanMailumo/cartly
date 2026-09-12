<x-layout>
    <x-slot:title>easybuy · Sign In</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-16">
        <div class="w-full max-w-md bg-white border border-gray-200 p-8 sm:p-10 shadow-sm rounded-sm">
            
            <div class="text-center mb-8">
                <a href="{{ route('dashboard') }}" class="inline-block hover:opacity-85 transition" title="easybuy">
                    <img src="{{ asset('images/easybuy-logo.png') }}" alt="easybuy" class="h-10 sm:h-11 w-auto object-contain mx-auto">
                </a>
                <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mt-3">
                    Sign in to your account
                </p>
            </div>

            @if($errors->any())
                <div class="mb-5 p-3.5 bg-red-50 border border-red-200 text-red-700 text-xs rounded-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('success'))
                <div class="mb-5 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('auth.login') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">Email Address</label>
                    <input type="text" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           placeholder="you@example.com" 
                           class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700">Password</label>
                        <a href="{{ route('reset') }}" class="text-xs text-gray-500 hover:text-black underline transition">Forgot password?</a>
                    </div>
                    <input type="password" 
                           name="password" 
                           required 
                           placeholder="••••••••" 
                           class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                </div>

                <button type="submit" 
                        class="w-full py-3 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs uppercase tracking-widest rounded-sm transition shadow-sm flex items-center justify-center gap-2 cursor-pointer mt-2">
                    <span>Sign In</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <div class="border-t border-gray-200 mt-8 pt-5 text-center text-xs text-gray-600">
                New to easybuy? <a href="{{ route('register.form') }}" class="text-black font-bold hover:underline">Create an account</a>
            </div>

        </div>
    </div>
</x-layout>
