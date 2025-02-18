<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body
        class="font-sans
            antialiased
            mx-auto
            mt-10
            max-w-2xl
            bg-gradient-to-r from-green-500 from-20% via-blue-300 via-30% to-red-400 to-90%
            text-slate-700
            dark:bg-black
            dark:text-white/50"
    >
        {{ $slot }}
    </body>
</html>
