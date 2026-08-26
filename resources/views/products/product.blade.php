<x-layout>
    <x-slot:title>Products</x-slot:title>

    <div class="w-full max-w-4xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">View Products</h1>
            <a href="{{ route('addProduct') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                + Add Product
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($products ?? [] as $product)
                <div class="bg-white rounded-xl p-6 shadow-md border border-slate-200 flex flex-col justify-between relative group">
                    <div>
                        <!-- Header: Title & Delete Button -->
                        <div class="flex items-start justify-between gap-4 mb-2">
                            <h2 class="text-xl font-bold text-slate-800">{{ $product->productname }}</h2>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-slate-400 hover:text-red-600 transition p-1" title="Delete Product">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <p class="text-slate-600 text-sm mb-4">{{ $product->description }}</p>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs uppercase font-semibold text-slate-400">Price</span>
                        <span class="text-lg font-extrabold text-indigo-600">${{ $product->productprice }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-2 bg-white rounded-xl p-8 text-center border border-slate-200">
                    <p class="text-slate-500">No products available.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>