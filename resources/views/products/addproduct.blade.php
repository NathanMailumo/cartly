<x-layout>
    <x-slot:title>Catalog New Piece · Easybuy Atelier</x-slot:title>

    <div class="w-full max-w-xl mx-auto px-4 py-8 flex-1 flex flex-col justify-center">

        <!-- Top Navigation -->
        <div class="flex items-center justify-between pb-3 border-b border-[#231f1d] text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#5e5953] mb-6">
            <a href="{{ route('products.product') }}" class="hover:text-[#161413] transition flex items-center gap-1.5 font-bold">
                <span>&larr;</span>
                <span>Back to Registry</span>
            </a>
            <span class="font-semibold text-[#161413]">✦ Atelier Cataloging ✦</span>
        </div>

        <div class="border-2 border-[#231f1d] bg-[#faf8f4] p-8 sm:p-10 shadow-sm">
            <div class="text-center mb-6">
                <div class="text-[10px] font-editorial-sans uppercase tracking-[0.2em] text-[#787167] mb-1">
                    ✦ New Acquisition Entry
                </div>
                <h2 class="font-masthead text-2xl sm:text-3xl text-[#161413] font-bold">
                    Catalog New Piece
                </h2>
                <p class="font-serif-body italic text-xs text-[#5e5953] mt-1">
                    Enter technical details to register a piece in the archive.
                </p>
            </div>

            <form action="{{ route('products.addProduct') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">
                        Piece Title
                    </label>
                    <input type="text" 
                           name="productname" 
                           required
                           placeholder="e.g. Madison Leather Clutch"
                           value="{{ old('productname') }}"
                           class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                </div>

                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">
                        Curator's Description
                    </label>
                    <textarea name="description" 
                              rows="3" 
                              required
                              placeholder="Supple calf leather, gold-tone clasp..."
                              class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition resize-none">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">
                        Department Category
                    </label>
                    <select name="category_id" 
                            class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body focus:outline-none transition">
                        @foreach(App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[11px] font-editorial-sans uppercase tracking-[0.15em] text-[#4a453e] mb-1">
                        Price (₦)
                    </label>
                    <input type="number" 
                           name="productprice" 
                           required
                           placeholder="6500"
                           value="{{ old('productprice') }}"
                           class="w-full bg-[#f4efe6] border border-[#cfc8bc] focus:border-[#161413] text-[#161413] px-3.5 py-2.5 text-sm font-serif-body placeholder-[#a39c91] focus:outline-none transition">
                </div>

                <button type="submit" 
                        class="w-full py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs tracking-[0.2em] uppercase transition flex items-center justify-center gap-2 cursor-pointer mt-4">
                    <span>Register Piece into Archive</span>
                    <span>&rarr;</span>
                </button>
            </form>
        </div>

    </div>
</x-layout>