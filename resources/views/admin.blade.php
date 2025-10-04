<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold text-purple-600">Welcome, {{ auth()->user()->name }} 🎉</h1>
                <p class="mt-2 text-gray-700">You have admin privileges. Manage your store with ease!</p>
            </div>

            <!-- Stats Cards Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Products Card -->
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <h2 class="text-lg font-semibold text-gray-600">Total Products</h2>
                    <p class="mt-2 text-3xl font-bold text-purple-600">{{ $productCount }}</p>
                </div>

                <!-- Orders Card -->
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <h2 class="text-lg font-semibold text-gray-600">Total Orders</h2>
                    <p class="mt-2 text-3xl font-bold text-purple-600">{{ $orderCount }}</p> 
                </div>

                <!-- Revenue Card -->
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <h2 class="text-lg font-semibold text-gray-600">Total Revenue</h2>
                    <p class="mt-2 text-3xl font-bold text-green-600">${{ number_format($revenue, 2) }}</p> <!-- replace with $revenue -->
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
