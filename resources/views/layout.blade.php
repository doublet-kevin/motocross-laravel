<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')
    <title>Motocross</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('scripts')
</head>

<body class="flex flex-col bg-body">
    <div id="page">
        <header>
            <!-- Desktop Navigation -->
            <div
                class="flex-col items-center hidden py-4 mx-12 text-center lg:flex lg:text-start lg:flex-row lg:justify-between">
                <x-navigation.nav />
            </div>
            <!-- Mobile Navigation -->
            <x-navigation.mobile-nav />
        </header>
        <main class="flex flex-col items-center flex-grow mx-12 my-auto mt-8 md:items-start">
            @yield('title')
            <div class="flex flex-col flex-grow">
                @yield('content')
            </div>
        </main>
        <x-layout.footer>
            <x-layout.footer-item title="Find us on..">
                <div class="flex gap-x-6">
                    <x-social.icon url="https://www.facebook.com/"
                        src="{{ Vite::asset('resources/images/icons/twitter.svg') }}" />
                    <x-social.icon url="https://www.facebook.com/"
                        src="{{ Vite::asset('resources/images/icons/linkedin.svg') }}" />
                    <x-social.icon url="https://www.facebook.com/"
                        src="{{ Vite::asset('resources/images/icons/instagram.svg') }}" />
                </div>
            </x-layout.footer-item>
            <x-layout.footer-item title="Recent News">
                Most of our events have hard and easy
                route choices as we are always keen to encourage new riders.
            </x-layout.footer-item>
            <x-layout.footer-item title="Newsletter">
                <input type="text" id="mail" placeholder="john.doe@mail.com" required>
            </x-layout.footer-item>
        </x-layout.footer>

    </div>
</body>

</html>
