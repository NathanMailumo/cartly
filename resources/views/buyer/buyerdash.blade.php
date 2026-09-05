<x-layout>
    <x-slot:title>Shop Products</x-slot:title>

    <div class="w-full px-4 py-8 max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8 border-b border-slate-800 pb-4">
            <div>
                <h1 class="text-2xl font-black text-white tracking-tight">Explore Products</h1>
                <p class="text-slate-400 text-xs mt-1">Discover items listed by top vendors across Cartly</p>
            </div>
        </div>


        <!-- Sample Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products ?? [] as $product)
                <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:border-slate-700 transition group flex flex-col">
                    <div class="h-48 bg-slate-800 flex items-center justify-center text-slate-600 relative">
                        <i class="fa-solid fa-image text-4xl"></i>
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-white group-hover:text-amber-400 transition">{{ $product->productname }}</h3>
                            <p class="text-slate-400 text-xs mt-1 line-clamp-2">{{ $product->description }}</p>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-black text-amber-400">${{ number_format($product->productprice, 2) }}</span>
                                <!-- quantity and button -->
                                <form action="{{route('buyer.addToCart')}}" method="POST" class="flex items-center">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="flex items-center border border-slate-700 rounded-lg overflow-hidden mr-2">
                                        <button type="button" class="px-2 py-1 bg-slate-800 text-slate-400 hover:text-white" onclick="this.nextElementSibling.stepDown();">-</button>
                                        <input type="number" name="quantity" min="1" value="1" class="w-10 text-center bg-slate-900 text-white text-xs border-none focus:ring-0" />
                                        <button type="button" class="px-2 py-1 bg-slate-800 text-slate-400 hover:text-white" onclick="this.previousElementSibling.stepUp();">+</button>
                                    </div>
                                    <button type="submit" class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-lg text-xs transition flex items-center gap-1.5">
                                        <i class="fa-solid fa-cart-plus text-[10px]"></i> Add
                                    </button>
                                </form>
                            </div>
                            @if(session('added_product_id') == $product->id)
                                <div class="mt-2 text-right">
                                    <span class="text-xs text-green-400 font-medium inline-flex items-center gap-1">
                                        <i class="fa-solid fa-check text-[10px]"></i> Product added to cart.
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-slate-900/50 border border-slate-800 rounded-2xl">
                    <i class="fa-solid fa-box-open text-4xl text-slate-600 mb-3"></i>
                    <p class="text-slate-400 text-sm">No products available yet. Check back soon!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>