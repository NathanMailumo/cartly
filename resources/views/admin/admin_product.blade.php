<x-admin-layout>
    <div class="mb-8">
        <h1 class="text-3xl font-serif font-bold text-gray-950">Product Moderation</h1>
        <p class="text-xs text-gray-500 mt-1">Review, approve, or reject submissions from merchants across Nigeria</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-sm flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white border border-gray-200 rounded-sm p-6 flex flex-col justify-between shadow-sm">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-gray-100">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-500">
                            {{ $product->category->categoryname ?? 'General' }}
                        </span>
                        @if(($product->status ?? 'waiting') === 'approved')
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase bg-emerald-100 text-emerald-800">
                                Approved
                            </span>
                        @elseif(($product->status ?? 'waiting') === 'rejected')
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase bg-red-100 text-red-800">
                                Rejected
                            </span>
                        @else
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase bg-amber-100 text-amber-800">
                                Pending
                            </span>
                        @endif
                    </div>

                    <h3 class="font-bold text-base text-gray-900 line-clamp-1">{{ $product->productname }}</h3>
                    <p class="text-xs text-gray-500 italic mt-1 line-clamp-2">{{ $product->description }}</p>
                    <p class="text-sm font-bold text-gray-900 mt-3">&#8358;{{ number_format($product->productprice) }}</p>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-2">
                    <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="w-full py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded transition text-center">
                            Approve
                        </button>
                    </form>
                    <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="w-full py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded transition text-center">
                            Reject
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white border border-gray-200 p-12 text-center text-xs text-gray-500">
                No product submissions in need of moderation.
            </div>
        @endforelse
    </div>
</x-admin-layout>