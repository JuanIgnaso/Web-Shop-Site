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
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/fontawesome/css/all.css'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50/50">



            <!-- Aside del panel de control -->
            @include('components.adminPanel.dashboard-aside')

            <!-- Main content -->
            <main class="p-4 xl:ml-80 bg-turquoiseWhite">
            @include('layouts.navigation')

             <!-- Alertas -->
             @include('components.alerts')

                <div class="mt-12">
                    {{ $slot }}
                </div>
                <div class="text-blue-gray-600 rounded-sm">
                    @include('components.footer')
                </div>
            </main>
        </div>
    </body>
<script src="{{Vite::asset('resources/js/loadToCart.js')}}"></script>
</html>
