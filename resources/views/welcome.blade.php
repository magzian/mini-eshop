<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Haraka-Cart</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="text-center">
        <!-- App Title -->
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4">HarakaCart</h1>
        <p class="text-lg text-gray-600 mb-8">Click, cart, delivered - haraka 🚀</p>

        <!-- Auth Links -->
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    @if(auth()->user()->isAdmin)
                        <a href="{{ route('admin.dashboard') }}"
                           class="px-6 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition">
                           Admin Dashboard
                        </a>
                    @else
                        <a href="{{ route('home') }}"
                           class="px-6 py-2 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-600 transition">
                           User Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                       class="px-6 py-2 rounded-lg bg-green-500 text-white font-semibold hover:bg-green-600 transition">
                       Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-6 py-2 rounded-lg bg-gray-800 text-white font-semibold hover:bg-gray-900 transition">
                           Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

</body>
</html>
