<x-layout>
    <x-slot:title>Password Reset</x-slot:title>

    <div class="w-full max-w-md bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-slate-100">
        <h1 class="text-2xl font-bold text-center text-slate-900 tracking-tight">Set New Password</h1>
        <p class="text-sm text-center text-slate-500 mt-1 mb-6">Please enter and confirm your new password</p>

        <form method="post" action="{{ route('auth.password.update') }}" class="space-y-4">
            @csrf

            <!-- Email passed silently from request -->
            <input type="hidden" name="email" value="{{ request('email') }}">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">New Password</label>
                <input type="password" placeholder="••••••••" name="password" required class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('password')
                    <span class="text-xs text-red-500 mt-1.5 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Confirm New Password</label>
                <input type="password" placeholder="••••••••" name="password_confirmation" required class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-sm transition duration-150 active:scale-[0.99] text-sm mt-2">
                Update Password
            </button>

            <div class="text-center pt-2">
                <span class="text-sm text-slate-500">Remembered your password? <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a></span>
            </div>
        </form>
    </div>
</x-layout>