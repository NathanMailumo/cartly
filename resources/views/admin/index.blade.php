<x-admin-layout>
    <div class="mb-8">
        <h1 class="text-3xl font-serif font-bold text-gray-950">Platform Overview</h1>
        <p class="text-xs text-gray-500 mt-1">Real-time performance and inventory management</p>
    </div>

    <!-- Analytics Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Revenue Card -->
        <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold uppercase text-gray-500">
                <span>Total Revenue</span>
                <i class="fa-solid fa-money-bill-wave text-emerald-600"></i>
            </div>
            <div class="my-4">
                <span class="text-3xl font-serif font-bold text-gray-950">
                    &#8358;{{ number_format($revenue ?? 0) }}
                </span>
            </div>
            <span class="text-xs text-emerald-700 font-medium">Gross earnings across platform</span>
        </div>

        <!-- User Count Card -->
        <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold uppercase text-gray-500">
                <span>Registered Users</span>
                <i class="fa-solid fa-users text-blue-600"></i>
            </div>
            <div class="my-4">
                <span class="text-3xl font-serif font-bold text-gray-950">
                    {{ number_format($userCount ?? 0) }}
                </span>
            </div>
            <span class="text-xs text-gray-500">Active buyers and sellers</span>
        </div>

        <!-- Product Count Card -->
        <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold uppercase text-gray-500">
                <span>Total Products</span>
                <i class="fa-solid fa-box-open text-purple-600"></i>
            </div>
            <div class="my-4">
                <span class="text-3xl font-serif font-bold text-gray-950">
                    {{ number_format($productCount ?? 0) }}
                </span>
            </div>
            <span class="text-xs text-gray-500">Listed across all categories</span>
        </div>

        <!-- Pending Approvals -->
        <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold uppercase text-gray-500">
                <span>Pending Approvals</span>
                <i class="fa-solid fa-clock text-amber-500"></i>
            </div>
            <div class="my-4">
                <span class="text-3xl font-serif font-bold text-amber-600">
                    {{ number_format($pendingApprovalsCount ?? 0) }}
                </span>
            </div>
            <a href="{{ route('admin.admin_product') }}" class="text-xs text-black font-semibold hover:underline">
                Review submissions &rarr;
            </a>
        </div>
    </div>

    <!-- Recent Submissions Table -->
    <div class="bg-white border border-gray-200 rounded-sm shadow-sm p-6 sm:p-8">
        <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-200">
            <h2 class="text-xl font-serif font-bold text-gray-900">Recent Product Submissions</h2>
            <a href="{{ route('admin.admin_product') }}" class="text-xs font-semibold text-black hover:underline">View all</a>
        </div>

        @if(isset($recentProducts) && $recentProducts->isNotEmpty())
            <div class="divide-y divide-gray-100">
                @foreach($recentProducts as $product)
                    <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm">{{ $product->productname }}</h3>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $product->category->categoryname ?? 'General' }} &middot; &#8358;{{ number_format($product->productprice) }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            @if(($product->status ?? 'waiting') === 'approved')
                                <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full bg-emerald-100 text-emerald-800">Approved</span>
                            @else
                                <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-3 py-1 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded transition">
                                        Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded transition">
                                        Reject
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-xs text-gray-500 text-center py-6">No recent submissions found.</p>
        @endif
    </div>
</x-admin-layout>