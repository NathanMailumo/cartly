<x-admin-layout>
    <x-slot:header>Overview & Analytics</x-slot:header>

    <!-- Top Banner Section -->
    <div class="text-center mb-8">
        <div class="flex items-center justify-center gap-4">
            <div class="flex-1 border-b border-[#231f1d]"></div>
            <div class="text-sm font-editorial-sans uppercase tracking-[0.2em] text-[#161413] font-bold px-2">
                ✦ Platform Archive Metrics ✦
            </div>
            <div class="flex-1 border-b border-[#231f1d]"></div>
        </div>
        <div class="text-[10px] font-editorial-sans uppercase tracking-[0.25em] text-[#787167] mt-1">
            System Overview · Real-time Operational Statistics
        </div>
    </div>

    <!-- Analytics Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-0 border-t border-l border-[#231f1d] mb-8">
        
        <!-- Revenue Card -->
        <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between">
            <div class="flex items-center justify-between text-[10px] font-editorial-sans uppercase tracking-widest text-[#787167]">
                <span>Total Revenue</span>
                <i class="fa-solid fa-money-bill-wave text-sm"></i>
            </div>
            <div class="my-4">
                <span class="font-masthead text-3xl font-black text-[#161413]">
                    ₦{{ number_format($revenue ?? 0) }}
                </span>
            </div>
            <div class="text-[10px] font-editorial-sans uppercase text-[#2c7a7b]">
                ✦ Gross earnings
            </div>
        </div>

        <!-- User Count Card -->
        <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between">
            <div class="flex items-center justify-between text-[10px] font-editorial-sans uppercase tracking-widest text-[#787167]">
                <span>Total Registered Users</span>
                <i class="fa-solid fa-users text-sm"></i>
            </div>
            <div class="my-4">
                <span class="font-masthead text-3xl font-black text-[#161413]">
                    {{ number_format($userCount ?? 0) }}
                </span>
            </div>
            <div class="text-[10px] font-editorial-sans uppercase text-[#787167]">
                Buyers & Sellers cataloged
            </div>
        </div>

        <!-- Product Count Card -->
        <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between">
            <div class="flex items-center justify-between text-[10px] font-editorial-sans uppercase tracking-widest text-[#787167]">
                <span>Cataloged Products</span>
                <i class="fa-solid fa-box-open text-sm"></i>
            </div>
            <div class="my-4">
                <span class="font-masthead text-3xl font-black text-[#161413]">
                    {{ number_format($productCount ?? 0) }}
                </span>
            </div>
            <div class="text-[10px] font-editorial-sans uppercase text-[#787167]">
                Active archive pieces
            </div>
        </div>

        <!-- Orders Count Card -->
        <div class="border-r border-b border-[#231f1d] p-5 bg-[#faf8f4] flex flex-col justify-between">
            <div class="flex items-center justify-between text-[10px] font-editorial-sans uppercase tracking-widest text-[#787167]">
                <span>Total Orders</span>
                <i class="fa-solid fa-bag-shopping text-sm"></i>
            </div>
            <div class="my-4">
                <span class="font-masthead text-3xl font-black text-[#161413]">
                    {{ number_format($orderCount ?? 0) }}
                </span>
            </div>
            <div class="text-[10px] font-editorial-sans uppercase text-[#787167]">
                Completed transactions
            </div>
        </div>

    </div>

    <!-- Lower Section: Recent Logs & Action Controls -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Quick Administrative Actions -->
        <div class="border border-[#231f1d] p-5 bg-[#f7f4ee]">
            <h3 class="font-editorial-sans text-xs uppercase tracking-[0.2em] font-bold text-[#161413] border-b border-[#231f1d] pb-2 mb-4">
                Quick Actions
            </h3>
            <div class="space-y-3 font-editorial-sans text-xs uppercase tracking-wider">
                <a href="{{ route('products.product') }}" class="block p-3 border border-[#231f1d] bg-[#faf8f4] hover:bg-[#161413] hover:text-[#f7f4ee] transition flex items-center justify-between">
                    <span>Manage Products</span>
                    <span>&rarr;</span>
                </a>
                <a href="#" class="block p-3 border border-[#231f1d] bg-[#faf8f4] hover:bg-[#161413] hover:text-[#f7f4ee] transition flex items-center justify-between">
                    <span>View All Users</span>
                    <span>&rarr;</span>
                </a>
                <a href="#" class="block p-3 border border-[#231f1d] bg-[#faf8f4] hover:bg-[#161413] hover:text-[#f7f4ee] transition flex items-center justify-between">
                    <span>Audit System Logs</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Platform Status Card -->
        <div class="lg:col-span-2 border border-[#231f1d] p-5 bg-[#faf8f4]">
            <h3 class="font-editorial-sans text-xs uppercase tracking-[0.2em] font-bold text-[#161413] border-b border-[#231f1d] pb-2 mb-4">
                System Status & Information
            </h3>
            <div class="space-y-3 font-serif-body text-sm leading-relaxed text-[#5e5953]">
                <p>
                    All database systems and authentication guards are running. You are signed in as a root administrator via the <code class="bg-[#e5dfd5] text-[#161413] px-1.5 py-0.5 rounded text-xs font-mono">admin</code> guard.
                </p>
                <div class="p-3 border border-[#dcd7ce] bg-[#f7f4ee] text-xs font-editorial-sans uppercase tracking-widest text-[#161413]">
                    ✦ Security Status: Fully Protected via Admin Guard Middleware
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>