<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" data-theme="{{ config('theme.tenant.active', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script defer src="node_modules/@fortawesome/fontawesome-pro/js/all.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
    <body class="antialiased font-sans bg-white sm:bg-gray-100 overflow-hidden h-full">
        <x-widget.development-widget/>

        <div class="min-h-full flex flex-col justify-center ">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>

