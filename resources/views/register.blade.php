<x-layout>
    <x-slot:title>Register</x-slot:title>

    <h2>Register as a {{ ucfirst($role) }}</h2>

    <div class="w-full max-w-md bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-slate-100">
        <h1 class="text-2xl font-bold text-center text-slate-900 tracking-tight">Create an Account</h1>
        <p class="text-sm text-center text-slate-500 mt-1 mb-6">Enter your details to get started</p>

        <form method="post" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="role" value="{{ $role }}">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Name</label>
                <input type="text" placeholder="e.g John Doe" name="name" value="{{ old('name') }}"
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email</label>
                <input type="email" placeholder="e.g johndoe@email.com" name="email" value="{{ old('email') }}"
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Password</label>
                <input type="password" placeholder="e.g 123@password" name="password" value="{{ old('password') }}"
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Confirm
                    Password</label>
                <input type="password" placeholder="e.g 123@password" name="password_confirmation"
                    value="{{ old('password') }}"
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Contact</label>
                <input type="tel" placeholder="e.g 090123456780" name="contact" value="{{old('contact')}}" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('contact')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            {{-- <button type="submit" class="w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-sm transition duration-150 active:scale-[0.99] text-sm mt-2">Register</button> --}}
            @if ($role === 'seller')
                <div style="margin-top: 15px;">
                    <label>Store Name</label>
                    <input type="text" name="store_name" placeholder="e.g. Acme Supplies" required>
                </div>
            @endif

            <button type="submit" style="margin-top: 15px;">
                Complete {{ ucfirst($role) }} Registration
            </button>


            <div class="text-center pt-2">
                <span class="text-sm text-slate-500">Already have an account? <a href="{{ route('login') }}"
                        class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a></span>
            </div>
        </form>
    </div>
</x-layout>
