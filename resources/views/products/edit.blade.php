<x-layout>
    <x-slot:title>Edit Product</x-slot:title>

    <div class="bg-white rounded-2xl shadow-xl border border-slate-200/80 p-6 md:p-8 w-full max-w-lg mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Product</h1>
            <p class="text-sm text-slate-500 mt-1">Update details for {{ $product->productname }}.</p>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Product Name</label>
                <input 
                    type="text"
                    name="productname" 
                    value="{{ old('productname', $product->productname) }}"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 text-slate-800"
                >
                @error('productname')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Product Description</label>
                <textarea 
                    name="description" 
                    rows="4" 
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 text-slate-800 resize-none"
                >{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Product Price</label>
                <input 
                    type="text"
                    name="productprice" 
                    value="{{ old('productprice', $product->productprice) }}"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 text-slate-800"
                >
                @error('productprice')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Product Category</label>
                <select name="category_id" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>{{ $category->categoryname }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <button 
                type="submit" 
                class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 ease-in-out mt-2"
            >
                Update Product
            </button>
        </form>
    </div>
</x-layout>