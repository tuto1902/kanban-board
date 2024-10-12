<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <style>
        [x-cloak] {
            display: hidden !important;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="dark antialiased bg-gray-50 dark:bg-gray-950 text-gray-950 dark:text-white font-normal min-h-screen">
    <div class="h-screen flex">
        {{ $sidebar }}

        {{ $slot }}
    </div>
    @livewireScriptConfig
    @vite(['resources/js/app.js'])
</body>

</html>
