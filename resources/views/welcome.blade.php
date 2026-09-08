<x-layout>
    <x-slot:title>Cartly · Curated Fashion Archive</x-slot:title>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8">
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-7 items-stretch">
            <div class="lg:col-span-4 flex flex-col justify-center py-4 sm:py-8">
                <p class="font-editorial-sans text-[9px] tracking-[0.25em] uppercase text-[#787167] mb-4">
                    <i class="fa-solid fa-star text-[7px] mr-1"></i> New Arrivals · Spring 2025
                </p>
                <h1 class="font-masthead text-5xl sm:text-6xl lg:text-7xl font-black leading-[0.96] text-[#161413]">
                    Where Every<br>Piece Tells<br><em>a Story.</em>
                </h1>
                <div class="border-t border-[#231f1d] my-6"></div>
                <p class="font-serif-body text-sm leading-relaxed text-[#5e5953] max-w-sm">
                    Thoughtfully curated luxury fashion, authenticated by our experts and delivered to the most discerning collectors worldwide.
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
                <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=1000&q=85" alt="Curated black leather handbag" class="w-full h-full object-cover grayscale-[15%]">
                <span class="absolute top-5 right-5 bg-[#1a1918] text-[#f7f4ee] px-3 py-2 font-editorial-sans text-[8px] uppercase tracking-[0.18em]">New Arrival</span>
                <div class="absolute bottom-4 left-4 right-4 bg-[#f7f4ee]/90 border border-[#231f1d] px-3 py-2 flex items-center justify-between font-editorial-sans text-[8px] uppercase tracking-[0.16em] text-[#5e5953]">
                    <span>Spring / Summer 2025</span><span>Cartly Archive</span>
                </div>
            </div>

            <aside class="lg:col-span-3 border border-[#cfc8bc] bg-[#faf8f4] self-stretch">
                <div class="border-b border-[#cfc8bc] px-4 py-3 font-editorial-sans text-[9px] uppercase tracking-[0.2em] text-[#161413]"><i class="fa-solid fa-book-open mr-2"></i> Featured This Issue</div>
                <div class="divide-y divide-[#cfc8bc]">
                    <a href="{{ route('login') }}" class="flex gap-3 p-3 hover:bg-[#f0ebe1] transition">
                        <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=180&q=80" alt="Madison clutch" class="w-14 h-14 object-cover">
                        <span class="flex-1"><strong class="block font-masthead text-sm">Madison Clutch</strong><em class="block font-serif-body text-[11px] text-[#787167]">Supple calfskin craftsmanship</em><small class="font-editorial-sans text-[9px]">N65,000</small></span><i class="fa-solid fa-arrow-right self-center text-[9px] text-[#787167]"></i>
                    </a>
                    <a href="{{ route('login') }}" class="flex gap-3 p-3 hover:bg-[#f0ebe1] transition">
                        <img src="https://images.unsplash.com/photo-1594223274512-ad4803739b7c?auto=format&fit=crop&w=180&q=80" alt="Riviera tote" class="w-14 h-14 object-cover">
                        <span class="flex-1"><strong class="block font-masthead text-sm">Riviera Tote</strong><em class="block font-serif-body text-[11px] text-[#787167]">Full-grain leather</em><small class="font-editorial-sans text-[9px]">N128,800</small></span><i class="fa-solid fa-arrow-right self-center text-[9px] text-[#787167]"></i>
                    </a>
                    <a href="{{ route('login') }}" class="flex gap-3 p-3 hover:bg-[#f0ebe1] transition">
                        <img src="https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?auto=format&fit=crop&w=180&q=80" alt="Parisian satchel" class="w-14 h-14 object-cover">
                        <span class="flex-1"><strong class="block font-masthead text-sm">Parisian Satchel</strong><em class="block font-serif-body text-[11px] text-[#787167]">Structured and refined</em><small class="font-editorial-sans text-[9px]">N92,200</small></span><i class="fa-solid fa-arrow-right self-center text-[9px] text-[#787167]"></i>
                    </a>
                </div>
                <a href="{{ route('register.form') }}" class="block px-4 py-4 font-editorial-sans text-[9px] uppercase tracking-[0.18em] text-[#5e5953] hover:text-[#161413] transition">View all pieces <i class="fa-solid fa-arrow-right text-[9px] ml-1"></i></a>
            </aside>
        </section>

        <section id="craftsmanship" class="grid grid-cols-2 sm:grid-cols-4 border-y border-[#cfc8bc] mt-8 mb-8">
            <div class="py-5 text-center border-r border-[#cfc8bc]"><i class="fa-solid fa-certificate text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">200+</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Authenticated Pieces</span></div>
            <div class="py-5 text-center border-r border-[#cfc8bc]"><i class="fa-solid fa-award text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">Expert</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Curation & Authentication</span></div>
            <div class="py-5 text-center border-r border-[#cfc8bc]"><i class="fa-solid fa-gem text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">Premium</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Luxury Materials Only</span></div>
            <div class="py-5 text-center"><i class="fa-solid fa-truck-fast text-[#5e5953] mb-2"></i><strong class="block font-masthead text-lg">Free</strong><span class="font-editorial-sans text-[8px] uppercase tracking-[0.15em] text-[#787167]">Delivery on All Orders</span></div>
        </section>

        <section id="archive">
            <div class="flex items-center gap-4 mb-4"><span class="h-px bg-[#cfc8bc] flex-1"></span><h2 class="font-editorial-sans text-[9px] uppercase tracking-[0.22em] text-[#787167]"><i class="fa-solid fa-star text-[7px] mr-1"></i> From the Archive</h2><span class="h-px bg-[#cfc8bc] flex-1"></span></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <article><img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=700&q=80" alt="The art of the Parisian bag" class="w-full h-40 object-cover border border-[#231f1d]"><p class="font-editorial-sans text-[8px] uppercase tracking-[0.18em] text-[#787167] mt-2">Editorial</p><h3 class="font-masthead text-base font-bold">The Art of the Parisian Bag</h3><p class="font-serif-body italic text-xs text-[#5e5953]">A deep dive into the ateliers of Paris.</p></article>
                <article><img src="https://images.unsplash.com/photo-1591561954557-26941169b49e?auto=format&fit=crop&w=700&q=80" alt="Vegetable tanning" class="w-full h-40 object-cover border border-[#231f1d]"><p class="font-editorial-sans text-[8px] uppercase tracking-[0.18em] text-[#787167] mt-2">Craftsmanship</p><h3 class="font-masthead text-base font-bold">Vegetable Tanning: A Dying Art</h3><p class="font-serif-body italic text-xs text-[#5e5953]">The care behind the finest leather goods.</p></article>
                <article><img src="https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?auto=format&fit=crop&w=700&q=80" alt="Seasonal collection" class="w-full h-40 object-cover border border-[#231f1d]"><p class="font-editorial-sans text-[8px] uppercase tracking-[0.18em] text-[#787167] mt-2">Collection</p><h3 class="font-masthead text-base font-bold">SS25: What the Season Holds</h3><p class="font-serif-body italic text-xs text-[#5e5953]">A preview of our most coveted arrivals.</p></article>
            </div>
        </section>
    </div>
</x-layout>
