<x-layout>
    <x-slot:title>Easybuy · Shop and Sell Fashion in Nigeria</x-slot:title>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8">
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-7 items-stretch">
            <div class="lg:col-span-4 flex flex-col justify-center py-4 sm:py-8">
                <p class="font-editorial-sans text-[9px] tracking-[0.25em] uppercase text-[#787167] mb-4">
                    <i class="fa-solid fa-star text-[7px] mr-1"></i> New Arrivals · Made for Nigeria
                </p>
                <h1 class="font-masthead text-5xl sm:text-6xl lg:text-7xl font-black leading-[0.96] text-[#161413]">
                    Good Style<br>Made Easy<br><em>for Everyone.</em>
                </h1>
                <div class="border-t border-[#231f1d] my-6"></div>
                <p class="font-serif-body text-sm leading-relaxed text-[#5e5953] max-w-sm">
                    Find everyday products from trusted sellers, or list your own items and reach buyers across Nigeria.
                </p>
                <div class="flex flex-col sm:flex-row lg:flex-col xl:flex-row gap-3 mt-7 max-w-sm">
                    <a href="{{ route('login') }}" class="flex-1 inline-flex items-center justify-between px-5 py-3.5 bg-[#1a1918] text-[#f7f4ee] font-editorial-sans text-[10px] uppercase tracking-[0.18em] hover:bg-black transition">
                        <span><i class="fa-solid fa-right-to-bracket mr-2"></i>Sign In</span>
                        <i class="fa-solid fa-arrow-right text-[9px]"></i>
                    </a>
                    <a href="{{ route('register.form') }}" class="flex-1 inline-flex items-center justify-between px-5 py-3.5 border border-[#231f1d] text-[#161413] font-editorial-sans text-[10px] uppercase tracking-[0.18em] hover:bg-[#e8e2d5] transition">
                        <span><i class="fa-solid fa-user-plus mr-2"></i>Register</span>
                        <i class="fa-solid fa-arrow-right text-[9px]"></i>
                    </a>
                </div>
            </div>

            <div id="collection" class="lg:col-span-5 relative border border-[#231f1d] bg-[#e8e2d5] p-2 min-h-[390px] sm:min-h-[500px]">
                <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=1000&q=85" alt="Basketball on a clean court" class="w-full h-full object-cover grayscale-[15%]">
                <span class="absolute top-5 right-5 bg-[#1a1918] text-[#f7f4ee] px-3 py-2 font-editorial-sans text-[8px] uppercase tracking-[0.18em]">Just Added</span>
                <div class="absolute bottom-4 left-4 right-4 bg-[#f7f4ee]/90 border border-[#231f1d] px-3 py-2 flex items-center justify-between font-editorial-sans text-[8px] uppercase tracking-[0.16em] text-[#5e5953]">
                    <span>Everyday Products</span><span>Easybuy Nigeria</span>
                </div>
            </div>

            <aside class="lg:col-span-3 border border-[#cfc8bc] bg-[#faf8f4] self-stretch">
                <div class="border-b border-[#cfc8bc] px-4 py-3 font-editorial-sans text-[9px] uppercase tracking-[0.2em] text-[#161413]"><i class="fa-solid fa-fire mr-2"></i> Popular Right Now</div>
                <div class="divide-y divide-[#cfc8bc]">
                    <a href="{{ route('login') }}" class="flex gap-3 p-3 hover:bg-[#f0ebe1] transition">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=180&q=80" alt="Wireless headphones" class="w-14 h-14 object-contain bg-white p-1">
                        <span class="flex-1"><strong class="block font-masthead text-sm">Wireless Headphones</strong><em class="block font-serif-body text-[11px] text-[#787167]">For music and calls</em><small class="font-editorial-sans text-[9px]">N5,000</small></span><i class="fa-solid fa-arrow-right self-center text-[9px] text-[#787167]"></i>
                    </a>
                    <a href="{{ route('login') }}" class="flex gap-3 p-3 hover:bg-[#f0ebe1] transition">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=180&q=80" alt="Red sneakers" class="w-14 h-14 object-contain bg-white p-1">
                        <span class="flex-1"><strong class="block font-masthead text-sm">Running Shoes</strong><em class="block font-serif-body text-[11px] text-[#787167]">Comfortable everyday pair</em><small class="font-editorial-sans text-[9px]">N8,800</small></span><i class="fa-solid fa-arrow-right self-center text-[9px] text-[#787167]"></i>
                    </a>
                    <a href="{{ route('login') }}" class="flex gap-3 p-3 hover:bg-[#f0ebe1] transition">
                        <img src="https://images.unsplash.com/photo-1524805444758-089113d48a6d?auto=format&fit=crop&w=180&q=80" alt="Classic wristwatch" class="w-14 h-14 object-contain bg-white p-1">
                        <span class="flex-1"><strong class="block font-masthead text-sm">Classic Wristwatch</strong><em class="block font-serif-body text-[11px] text-[#787167]">Simple and smart</em><small class="font-editorial-sans text-[9px]">N2,200</small></span><i class="fa-solid fa-arrow-right self-center text-[9px] text-[#787167]"></i>
                    </a>
                </div>
                <a href="{{ route('register.form') }}" class="block px-4 py-4 font-editorial-sans text-[9px] uppercase tracking-[0.18em] text-[#5e5953] hover:text-[#161413] transition">View all pieces <i class="fa-solid fa-arrow-right text-[9px] ml-1"></i></a>
            </aside>
        </section>

        <section id="categories" class="border-y border-[#cfc8bc] mt-8 py-7">
            <div class="flex items-center gap-4 mb-5"><span class="h-px bg-[#cfc8bc] flex-1"></span><h2 class="font-editorial-sans text-[9px] uppercase tracking-[0.22em] text-[#787167]">Shop by Category</h2><span class="h-px bg-[#cfc8bc] flex-1"></span></div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                <a href="{{ route('register.form') }}" class="border border-[#cfc8bc] bg-white p-3 hover:border-[#161413] transition text-center"><img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=300&q=80" alt="Basketball" class="w-full h-24 object-contain"><span class="block font-editorial-sans text-[9px] uppercase tracking-[0.14em] mt-3">Sports</span></a>
                <a href="{{ route('register.form') }}" class="border border-[#cfc8bc] bg-white p-3 hover:border-[#161413] transition text-center"><img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=300&q=80" alt="Headphones" class="w-full h-24 object-contain"><span class="block font-editorial-sans text-[9px] uppercase tracking-[0.14em] mt-3">Electronics</span></a>
                <a href="{{ route('register.form') }}" class="border border-[#cfc8bc] bg-white p-3 hover:border-[#161413] transition text-center"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=300&q=80" alt="Sneakers" class="w-full h-24 object-contain"><span class="block font-editorial-sans text-[9px] uppercase tracking-[0.14em] mt-3">Clothing</span></a>
                <a href="{{ route('register.form') }}" class="border border-[#cfc8bc] bg-white p-3 hover:border-[#161413] transition text-center"><img src="https://images.unsplash.com/photo-1524805444758-089113d48a6d?auto=format&fit=crop&w=300&q=80" alt="Wristwatch" class="w-full h-24 object-contain"><span class="block font-editorial-sans text-[9px] uppercase tracking-[0.14em] mt-3">Furniture</span></a>
                <a href="{{ route('register.form') }}" class="border border-[#cfc8bc] bg-white p-3 hover:border-[#161413] transition text-center"><img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=300&q=80" alt="Smartwatch" class="w-full h-24 object-contain"><span class="block font-editorial-sans text-[9px] uppercase tracking-[0.14em] mt-3">More Items</span></a>
            </div>
        </section>

        <section id="craftsmanship" class="grid grid-cols-2 sm:grid-cols-4 border-y border-[#cfc8bc] mt-8 mb-8">
            <div class="py-5 text-center border-r border-[#cfc8bc]"><i class="fa-solid fa-shield-halved text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">Trusted</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Reliable sellers</span></div>
            <div class="py-5 text-center border-r border-[#cfc8bc]"><i class="fa-solid fa-Cart-shopping text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">Simple</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Easy shopping</span></div>
            <div class="py-5 text-center border-r border-[#cfc8bc]"><i class="fa-solid fa-naira-sign text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">Fair</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Prices in naira</span></div>
            <div class="py-5 text-center"><i class="fa-solid fa-truck-fast text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">Local</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Delivery across Nigeria</span></div>
        </section>

        <section id="archive">
            <div class="flex items-center gap-4 mb-4"><span class="h-px bg-[#cfc8bc] flex-1"></span><h2 class="font-editorial-sans text-[9px] uppercase tracking-[0.22em] text-[#787167]"><i class="fa-solid fa-star text-[7px] mr-1"></i> From the Archive</h2><span class="h-px bg-[#cfc8bc] flex-1"></span></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <article><img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=700&q=80" alt="Basketball" class="w-full h-40 object-contain bg-white border border-[#231f1d]"><p class="font-editorial-sans text-[8px] uppercase tracking-[0.18em] text-[#787167] mt-2">Sports</p><h3 class="font-masthead text-base font-bold">Sports Gear for Every Day</h3><p class="font-serif-body italic text-xs text-[#5e5953]">Find simple equipment for practice and play.</p></article>
                <article><img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=700&q=80" alt="Wireless headphones" class="w-full h-40 object-contain bg-white border border-[#231f1d]"><p class="font-editorial-sans text-[8px] uppercase tracking-[0.18em] text-[#787167] mt-2">Electronics</p><h3 class="font-masthead text-base font-bold">Useful Tech for Your Routine</h3><p class="font-serif-body italic text-xs text-[#5e5953]">Everyday electronics from sellers you can trust.</p></article>
                <article><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=700&q=80" alt="Running shoes" class="w-full h-40 object-contain bg-white border border-[#231f1d]"><p class="font-editorial-sans text-[8px] uppercase tracking-[0.18em] text-[#787167] mt-2">Footwear</p><h3 class="font-masthead text-base font-bold">Shoes That Fit Your Day</h3><p class="font-serif-body italic text-xs text-[#5e5953]">Browse comfortable shoes for work, walks, and weekends.</p></article>
            </div>
        </section>

        <section id="how-it-works" class="border-t border-[#231f1d] mt-10 pt-8 pb-4">
            <div class="text-center mb-7">
                <p class="font-editorial-sans text-[9px] uppercase tracking-[0.22em] text-[#787167]">
                    <i class="fa-solid fa-star text-[7px] mr-1"></i> The Easybuy Process
                </p>
                <h2 class="font-masthead text-3xl sm:text-4xl text-[#161413] mt-2">How It Works</h2>
                <p class="font-serif-body text-sm text-[#5e5953] mt-2">A simple way to shop and sell fashion in Nigeria.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <article class="border border-[#cfc8bc] bg-[#faf8f4] p-5 sm:p-6">
                    <div class="flex items-center gap-3 border-b border-[#dcd7ce] pb-4 mb-4">
                        <span class="w-10 h-10 flex items-center justify-center bg-[#161413] text-[#f7f4ee]"><i class="fa-solid fa-Cart-shopping"></i></span>
                        <div>
                            <p class="font-editorial-sans text-[9px] uppercase tracking-[0.18em] text-[#787167]">For Buyers</p>
                            <h3 class="font-masthead text-xl font-bold">Shop what you like</h3>
                        </div>
                    </div>
                    <ol class="space-y-3 font-serif-body text-sm text-[#5e5953]">
                        <li class="flex gap-3"><strong class="font-editorial-sans text-xs text-[#161413]">01</strong><span><b class="text-[#161413]">Sign in</b> to your Easybuy account.</span></li>
                        <li class="flex gap-3"><strong class="font-editorial-sans text-xs text-[#161413]">02</strong><span><b class="text-[#161413]">Browse and add to cart</b> the pieces you love.</span></li>
                        <li class="flex gap-3"><strong class="font-editorial-sans text-xs text-[#161413]">03</strong><span><b class="text-[#161413]">Review your order and pay</b> securely.</span></li>
                    </ol>
                </article>

                <article class="border border-[#cfc8bc] bg-[#faf8f4] p-5 sm:p-6">
                    <div class="flex items-center gap-3 border-b border-[#dcd7ce] pb-4 mb-4">
                        <span class="w-10 h-10 flex items-center justify-center bg-[#161413] text-[#f7f4ee]"><i class="fa-solid fa-store"></i></span>
                        <div>
                            <p class="font-editorial-sans text-[9px] uppercase tracking-[0.18em] text-[#787167]">For Sellers</p>
                            <h3 class="font-masthead text-xl font-bold">Sell your products</h3>
                        </div>
                    </div>
                    <ol class="space-y-3 font-serif-body text-sm text-[#5e5953]">
                        <li class="flex gap-3"><strong class="font-editorial-sans text-xs text-[#161413]">01</strong><span><b class="text-[#161413]">Sign in</b> to your seller account.</span></li>
                        <li class="flex gap-3"><strong class="font-editorial-sans text-xs text-[#161413]">02</strong><span><b class="text-[#161413]">Add products</b> with their details and category.</span></li>
                        <li class="flex gap-3"><strong class="font-editorial-sans text-xs text-[#161413]">03</strong><span><b class="text-[#161413]">Display and manage</b> your products for buyers.</span></li>
                    </ol>
                </article>
            </div>
        </section>

        <section id="reviews" class="border-t border-[#231f1d] mt-10 pt-8 pb-4">
            <div class="text-center mb-7">
                <p class="font-editorial-sans text-[9px] uppercase tracking-[0.22em] text-[#787167]">
                    <i class="fa-solid fa-star text-[7px] mr-1"></i> The Easybuy Journal
                </p>
                <h2 class="font-masthead text-3xl sm:text-4xl text-[#161413] mt-2">Reviews</h2>
                <p class="font-serif-body text-sm text-[#5e5953] mt-2">What buyers and sellers are saying about Easybuy.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <article class="border border-[#cfc8bc] bg-[#faf8f4] p-5">
                    <div class="flex gap-1 text-[#161413] text-[10px] mb-4" aria-label="5 out of 5 stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <blockquote class="font-serif-body italic text-base leading-relaxed text-[#3d3833]">“My Cart arrived in good condition and looked just like the pictures. Shopping on Easybuy was straightforward.”</blockquote>
                    <p class="font-editorial-sans text-[9px] uppercase tracking-[0.16em] text-[#787167] mt-5">Amara O. · Buyer</p>
                </article>
                <article class="border border-[#cfc8bc] bg-[#faf8f4] p-5">
                    <div class="flex gap-1 text-[#161413] text-[10px] mb-4" aria-label="5 out of 5 stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <blockquote class="font-serif-body italic text-base leading-relaxed text-[#3d3833]">“I found something within my budget and the order process was easy from start to finish.”</blockquote>
                    <p class="font-editorial-sans text-[9px] uppercase tracking-[0.16em] text-[#787167] mt-5">Daniel M. · Buyer</p>
                </article>
                <article class="border border-[#cfc8bc] bg-[#faf8f4] p-5">
                    <div class="flex gap-1 text-[#161413] text-[10px] mb-4" aria-label="5 out of 5 stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <blockquote class="font-serif-body italic text-base leading-relaxed text-[#3d3833]">“Easybuy helps me show my products to more people and manage my listings in one place.”</blockquote>
                    <p class="font-editorial-sans text-[9px] uppercase tracking-[0.16em] text-[#787167] mt-5">Sofia K. · Seller</p>
                </article>
            </div>
        </section>
    </div>
</x-layout>
