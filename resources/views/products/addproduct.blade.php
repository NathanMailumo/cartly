<x-layout>
    <x-slot:title>Add Product</x-slot:title>

    <div class="bg-white rounded-2xl shadow-xl border border-slate-200/80 p-6 md:p-8 w-full max-w-lg mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Add Products</h1>
            <p class="text-sm text-slate-500 mt-1">Enter details to publish a new item to Cartly.</p>
        </div>

        <form action="{{ route('products.addProduct') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Product Name</label>
                <input 
                    type="text"
                    placeholder="e.g. Basketball" 
                    name="productname" 
                    value=""
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 text-slate-800"
                >
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Product Description</label>
                <textarea 
                    name="description" 
                    id="" 
                    rows="4" 
                    placeholder="Describe your product details..."
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 text-slate-800 resize-none"
                ></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Product Price</label>
                <div class="relative">
                    <input 
                        type="text"
                        placeholder="e.g. $22.00" 
                        name="productprice" 
                        value=""
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder:text-slate-400 text-slate-800"
                    >
                </div>
            </div>

            <button 
                type="submit" 
                class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all duration-150 ease-in-out mt-2"
            >
                Add Product
            </button>
        </form>
    </div>
</x-layout>