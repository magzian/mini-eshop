<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Confirmation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <p class="font-bold">Order placed successfully!</p>
                        <p>Thank you for your purchase.</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-gray-700"><strong>Order ID:</strong> #{{ $order->id }}</p>
                        <p class="text-gray-700"><strong>Date:</strong> {{ $order->created_at->format('F j, Y, g:i a') }}</p>
                        <p class="text-gray-700"><strong>Total:</strong> <span class="text-2xl font-bold text-blue-600">${{ number_format($order->total, 2) }}</span></p>
                    </div>

                    <h3 class="text-xl font-bold mb-4">Order Items</h3>
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
                            @foreach($order->items as $item)
                                <tr class="border-b">
                                    <td class="py-4">{{ $item->product->name }}</td>
                                    <td class="text-right">${{ number_format($item->unit_price, 2) }}</td>
                                    <td class="text-center">{{ $item->qty }}</td>
                                    <td class="text-right font-semibold">${{ number_format($item->line_total, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="{{ route('catalog.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>