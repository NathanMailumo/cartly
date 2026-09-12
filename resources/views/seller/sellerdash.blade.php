<x-layout>
    <x-slot:title>easybuy · Seller Dashboard</x-slot:title>

    @php
        $sellerProducts = \App\Models\Products::where('seller_id', Auth::id())->get();
        $approvedCount = $sellerProducts->where('status', 'approved')->count();
        $waitingCount = $sellerProducts->where('status', 'waiting')->count();
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

        <!-- Welcome Card -->
        <div class="bg-white border border-gray-200 p-6 sm:p-10 mb-8 rounded-sm shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <span class="text-[11px] font-bold tracking-widest uppercase text-gray-500 block mb-1">
                    SELLER ATELIER
                </span>
                <h1 class="text-3xl sm:text-4xl font-serif font-bold text-gray-950">
                    Welcome, {{ Auth::user()->name ?? 'Merchant' }}
                </h1>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">
                    Manage your active inventory, catalog new pieces, and monitor order approval status.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('products.product') }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 hover:border-black text-gray-900 font-semibold text-xs rounded transition">
                    Manage Products
                </a>
                <a href="{{ route('addProduct') }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 bg-[#f5ce42] hover:bg-[#e6c035] text-black font-semibold text-xs rounded transition shadow-sm">
                    + Add New Product
                </a>
            </div>
        </div>

        <!-- Metrics Overview Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Total Catalog Items</span>
                <span class="text-3xl font-serif font-bold text-gray-950 block mt-2">{{ $sellerProducts->count() }}</span>
                <span class="text-xs text-gray-500 mt-1 block">Registered in your store</span>
            </div>
            <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Approved & Live</span>
                <span class="text-3xl font-serif font-bold text-emerald-600 block mt-2">{{ $approvedCount }}</span>
                <span class="text-xs text-gray-500 mt-1 block">Visible to buyers across Nigeria</span>
            </div>
            <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Awaiting Approval</span>
                <span class="text-3xl font-serif font-bold text-amber-500 block mt-2">{{ $waitingCount }}</span>
                <span class="text-xs text-gray-500 mt-1 block">In review by platform administrators</span>
            </div>
        </div>

        <!-- Recent Products Section -->
        <div class="bg-white border border-gray-200 p-6 sm:p-8 rounded-sm shadow-sm">
            <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-200">
                <h2 class="text-xl font-serif font-bold text-gray-900">Your Store Catalog</h2>
                <a href="{{ route('addProduct') }}" class="text-xs font-semibold text-black hover:underline">+ Add Product</a>
            </div>

            @if($sellerProducts->isNotEmpty())
                <div class="divide-y divide-gray-100">
                    @foreach($sellerProducts->take(6) as $p)
                        <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm">{{ $p->productname }}</h3>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $p->category->categoryname ?? 'General' }} &middot; &#8358;{{ number_format($p->productprice) }}</p>
                            </div>
                            <div class="flex items-center gap-3">
                                @if($p->status === 'approved')
                                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full bg-emerald-100 text-emerald-800">
                                        Approved
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full bg-amber-100 text-amber-800">
                                        In Review
                                    </span>
                                @endif
                                <a href="{{ route('products.edit', $p->id) }}" class="text-xs font-semibold text-gray-600 hover:text-black transition">
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10 text-gray-500 text-xs">
                    <p>No products listed yet. Click "+ Add New Product" above to catalog your first piece.</p>
                </div>
            @endif
        </div>

    </div>
</x-layout>