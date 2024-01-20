<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motocross</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<div id="page">

    <body class="bg-body flex flex-col">
        <header class="py-4">
            <x-navigation.nav>
                <x-navigation.nav-item name="Accueil" route="/" />
                <x-navigation.nav-item name="Notre circuit" route="/" />
                <x-navigation.nav-item name="Nos entraînements" route="/" />
                <x-navigation.nav-item name="Connexion" route="/login" />
                <x-navigation.nav-item name="Créer un compte" route="/login" />
            </x-navigation.nav>
        </header>
        <main id="content" class="">@yield('content')</main>
        <x-layout.footer>
            <x-layout.footer-item title="Motocross">
                Most of our events have hard and easy route choices as we are always keen to encourage new riders.
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
                <p>
                    Most of our events have hard and easy
                    route choices as we are always keen to encourage new riders.
                </p>
            </x-layout.footer-item>
            <x-layout.footer-item title="Newsletter">
                <input type="text" id="first_name"
                    class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" required>
            </x-layout.footer-item>
        </x-layout.footer>
    </body>
</div>

</html>
