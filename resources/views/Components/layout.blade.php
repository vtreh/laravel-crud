<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link route="listings.index" :active="request()->route()->getName() === 'listings.index'">Listings</x-nav-link>
                                <x-nav-link route="listings.create" :active="request()->route()->getName() === 'listings.create'">Create Listing</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="text-white">
                        @guest
                            <x-nav-link route="login" :active="request()->route()->getName() === 'login'">Login</x-nav-link>
                            <x-nav-link route="register" :active="request()->route()->getName() === 'register'">Register</x-nav-link>
                        @endguest
                        @auth
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
