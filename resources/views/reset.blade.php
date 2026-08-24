<x-layout>
    <x-slot:title>Reset</x-slot:title>

    <div class="w-full max-w-md bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-slate-100">
        <h1 class="text-2xl font-bold text-center text-slate-900 tracking-tight">Reset Password</h1>
        <p class="text-sm text-center text-slate-500 mt-1 mb-6">Enter your email to reset your password</p>

        <form method="post" action="{{ route('reset') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Emai;</label>
                <input type="text" placeholder="e.g john@doe.com" name="email" value=""
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm">
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-sm transition duration-150 active:scale-[0.99] text-sm mt-2">Send
                Reset Code</button>
        </form>
    </div>
</x-layout>
