{{-- @dd(session()->all()) --}}
<x-layout>
    <x-slot:title>Verify Code</x-slot:title>

    <div class="w-full max-w-md bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-slate-100">

        @if (session('otp_code'))
            <script>
                alert("Your reset code is: {{ session('otp_code') }}");
            </script>
        @endif

        <h1 class="text-2xl font-bold text-center text-slate-900 tracking-tight">Enter Verification Code</h1>
        <p class="text-sm text-center text-slate-500 mt-1 mb-6">Enter the 6-digit code provided above</p>

        <form method="post" action="{{ route('auth.verify.submit') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="email" value="{{ request('email') }}">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Verification
                    Code</label>
                <input type="text" name="code" placeholder="123456" maxLength="6"
                    class="w-full px-3.5 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-sm tracking-widest text-center text-lg font-mono">
                @error('code')
                    <span style="color: red; display: block; margin-top: 5px;">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold rounded-xl shadow-sm transition duration-150 text-sm mt-2">
                Verify & Continue
            </button>
        </form>
    </div>
</x-layout>
