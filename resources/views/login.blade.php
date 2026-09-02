<x-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="w-full max-w-md bg-slate-900 border border-slate-800 p-8 rounded-2xl shadow-2xl">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-white tracking-tight">Welcome Back</h1>
            <p class="text-xs text-slate-400 mt-1">Sign in with your credentials to continue</p>
        </div>

        <form method="post" action="{{ route('auth.login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Name</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500">
                        <i class="fa-solid fa-user text-sm"></i>
                    </span>
                    <input type="text" placeholder="e.g John Doe" name="name" value="{{ old('name') }}"
                        class="w-full pl-10 pr-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition text-sm">
                </div>
                @error('name')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Password</label>
                    <a href="{{ route('reset') }}" class="text-xs font-semibold text-amber-500 hover:text-amber-400">Forgot?</a>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </span>
                    <input type="password" placeholder="••••••••" name="password"
                        class="w-full pl-10 pr-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition text-sm">
                </div>
                @error('password')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl shadow-lg transition duration-150 active:scale-[0.99] text-sm flex items-center justify-center gap-2">
                <i class="fa-solid fa-right-to-bracket"></i> Sign In
            </button>

            <div class="text-center pt-2">
                <span class="text-xs text-slate-400">Don't have an account? 
                    <a href="{{ route('register.form') }}" class="font-bold text-amber-500 hover:text-amber-400">Register</a>
                </span>
            </div>
        </form>
    </div>
</x-layout>