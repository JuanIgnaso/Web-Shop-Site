<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @session('message')
                <div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-green-800 rounded-lg bg-green-50 " role="alert">
                    <span class="font-medium">Acción completada!</span> {{session('message')}}
                </div>
                @endsession

                @session('error')
                <div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                    <span class="font-medium">Oh vaya!</span> {{session('error')}}
                </div>
                @endsession
                {{ $slot }}
            </main>
        </div>


<footer class="bg-white rounded-lg shadow m-4">
    <div class="flex justify-between p-6">
      <span class="text-sm text-gray-500 sm:text-center ">© {{ now()->year }} <a href="https://flowbite.com/" class="hover:underline">Laravel Web Shop™</a>. All Rights Reserved.
    </span>
    <ul class="flex gap-4 flex-wrap items-center mt-3 text-sm font-medium text-gray-500  sm:mt-0">
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">About</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
    </div>
</footer>

    </body>
</html>
