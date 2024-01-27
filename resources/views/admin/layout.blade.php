<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motocross</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('scripts')
</head>

<div id="page">

    <body class="flex flex-col items-center justify-center bg-body">
        <header>
            <!-- Desktop Navigation -->
            <div
                class="flex-col items-center hidden py-4 mx-12 text-center lg:flex lg:text-start lg:flex-row lg:justify-between">
                <x-navigation.nav>
                    <x-navigation.nav-item name="Accueil" route="/" />
                    <x-navigation.nav-item name="Notre circuit" route="/" />
                    <x-navigation.nav-item name="Nos entraînements" route="/" />
                </x-navigation.nav>

                <x-navigation.nav>
                    @guest
                        <x-navigation.nav-item name="Connexion" route="{{ route('login') }}" />
                        <x-navigation.nav-item name="Créer un compte" route="{{ route('register') }}" />
                    @endguest
                    @auth
                        @if (Auth::user()->isAdmin())
                            <x-navigation.nav-item name="Administration" route="/admin" />
                        @endif
                        <x-navigation.nav-item name="Déconnexion" route="/logout" />
                    @endauth
                </x-navigation.nav>
            </div>
            <!-- Desktop Navigation -->
            <x-navigation.mobile-nav />
        </header>


        <main class="flex items-center justify-center flex-grow w-full max-w-5xl mx-auto mt-8 xl:max-w-7xl">
            <!-- Admin Dashboard Navigation -->
            <div class="flex-grow">
                <ul class="hidden gap-4 py-4 mx-4 sm:flex lg:mx-0">
                    <li><a href="{{ route('admin.users.index') }}" class="button-inactive">Utilisateurs</a></li>
                    <li><a href="{{ route('admin.trainings.index') }}" class="button-inactive">Entraînements</a></li>
                    <li><a href="{{ route('admin.circuits.index') }}" class="button-inactive">Circuits</a></li>
                    <li><a href="{{ route('admin.licenses.index') }}" class="button-inactive">Licenses</a></li>
                </ul>

                <div x-data="{ open: false }" class="flex flex-col m-4 sm:hidden lg:mx-0">
                    <button @click="open = !open"
                        class="flex items-center justify-center gap-2 px-3 py-2 font-medium text-center duration-500 bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none">
                        <span>Dashboard</span>
                        <img src="{{ Vite::asset('resources/images/icons/chevron-down.svg') }}"
                            class="transition-all duration-300"
                            x-bind:style="open ? 'transform: rotate(-180deg);;' : 'transform: rotate(0deg);'">
                    </button>
                    <ul class="flex flex-col gap-2 overflow-hidden transition-all duration-300 max-h-0"
                        x-bind:style="open ? 'max-height: 500px;' : 'max-height: 0;'">
                        <li><a href="{{ route('admin.users.index') }}" class="mt-2 button-inactive">Utilisateurs</a>
                        </li>
                        <li><a href="{{ route('admin.trainings.index') }}" class="button-inactive">Entraînements</a>
                        </li>
                        <li><a href="{{ route('admin.circuits.index') }}" class="button-inactive">Circuits</a></li>
                        <li><a href="{{ route('admin.licenses.index') }}" class="button-inactive">Licenses</a></li>
                    </ul>
                </div>

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
    </body>
</div>

</html>
