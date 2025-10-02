<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-6">Order Summary</h3>

                    <table class="w-full mb-6">
                        <thead class="border-b">
                            <tr>
                                <th class="text-left py-3">Product</th>
                                <th class="text-right py-3">Price</th>
                                <th class="text-center py-3">Quantity</th>
                                <th class="text-right py-3">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr class="border-b">
                                    <td class="py-4">{{ $item['product']->name }}</td>
                                    <td class="text-right">${{ number_format($item['product']->price, 2) }}</td>
                                    <td class="text-center">{{ $item['qty'] }}</td>
                                    <td class="text-right font-semibold">${{ number_format($item['line_total'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right py-4 font-semibold text-lg">Total:</td>
                                <td class="text-right py-4 font-bold text-xl text-blue-600">${{ number_format($total, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('cart.index') }}" class="text-blue-600 hover:text-blue-900">
                            &larr; Back to Cart
                        </a>
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded">
                                Place Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>