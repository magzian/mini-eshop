<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.products.store') }}" method="POST">
                        @csrf
                        
                        <!-- Row with 3 inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name') }}" 
                                    placeholder="Name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    name="price" 
                                    id="price" 
                                    value="{{ old('price') }}" 
                                    placeholder="Price"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('price') border-red-500 @enderror">
                                @error('price')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <input 
                                    type="number" 
                                    name="stock" 
                                    id="stock" 
                                    value="{{ old('stock') }}" 
                                    placeholder="Stock"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('stock') border-red-500 @enderror">
                                @error('stock')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description textarea full width -->
                        <div class="mb-4">
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="4" 
                                placeholder="Description (Optional)"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-between">
                            <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
                            <button 
                                type="submit" 
                                class="bg-blue-700 hover:bg-blue-800 text-white font-extrabold 
                                       py-3 px-6 rounded-lg shadow-md hover:shadow-xl 
                                       transition duration-200">
                                Create Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
