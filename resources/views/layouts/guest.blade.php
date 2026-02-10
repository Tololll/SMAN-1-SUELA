<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-sm">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <a href="/">
                        <x-application-logo class="w-6 h-6 fill-current text-gray-600 dark:text-gray-400" />
                    </a>
                </div>

                <!-- Card -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>