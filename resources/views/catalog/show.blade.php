<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-4xl font-bold text-blue-600 mb-4">${{ number_format($product->price, 2) }}</p>
                    
                    <div class="mb-6">
                        <span class="text-gray-700">Availability: </span>
                        @if($product->stock > 0)
                            <span class="text-green-600 font-semibold">In Stock ({{ $product->stock }} available)</span>
                        @else
                            <span class="text-red-600 font-semibold">Out of Stock</span>
                        @endif
                    </div>

                    @if($product->description)
                        <div class="mb-6">
                            <h2 class="text-xl font-semibold mb-2">Description</h2>
                            <p class="text-gray-700">{{ $product->description }}</p>
                        </div>
                    @endif

                    @if($product->stock > 0)
                        <form action="{{ route('cart.add', $product) }}" method="POST" class="flex items-end gap-4">
                            @csrf
                            <div>
                                <label for="qty" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                                <input type="number" name="qty" id="qty" value="1" min="1" max="{{ $product->stock }}" 
                                    class="w-24 rounded-md border-gray-300 shadow-sm">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                Add to Cart
                            </button>
                        </form>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('catalog.index') }}" class="text-blue-600 hover:text-blue-900">
                            &larr; Back to Catalog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>