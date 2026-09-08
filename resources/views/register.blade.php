<x-layout>
    <x-slot:title>Easybuy · {{ ucfirst($role) }} Registration</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-xl border border-[#231f1d] bg-[#faf8f4] p-6 sm:p-9 shadow-sm">
            <div class="text-center mb-7">
                <a href="{{ route('register.form') }}" class="font-masthead text-5xl font-black text-[#161413] hover:opacity-70 transition">Easybuy</a>
                <p class="font-editorial-sans text-[9px] uppercase tracking-[0.25em] text-[#787167] mt-2">{{ ucfirst($role) }} registration</p>
            </div>

            <div class="border-t border-[#231f1d] pt-6">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="font-masthead text-3xl text-[#161413]">Create Account</h1>
                    <a href="{{ route('register.form') }}" class="text-[10px] font-editorial-sans uppercase tracking-[0.15em] text-[#787167] hover:text-[#161413]"><i class="fa-solid fa-arrow-left mr-1"></i> Change role</a>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 border border-[#231f1d] bg-[#f0ebe1] text-[#9b2c2c] text-xs font-serif-body">
                        <ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="role" value="{{ $role }}">
                    <div>
                        <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Enter your full name" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Password</label>
                            <input type="password" name="password" required placeholder="Create a password" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Confirm Password</label>
                            <input type="password" name="password_confirmation" required placeholder="Confirm password" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                        </div>
                    </div>
                    @if ($role === 'buyer')
                        <div>
                            <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Delivery Address</label>
                            <input type="text" name="shipping_address" value="{{ old('shipping_address') }}" required placeholder="123 city street" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                        </div>
                    @endif
                    @if ($role === 'seller')
                        <div>
                            <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Store Name</label>
                            <input type="text" name="store_name" value="{{ old('store_name') }}" required placeholder="Enter store name" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                        </div>
                        <div>
                            <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">Store Address</label>
                            <input type="text" name="store_address" value="{{ old('store_address') }}" required placeholder="Enter Store Address" class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                        </div>
                    @endif
                    <button type="submit" class="w-full py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs tracking-[0.2em] uppercase transition flex items-center justify-center gap-2 mt-5">
                        <span>Create {{ ucfirst($role) }} Account</span><i class="fa-solid fa-arrow-right text-[9px]"></i>
                    </button>
                </form>
                <p class="text-center text-xs font-serif-body text-[#6e6860] mt-5">Already registered? <a href="{{ route('login') }}" class="text-[#161413] underline font-semibold">Sign in</a></p>
            </div>
        </div>
    </div>
</x-layout>
