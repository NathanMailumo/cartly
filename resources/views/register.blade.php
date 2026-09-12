<x-layout>
    <x-slot:title>easybuy · {{ ucfirst($role) }} Registration</x-slot:title>

    <div class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-lg bg-white border border-gray-200 p-8 sm:p-10 shadow-sm rounded-sm">
            
            <div class="text-center mb-6">
                <a href="{{ route('dashboard') }}" class="inline-block hover:opacity-85 transition" title="easybuy">
                    <img src="{{ asset('images/easybuy-logo.png') }}" alt="easybuy" class="h-10 sm:h-11 w-auto object-contain mx-auto">
                </a>
                <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mt-3">
                    {{ ucfirst($role) }} Registration
                </p>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-serif font-bold text-gray-950">Create Account</h1>
                    <a href="{{ route('register.form') }}" class="text-xs font-semibold text-gray-500 hover:text-black flex items-center gap-1">
                        <i class="fa-solid fa-arrow-left text-[10px]"></i>
                        <span>Change role</span>
                    </a>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-xs rounded-sm">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="role" value="{{ $role }}">

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Full Name</label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               placeholder="e.g. Samuel Okon" 
                               class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Email Address</label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               placeholder="you@example.com" 
                               class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Password</label>
                            <input type="password" 
                                   name="password" 
                                   required 
                                   placeholder="••••••••" 
                                   class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Confirm Password</label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   required 
                                   placeholder="••••••••" 
                                   class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                        </div>
                    </div>

                    @if ($role === 'buyer')
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Delivery Address</label>
                            <input type="text" 
                                   name="shipping_address" 
                                   value="{{ old('shipping_address') }}" 
                                   required 
                                   placeholder="e.g. 15 Marina Street, Lagos" 
                                   class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                        </div>
                    @endif

                    @if ($role === 'seller')
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Store Name</label>
                            <input type="text" 
                                   name="store_name" 
                                   value="{{ old('store_name') }}" 
                                   required 
                                   placeholder="e.g. Urban Threads NG" 
                                   class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Store Address</label>
                            <input type="text" 
                                   name="store_address" 
                                   value="{{ old('store_address') }}" 
                                   required 
                                   placeholder="e.g. 24 Commercial Avenue, Yaba, Lagos" 
                                   class="w-full bg-[#faf9f6] border border-gray-300 rounded-sm px-3.5 py-2 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-black transition">
                        </div>
                    @endif

                    <button type="submit" 
                            class="w-full mt-4 py-3 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs uppercase tracking-widest rounded-sm transition shadow-sm flex items-center justify-center gap-2 cursor-pointer">
                        <span>Create {{ ucfirst($role) }} Account</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>

                <div class="border-t border-gray-200 mt-6 pt-4 text-center text-xs text-gray-600">
                    Already have an account? <a href="{{ route('login') }}" class="text-black font-bold hover:underline">Sign in</a>
                </div>

            </div>

        </div>
    </div>
</x-layout>
