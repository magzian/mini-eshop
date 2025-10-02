<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-2xl font-bold text-blue-600 mb-2">${{ number_format($product->price, 2) }}</p>
                            <p class="text-sm text-gray-600 mb-2">Stock: {{ $product->stock }}</p>
                            @if($product->description)
                                <p class="text-sm text-gray-700 mb-4 line-clamp-2">{{ $product->description }}</p>
                            @endif
                            <div class="flex gap-2">
                                <a href="{{ route('catalog.show', $product) }}" class="flex-1 text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-12">
                        No products available at the moment.
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>