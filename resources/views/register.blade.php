<x-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="w-full max-w-md bg-slate-900 border border-slate-800 p-8 rounded-2xl shadow-2xl">
        <div class="text-center mb-6">
            <span class="text-xs font-bold uppercase tracking-widest text-amber-500 bg-amber-500/10 px-3 py-1 rounded-full border border-amber-500/20">
                {{ ucfirst($role) }} Account
            </span>
            <h1 class="text-2xl font-bold text-white tracking-tight mt-2">Create Account</h1>
            <p class="text-xs text-slate-400 mt-1">Enter your details below to get started</p>
        </div>

        <form method="post" action="{{ route('register.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">

            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Full Name</label>
                <input type="text" placeholder="John Doe" name="name" value="{{ old('name') }}"
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition text-sm">
                @error('name')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Email Address</label>
                <input type="email" placeholder="johndoe@email.com" name="email" value="{{ old('email') }}"
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition text-sm">
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Password</label>
                <input type="password" placeholder="••••••••" name="password"
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition text-sm">
                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Confirm Password</label>
                <input type="password" placeholder="••••••••" name="password_confirmation"
                    class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition text-sm">
            </div>

            @if ($role === 'seller')
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Store Name</label>
                    <input type="text" name="store_name" placeholder="e.g. Acme Supplies" required value="{{ old('store_name') }}"
                        class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Store Address</label>
                    <input type="text" name="store_address" placeholder="e.g. 123, City, Street" required value="{{ old('store_address') }}"
                        class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition text-sm">
                </div>
            @endif

            @if ($role === 'buyer')
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Shipping Address</label>
                    <input type="text" name="shipping_address" placeholder="e.g. 123, City, Street" required value="{{ old('shipping_address') }}"
                        class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition text-sm">
                </div>
            @endif

            <button type="submit"
                class="w-full py-3 px-4 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl shadow-lg transition duration-150 active:scale-[0.99] text-sm flex items-center justify-center gap-2 mt-2">
                Complete {{ ucfirst($role) }} Registration
            </button>

            <div class="text-center pt-2">
                <span class="text-xs text-slate-400">Already registered? 
                    <a href="{{ route('login') }}" class="font-bold text-amber-500 hover:text-amber-400">Login</a>
                </span>
            </div>
        </form>
    </div>
</x-layout>