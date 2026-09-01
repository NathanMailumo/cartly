<x-layout>
    <x-slot:title>Role</x-slot:title>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4">
        <div class="max-w-md w-full space-y-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Join Cartly</h2>
            <p class="text-gray-600">Choose how you want to use the platform to get started</p>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-6">
                <!-- Buyer Choice -->
                <a href="{{ route('register', ['role' => 'buyer']) }}"
                    class="p-6 border-2 border-transparent hover:border-indigo-600 bg-white rounded-xl shadow-sm transition-all flex flex-col items-center">
                    <div class="text-4xl mb-2">🛍️</div>
                    <span class="font-bold text-lg text-gray-800">I am a Buyer</span>
                    <span class="text-xs text-gray-500 mt-1">Shop products from multiple sellers</span>
                </a>

                <!-- Seller Choice -->
                <a href="{{ route('register', ['role' => 'seller']) }}"
                    class="p-6 border-2 border-transparent hover:border-indigo-600 bg-white rounded-xl shadow-sm transition-all flex flex-col items-center">
                    <div class="text-4xl mb-2">🏪</div>
                    <span class="font-bold text-lg text-gray-800">I am a Seller</span>
                    <span class="text-xs text-gray-500 mt-1">List items and manage your shop</span>
                </a>
            </div>
        </div>
    </div>
</x-layout>
