<x-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="w-full max-w-md bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-slate-100">
        <h1 class="text-2xl font-bold text-center text-slate-900 tracking-tight">Create an Account</h1>
        <p class="text-sm text-center text-slate-500 mt-1 mb-6">Enter your details to get started</p>

        <form method="post" action="{{ route('auth.register') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Name</label>
                <input type="text" placeholder="e.g John Doe" name="name" value="" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email</label>
                <input type="email" placeholder="e.g johndoe@email.com" name="email" value="" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Password</label>
                <input type="password" placeholder="e.g 123@password" name="password" value="" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Contact</label>
                <input type="tel" placeholder="e.g 090123456780" name="contact" value="" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-sm transition duration-150 active:scale-[0.99] text-sm mt-2">Register</button>

            <div class="text-center pt-2">
                <span class="text-sm text-slate-500">Already have an account? <a href="{{ route('auth.login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a></span>
            </div>
        </form>
    </div>
</x-layout>