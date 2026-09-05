<x-layout>
    <x-slot:title>Checkout</x-slot:title>

    @php
        $user = Auth::user();
        // Load cart items if available, or fallback to buyer's current cart
        $cartItems = $cartItems ?? (Auth::check() ? \App\Models\cart::with('products.category')->where('buyer_id', Auth::id())->get() : collect());
        
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += ($item->products->productprice ?? 0) * $item->quantity;
        }
        $shipping = 0.00;
        $tax = 0.00;
        $total = $subtotal + $shipping + $tax;
    @endphp

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Breadcrumbs & Navigation --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-800 gap-4 mb-8">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-500 mb-2">
                    <a href="{{ route('buyer.dashboard') }}" class="hover:text-amber-400 transition">Shop</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <a href="{{ route('buyer.cart') }}" class="hover:text-amber-400 transition">Shopping Cart</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-slate-300">Checkout</span>
                </div>
                <h1 class="text-3xl font-black text-white tracking-tight flex items-center gap-3">
                    <i class="fa-solid fa-credit-card text-amber-500"></i>
                    Checkout
                </h1>
            </div>

            <a href="{{ route('buyer.cart') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-amber-400 transition self-start sm:self-auto py-2 px-3 rounded-lg hover:bg-slate-900 border border-transparent hover:border-slate-800">
                <i class="fa-solid fa-arrow-left"></i>
                Return to Cart
            </a>
        </div>

        {{-- Checkout Stepper --}}
        <div class="mb-8 bg-slate-900/70 border border-slate-800 rounded-2xl p-4 shadow-lg">
            <div class="flex items-center justify-between max-w-3xl mx-auto text-xs font-semibold">
                {{-- Step 1: Cart (Complete) --}}
                <a href="{{ route('buyer.cart') }}" class="flex items-center gap-2.5 text-emerald-400 group">
                    <div class="w-7 h-7 rounded-full bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center text-xs group-hover:scale-105 transition">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span class="hidden sm:inline">1. Cart Review</span>
                </a>

                <div class="flex-1 h-[2px] bg-emerald-500/30 mx-3"></div>

                {{-- Step 2: Checkout (Current) --}}
                <div class="flex items-center gap-2.5 text-amber-400">
                    <div class="w-7 h-7 rounded-full bg-amber-500 text-slate-950 flex items-center justify-center text-xs font-black shadow-lg shadow-amber-500/30">
                        2
                    </div>
                    <span class="font-bold">Shipping & Payment</span>
                </div>

                <div class="flex-1 h-[2px] bg-slate-800 mx-3"></div>

                {{-- Step 3: Confirmation (Pending) --}}
                <div class="flex items-center gap-2.5 text-slate-500">
                    <div class="w-7 h-7 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-xs">
                        3
                    </div>
                    <span class="hidden sm:inline">Order Confirmation</span>
                </div>
            </div>
        </div>

        {{-- Main Checkout Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            {{-- Left Column (8 cols): Input Form Sections --}}
            <div class="lg:col-span-8 space-y-6">

                {{-- 1. Contact Information --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between pb-4 mb-5 border-b border-slate-800">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2.5">
                            <span class="w-6 h-6 rounded-lg bg-amber-500/10 text-amber-400 text-xs flex items-center justify-center border border-amber-500/20">1</span>
                            Contact Information
                        </h2>
                        @auth
                            <span class="text-xs text-slate-400">
                                Signed in as <strong class="text-white">{{ $user->name ?? $user->email }}</strong>
                            </span>
                        @endauth
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                Email Address
                            </label>
                            <input type="email" 
                                value="{{ $user->email ?? 'buyer@cartly.com' }}" 
                                placeholder="you@example.com"
                                class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                Phone Number
                            </label>
                            <input type="tel" 
                                placeholder="+1 (555) 000-0000"
                                class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                        </div>
                    </div>

                    <label class="mt-4 flex items-center gap-3 cursor-pointer text-xs text-slate-400 hover:text-slate-300">
                        <input type="checkbox" checked class="rounded bg-slate-950 border-slate-700 text-amber-500 focus:ring-amber-500/30">
                        <span>Send me order tracking updates and exclusive offers via SMS or email</span>
                    </label>
                </div>

                {{-- 2. Shipping / Delivery Address --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between pb-4 mb-5 border-b border-slate-800">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2.5">
                            <span class="w-6 h-6 rounded-lg bg-amber-500/10 text-amber-400 text-xs flex items-center justify-center border border-amber-500/20">2</span>
                            Shipping Address
                        </h2>
                        <span class="text-xs text-slate-500">All fields required</span>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                    First Name
                                </label>
                                <input type="text" 
                                    value="{{ explode(' ', $user->name ?? '')[0] ?? '' }}" 
                                    placeholder="Jane"
                                    class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                    Last Name
                                </label>
                                <input type="text" 
                                    value="{{ explode(' ', $user->name ?? '')[1] ?? '' }}" 
                                    placeholder="Doe"
                                    class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                Street Address
                            </label>
                            <input type="text" 
                                placeholder="123 Commerce Way, Apt 4B"
                                class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                    City
                                </label>
                                <input type="text" 
                                    placeholder="New York"
                                    class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                    State / Province
                                </label>
                                <input type="text" 
                                    placeholder="NY"
                                    class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                    Postal / ZIP Code
                                </label>
                                <input type="text" 
                                    placeholder="10001"
                                    class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                                Delivery Notes / Instructions (Optional)
                            </label>
                            <textarea rows="2" 
                                placeholder="Gate code, drop-off location or special instructions..."
                                class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 outline-none transition"></textarea>
                        </div>
                    </div>
                </div>

                {{-- 3. Delivery Method --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between pb-4 mb-5 border-b border-slate-800">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2.5">
                            <span class="w-6 h-6 rounded-lg bg-amber-500/10 text-amber-400 text-xs flex items-center justify-center border border-amber-500/20">3</span>
                            Shipping Method
                        </h2>
                    </div>

                    <div class="space-y-3">
                        <label class="flex items-center justify-between p-4 rounded-xl border-2 border-amber-500/60 bg-amber-500/5 cursor-pointer transition">
                            <div class="flex items-center gap-3.5">
                                <input type="radio" name="shipping_method" checked class="text-amber-500 focus:ring-amber-500/30">
                                <div>
                                    <div class="text-sm font-bold text-white flex items-center gap-2">
                                        Standard Shipping
                                        <span class="text-[10px] bg-emerald-500/20 text-emerald-400 font-bold px-1.5 py-0.5 rounded">FREE</span>
                                    </div>
                                    <p class="text-xs text-slate-400 mt-0.5">Delivered within 3-5 business days</p>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-emerald-400">$0.00</span>
                        </label>

                        <label class="flex items-center justify-between p-4 rounded-xl border border-slate-800 bg-slate-950/60 hover:border-slate-700 cursor-pointer transition">
                            <div class="flex items-center gap-3.5">
                                <input type="radio" name="shipping_method" class="text-amber-500 focus:ring-amber-500/30">
                                <div>
                                    <div class="text-sm font-bold text-white">Express Priority Delivery</div>
                                    <p class="text-xs text-slate-400 mt-0.5">Delivered within 1-2 business days with priority handling</p>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-white">$12.00</span>
                        </label>
                    </div>
                </div>

                {{-- 4. Payment Method (Visual Mockup) --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between pb-4 mb-5 border-b border-slate-800">
                        <div>
                            <h2 class="text-lg font-bold text-white flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-lg bg-amber-500/10 text-amber-400 text-xs flex items-center justify-center border border-amber-500/20">4</span>
                                Payment Method
                            </h2>
                            <p class="text-xs text-slate-500 mt-1">All transactions are encrypted and secure</p>
                        </div>
                        <div class="flex items-center gap-2 text-slate-400 text-lg">
                            <i class="fa-brands fa-cc-visa"></i>
                            <i class="fa-brands fa-cc-mastercard"></i>
                            <i class="fa-brands fa-cc-apple-pay"></i>
                        </div>
                    </div>

                    {{-- Notice badge that this is view only --}}
                    <div class="mb-5 p-3 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-300 text-xs flex items-center gap-3">
                        <i class="fa-solid fa-circle-info text-amber-400 text-sm"></i>
                        <span>Checkout preview: payment gateway integration will be connected here later.</span>
                    </div>

                    <div class="space-y-4">
                        {{-- Radio 1: Card --}}
                        <div class="border border-slate-800 rounded-xl p-4 bg-slate-950/60">
                            <label class="flex items-center justify-between cursor-pointer mb-4">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" checked class="text-amber-500 focus:ring-amber-500/30">
                                    <span class="text-sm font-bold text-white">Credit / Debit Card</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-slate-500 font-semibold">
                                    <i class="fa-solid fa-lock text-amber-400"></i> End-to-End Encrypted
                                </div>
                            </label>

                            <div class="space-y-3 pt-2">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">
                                        Card Number
                                    </label>
                                    <div class="relative">
                                        <input type="text" placeholder="4242 •••• •••• 4242" 
                                            class="w-full bg-slate-900 border border-slate-800 rounded-lg px-4 py-2.5 text-sm text-white placeholder-slate-600 outline-none">
                                        <i class="fa-regular fa-credit-card absolute right-3 top-3 text-slate-500"></i>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">
                                            Expiry Date
                                        </label>
                                        <input type="text" placeholder="MM / YY" 
                                            class="w-full bg-slate-900 border border-slate-800 rounded-lg px-4 py-2.5 text-sm text-white placeholder-slate-600 outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">
                                            CVC / CVV
                                        </label>
                                        <input type="text" placeholder="123" 
                                            class="w-full bg-slate-900 border border-slate-800 rounded-lg px-4 py-2.5 text-sm text-white placeholder-slate-600 outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Radio 2: Cash on Delivery --}}
                        <label class="flex items-center justify-between p-4 rounded-xl border border-slate-800 bg-slate-950/60 hover:border-slate-700 cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" class="text-amber-500 focus:ring-amber-500/30">
                                <div>
                                    <span class="text-sm font-bold text-white block">Cash on Delivery (COD)</span>
                                    <span class="text-xs text-slate-400">Pay in cash when package arrives at your door</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-hand-holding-dollar text-slate-500 text-lg"></i>
                        </label>

                        {{-- Radio 3: PayPal --}}
                        <label class="flex items-center justify-between p-4 rounded-xl border border-slate-800 bg-slate-950/60 hover:border-slate-700 cursor-pointer transition">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" class="text-amber-500 focus:ring-amber-500/30">
                                <div>
                                    <span class="text-sm font-bold text-white block">PayPal</span>
                                    <span class="text-xs text-slate-400">You will be redirected to PayPal's secure portal</span>
                                </div>
                            </div>
                            <i class="fa-brands fa-paypal text-sky-400 text-lg"></i>
                        </label>
                    </div>
                </div>

            </div>

            {{-- Right Column (4 cols): Sticky Order Summary --}}
            <div class="lg:col-span-4 sticky top-24 space-y-4">
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-12 -top-12 w-36 h-36 bg-amber-500/5 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                        <h2 class="text-lg font-black text-white tracking-tight">Order Summary</h2>
                        <span class="text-xs font-bold bg-slate-800 text-amber-400 px-2.5 py-1 rounded-full border border-slate-700">
                            {{ $cartItems->sum('quantity') }} {{ Str::plural('item', $cartItems->sum('quantity')) }}
                        </span>
                    </div>

                    {{-- Item list thumbnail preview --}}
                    <div class="py-4 divide-y divide-slate-800/80 max-h-72 overflow-y-auto pr-1">
                        @forelse($cartItems as $item)
                            @php
                                $product = $item->products;
                                $itemPrice = $product->productprice ?? 0;
                            @endphp
                            <div class="py-3 first:pt-0 last:pb-0 flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-12 h-12 rounded-lg bg-slate-800 border border-slate-700 overflow-hidden shrink-0 flex items-center justify-center relative">
                                        @if(!empty($product->image_url))
                                            <img src="{{ $product->image_url }}" alt="{{ $product->productname ?? 'Item' }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-solid fa-box text-amber-500/70 text-sm"></i>
                                        @endif
                                        <span class="absolute -top-1 -right-1 bg-amber-500 text-slate-950 font-black text-[10px] w-4 h-4 rounded-full flex items-center justify-center">
                                            {{ $item->quantity }}
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-xs font-bold text-white truncate">{{ $product->productname ?? 'Sample Product' }}</h4>
                                        <p class="text-[11px] text-slate-400 truncate">{{ $product->category->categoryname ?? 'General' }}</p>
                                    </div>
                                </div>
                                <span class="text-xs font-black text-white shrink-0">
                                    ${{ number_format($itemPrice * $item->quantity, 2) }}
                                </span>
                            </div>
                        @empty
                            {{-- Preview fallback if cart is empty --}}
                            <div class="py-3 flex items-center justify-between gap-3 opacity-75">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center text-amber-500/80">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-white">Sample Cart Item</h4>
                                        <p class="text-[11px] text-slate-500">Qty: 1</p>
                                    </div>
                                </div>
                                <span class="text-xs font-black text-white">$49.99</span>
                            </div>
                        @endforelse
                    </div>

                    {{-- Promo / Discount Code --}}
                    <div class="py-4 border-t border-slate-800">
                        <div class="flex items-center gap-2">
                            <input type="text" placeholder="Promo code (e.g. CARTLY10)" 
                                class="flex-1 bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 outline-none uppercase">
                            <button type="button" 
                                onclick="alert('Promo code feature coming soon!')"
                                class="px-3 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white font-semibold text-xs rounded-xl border border-slate-700 transition">
                                Apply
                            </button>
                        </div>
                    </div>

                    {{-- Totals calculation --}}
                    <div class="py-4 space-y-2.5 text-xs border-t border-slate-800">
                        <div class="flex items-center justify-between text-slate-400">
                            <span>Subtotal</span>
                            <span class="font-bold text-white">${{ number_format($subtotal > 0 ? $subtotal : 49.99, 2) }}</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-400">
                            <span class="flex items-center gap-1.5">
                                Shipping
                                <span class="text-[9px] bg-emerald-500/20 text-emerald-400 font-bold px-1 py-0.5 rounded">FREE</span>
                            </span>
                            <span class="font-bold text-emerald-400">$0.00</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-400">
                            <span>Estimated Tax</span>
                            <span class="font-bold text-slate-300">$0.00</span>
                        </div>
                    </div>

                    {{-- Grand Total --}}
                    <div class="py-4 border-t border-slate-800">
                        <div class="flex items-baseline justify-between mb-1">
                            <span class="text-sm font-semibold text-slate-300">Total Amount</span>
                            <span class="text-2xl font-black text-amber-400">
                                ${{ number_format($total > 0 ? $total : 49.99, 2) }}
                            </span>
                        </div>
                        <p class="text-[11px] text-slate-500 text-right">Including all taxes & duties</p>
                    </div>

                    {{-- Mock Place Order Button --}}
                    <button type="button" 
                        onclick="alert('Order placement will be connected when payment integration is ready!')"
                        class="w-full py-3.5 px-4 bg-amber-500 hover:bg-amber-600 active:scale-[0.99] text-slate-950 font-black rounded-xl text-sm transition-all shadow-lg hover:shadow-amber-500/25 flex items-center justify-center gap-2 group cursor-pointer">
                        <i class="fa-solid fa-lock text-xs opacity-75 group-hover:opacity-100 transition"></i>
                        <span>Place Order & Pay</span>
                        <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </button>

                    <p class="mt-3 text-[10px] text-center text-slate-500 leading-relaxed">
                        By placing your order, you agree to Cartly's 
                        <a href="#" class="underline hover:text-amber-400">Terms of Use</a> and 
                        <a href="#" class="underline hover:text-amber-400">Privacy Policy</a>.
                    </p>
                </div>

                {{-- Guarantee Card --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-4 text-xs text-slate-400 space-y-2.5">
                    <div class="flex items-center gap-2.5 text-slate-300">
                        <i class="fa-solid fa-shield-halved text-amber-400"></i>
                        <span class="font-semibold">Buyer Protection Guarantee</span>
                    </div>
                    <p class="text-[11px] text-slate-500">
                        Get a full refund if your item isn't as described or doesn't arrive safely.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
