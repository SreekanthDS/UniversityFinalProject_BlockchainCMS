<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data="{
        theme: localStorage.getItem('theme') || '{{ config('theme.tenant.active', 'light') }}',
        choiceClass(className) {
            const classes = {'color-choice': true};
            classes[className] = true;
            return classes;
        },
        changeTheme(className) {
            this.seletedTheme = className
        }
    }"
    x-bind:data-theme="theme"
    @change-theme="theme = $event.detail"
    x-init="$watch('theme', (val) => localStorage.setItem('theme', val))">
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
        <script defer src="https://kit.fontawesome.com/342cc5320c.js" crossorigin="anonymous"></script>
{{--        <script defer src="node_modules/@fortawesome/fontawesome-pro/js/all.js"></script>--}}
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-base-100 drawer drawer-mobile h-full bg-image">
        <x-widget.development-widget />

        <input id="navigation-drawer" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content flex flex-col">
            <livewire:impersonation-banner />
            <x-widget.navigation.bar />
            <!-- Page content -->
            <main class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-semibold text-white">
                        {{ $pageTitle ?? __('Page') }}
                    </h1>
                </div>

                <div class="py-8">
                    <div class="max-w-7xl mx-auto sm:px-6 mx-4 sm:mx-auto lg:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        <x-widget.navigation.drawer />

        <x-modal.confirm-delete />
        @livewireScripts
    </body>
</html>
