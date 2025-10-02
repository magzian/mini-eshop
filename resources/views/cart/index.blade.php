<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
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
                    @if(empty($cartItems))
                        <p class="text-gray-500 text-center py-8">Your cart is empty.</p>
                        <div class="text-center">
                            <a href="{{ route('catalog.index') }}" class="text-blue-600 hover:text-blue-900">
                                Continue Shopping
                            </a>
                        </div>
                    @else
                        <table class="w-full">
                            <thead class="border-b">
                                <tr>
                                    <th class="text-left py-3">Product</th>
                                    <th class="text-right py-3">Price</th>
                                    <th class="text-center py-3">Quantity</th>
                                    <th class="text-right py-3">Subtotal</th>
                                    <th class="text-right py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                    <tr class="border-b">
                                        <td class="py-4">
                                            <a href="{{ route('catalog.show', $item['product']) }}" class="text-blue-600 hover:text-blue-900">
                                                {{ $item['product']->name }}
                                            </a>
                                        </td>
                                        <td class="text-right">${{ number_format($item['product']->price, 2) }}</td>
                                        <td class="text-center">{{ $item['qty'] }}</td>
                                        <td class="text-right font-semibold">${{ number_format($item['line_total'], 2) }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('cart.remove', $item['product']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right py-4 font-semibold text-lg">Total:</td>
                                    <td class="text-right py-4 font-bold text-xl text-blue-600">${{ number_format($total, 2) }}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="mt-6 flex justify-between items-center">
                            <div class="space-x-4">
                                <a href="{{ route('catalog.index') }}" class="text-blue-600 hover:text-blue-900">
                                    Continue Shopping
                                </a>
                                <form action="{{ route('cart.clear') }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Clear entire cart?')">
                                        Clear Cart
                                    </button>
                                </form>
                            </div>
                            @auth
                                <a href="{{ route('checkout.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded">
                                    Proceed to Checkout
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
                                    Login to Checkout
                                </a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>