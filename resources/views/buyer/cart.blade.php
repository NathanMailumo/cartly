<x-layout>
    <x-slot:title>Shopping Cart</x-slot:title>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Breadcrumb & Title --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-800 gap-4 mb-8">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-500 mb-2">
                    <a href="{{ route('buyer.dashboard') }}" class="hover:text-amber-400 transition">Shop</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-slate-300">Shopping Cart</span>
                </div>
                <h1 class="text-3xl font-black text-white tracking-tight flex items-center gap-3">
                    <i class="fa-solid fa-cart-shopping text-amber-500"></i>
                    Shopping Cart
                    @if($cartItems->isNotEmpty())
                        <span class="text-sm font-semibold bg-slate-800 text-amber-400 px-3 py-1 rounded-full border border-slate-700">
                            {{ $cartItems->sum('quantity') }} {{ Str::plural('item', $cartItems->sum('quantity')) }}
                        </span>
                    @endif
                </h1>
            </div>

            <a href="{{ route('buyer.browse') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-amber-400 transition self-start sm:self-auto py-2 px-3 rounded-lg hover:bg-slate-900 border border-transparent hover:border-slate-800">
                <i class="fa-solid fa-arrow-left"></i>
                Continue Shopping
            </a>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mb-6 flex items-center justify-between p-4 rounded-xl bg-emerald-950/70 border border-emerald-800/80 text-emerald-300 text-sm shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">
                    <i class="fa-solid fa-xmark text-xs"></i>
                </button>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-950/70 border border-rose-800/80 text-rose-300 text-sm shadow-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($cartItems->isEmpty())
            {{-- Empty Cart State --}}
            <div class="text-center py-20 px-4 bg-slate-900/60 border border-slate-800 rounded-3xl max-w-2xl mx-auto shadow-2xl">
                <div class="w-24 h-24 mx-auto rounded-3xl bg-slate-800/80 border border-slate-700 flex items-center justify-center text-slate-600 mb-6 shadow-inner">
                    <i class="fa-solid fa-cart-arrow-down text-4xl text-amber-500/80"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">Your cart is currently empty</h2>
                <p class="text-slate-400 text-sm max-w-md mx-auto mb-8">
                    Looks like you haven't added anything to your cart yet. Discover items listed by sellers and find great deals!
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('buyer.browse') }}" class="w-full sm:w-auto px-6 py-3 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl text-sm transition-all shadow-lg hover:shadow-amber-500/20 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-border-all text-xs"></i>
                        Browse Categories
                    </a>
                    <a href="{{ route('buyer.dashboard') }}" class="w-full sm:w-auto px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl text-sm transition border border-slate-700 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-bag-shopping text-xs"></i>
                        Explore Products
                    </a>
                </div>
            </div>
        @else
            @php
                $subtotal = 0;
                foreach ($cartItems as $item) {
                    $itemPrice = $item->products->productprice ?? 0;
                    $subtotal += $itemPrice * $item->quantity;
                }
                $shipping = 0.00; // Free shipping
                $total = $subtotal + $shipping;
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                {{-- Cart Items Column (8 cols) --}}
                <div class="lg:col-span-8 space-y-4">
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
                        <div class="px-6 py-4 border-b border-slate-800 flex items-center justify-between text-xs font-bold uppercase tracking-wider text-slate-400">
                            <span>Product & Details</span>
                            <span class="hidden sm:inline">Subtotal</span>
                        </div>

                        <div class="divide-y divide-slate-800">
                            @foreach($cartItems as $item)
                                @php
                                    $product = $item->products;
                                    $itemPrice = $product->productprice ?? 0;
                                    $lineTotal = $itemPrice * $item->quantity;
                                @endphp
                                <div class="p-6 transition hover:bg-slate-800/30 flex flex-col sm:flex-row gap-5 items-start sm:items-center justify-between">
                                    {{-- Left: Image & Info --}}
                                    <div class="flex items-start gap-4 flex-1">
                                        {{-- Product Image Thumbnail --}}
                                        <div class="w-24 h-24 shrink-0 rounded-xl bg-slate-800 border border-slate-700 overflow-hidden relative flex items-center justify-center group shadow-md">
                                            @if(!empty($product->image_url))
                                                <img src="{{ $product->image_url }}" alt="{{ $product->productname ?? 'Product' }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 flex flex-col items-center justify-center text-slate-500">
                                                    <i class="fa-solid fa-box-open text-2xl text-amber-500/70 mb-1"></i>
                                                    <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Product</span>
                                                </div>
                                            @endif
                                            @if($product && $product->category)
                                                <span class="absolute bottom-1 right-1 bg-slate-950/80 backdrop-blur-sm text-amber-400 text-[9px] font-bold px-1.5 py-0.5 rounded border border-slate-800">
                                                    {{ $product->category->categoryname }}
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Details --}}
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-base font-bold text-white hover:text-amber-400 transition truncate">
                                                {{ $product->productname ?? 'Unknown Product' }}
                                            </h3>
                                            <p class="text-xs text-slate-400 line-clamp-1 mt-0.5">
                                                {{ $product->description ?? 'No description available' }}
                                            </p>
                                            <div class="mt-2 flex items-baseline gap-2">
                                                <span class="text-sm font-black text-amber-400">
                                                    ${{ number_format($itemPrice, 2) }}
                                                </span>
                                                <span class="text-xs text-slate-500">each</span>
                                            </div>

                                            {{-- Remove button for mobile --}}
                                            <form action="{{ route('buyer.removeFromCart') }}" method="POST" class="mt-3 sm:hidden inline-block">
                                                @csrf
                                                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                                <button type="submit" class="text-xs text-rose-400 hover:text-rose-300 font-semibold inline-flex items-center gap-1.5 transition">
                                                    <i class="fa-regular fa-trash-can text-xs"></i>
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- Right: Quantity Form & Line Total --}}
                                    <div class="w-full sm:w-auto flex items-center justify-between sm:justify-end gap-6 pt-3 sm:pt-0 border-t sm:border-t-0 border-slate-800">
                                        {{-- Quantity Selector Form --}}
                                        <form action="{{ route('buyer.updateCart') }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                            
                                            <div class="flex items-center border border-slate-700 bg-slate-950 rounded-xl overflow-hidden shadow-inner">
                                                <button type="button" 
                                                    onclick="var inp = this.nextElementSibling; if(inp.value > 1){ inp.stepDown(); inp.form.submit(); }"
                                                    class="w-8 h-8 flex items-center justify-center bg-slate-800/80 text-slate-300 hover:bg-slate-700 hover:text-white transition">
                                                    <i class="fa-solid fa-minus text-[10px]"></i>
                                                </button>
                                                <input type="number" name="quantity" min="1" value="{{ $item->quantity }}" 
                                                    onchange="this.form.submit()"
                                                    class="w-12 text-center bg-transparent text-white font-bold text-xs border-none focus:outline-none focus:ring-0 p-0" />
                                                <button type="button" 
                                                    onclick="var inp = this.previousElementSibling; inp.stepUp(); inp.form.submit();"
                                                    class="w-8 h-8 flex items-center justify-center bg-slate-800/80 text-slate-300 hover:bg-slate-700 hover:text-white transition">
                                                    <i class="fa-solid fa-plus text-[10px]"></i>
                                                </button>
                                            </div>
                                        </form>

                                        {{-- Line Subtotal --}}
                                        <div class="text-right min-w-[5rem]">
                                            <span class="text-sm font-black text-white block">
                                                ${{ number_format($lineTotal, 2) }}
                                            </span>
                                            <span class="text-[10px] text-slate-500 uppercase tracking-wider font-semibold sm:hidden">
                                                Subtotal
                                            </span>
                                        </div>

                                        {{-- Remove button (Desktop) --}}
                                        <form action="{{ route('buyer.removeFromCart') }}" method="POST" class="hidden sm:inline-block">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                            <button type="submit" title="Remove item" class="w-8 h-8 rounded-lg bg-slate-800 text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 transition flex items-center justify-center border border-slate-700 hover:border-rose-500/30">
                                                <i class="fa-regular fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Bottom helper links --}}
                    <div class="flex items-center justify-between px-2 pt-2 text-xs text-slate-400">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-amber-500"></i>
                            Encrypted & secure transaction
                        </span>
                        <a href="{{ route('buyer.browse') }}" class="hover:text-amber-400 font-semibold transition">
                            <i class="fa-solid fa-plus text-[10px] mr-1"></i> Add more items
                        </a>
                    </div>
                </div>

                {{-- Order Summary Column (4 cols) --}}
                <div class="lg:col-span-4 sticky top-24">
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                        <div class="absolute -right-12 -top-12 w-36 h-36 bg-amber-500/5 rounded-full blur-2xl pointer-events-none"></div>

                        <h2 class="text-lg font-black text-white tracking-tight pb-4 border-b border-slate-800 flex items-center justify-between">
                            <span>Order Summary</span>
                            <i class="fa-solid fa-receipt text-slate-600 text-base"></i>
                        </h2>

                        <div class="py-4 space-y-3 text-sm border-b border-slate-800">
                            <div class="flex items-center justify-between text-slate-400">
                                <span>Items Subtotal</span>
                                <span class="font-bold text-white">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex items-center justify-between text-slate-400">
                                <span class="flex items-center gap-1.5">
                                    Shipping
                                    <span class="text-[10px] bg-emerald-500/20 text-emerald-400 font-bold px-1.5 py-0.5 rounded">FREE</span>
                                </span>
                                <span class="font-bold text-emerald-400">Free</span>
                            </div>
                            <div class="flex items-center justify-between text-slate-400">
                                <span>Estimated Tax</span>
                                <span class="font-bold text-slate-300">$0.00</span>
                            </div>
                        </div>

                        {{-- Total --}}
                        <div class="py-5">
                            <div class="flex items-baseline justify-between mb-1">
                                <span class="text-sm font-semibold text-slate-300">Total</span>
                                <span class="text-2xl font-black text-amber-400">
                                    ${{ number_format($total, 2) }}
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500 text-right">Taxes included if applicable</p>
                        </div>

                        <a href="{{ route('buyer.order') }}" 
                            class="w-full py-3.5 px-4 bg-amber-500 hover:bg-amber-600 active:scale-[0.99] text-slate-950 font-black rounded-xl text-sm transition-all shadow-lg hover:shadow-amber-500/25 flex items-center justify-center gap-2 group cursor-pointer text-center">
                            <i class="fa-solid fa-box-open text-xs opacity-80 group-hover:opacity-100 transition"></i>
                            <span>View Order & Delivery</span>
                            <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>

                        {{-- Payment Badges / Guarantees --}}
                        <div class="mt-6 pt-5 border-t border-slate-800 text-center">
                            <p class="text-[11px] text-slate-500 mb-3 font-semibold uppercase tracking-wider">Accepted Payment Methods</p>
                            <div class="flex items-center justify-center gap-4 text-slate-500 text-xl">
                                <i class="fa-brands fa-cc-visa hover:text-white transition"></i>
                                <i class="fa-brands fa-cc-mastercard hover:text-white transition"></i>
                                <i class="fa-brands fa-cc-apple-pay hover:text-white transition"></i>
                                <i class="fa-brands fa-cc-paypal hover:text-white transition"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layout>