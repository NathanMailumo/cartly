<x-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="w-full max-w-md bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-slate-100">
        <h1 class="text-2xl font-bold text-center text-slate-900 tracking-tight">Welcome back</h1>
        <p class="text-sm text-center text-slate-500 mt-1 mb-6">Enter your credentials to access your account</p>

        <form method="post" action="{{ route('auth.login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Name</label>
                <input type="text" placeholder="e.g John Doe" name="name" value="{{ old('name') }}"
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('name')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Password</label>
                    <a href="{{ route('reset') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
                <input type="password" placeholder="e.g 123@password" name="password"
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('password')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-sm transition duration-150 active:scale-[0.99] text-sm">Login</button>

            <div class="text-center pt-2">
                <span class="text-sm text-slate-500">Don't have an account? <a href="{{ route('register.form') }}"
                        class="font-semibold text-indigo-600 hover:text-indigo-500">Register</a></span>
            </div>
        </form>
    </div>
</x-layout>