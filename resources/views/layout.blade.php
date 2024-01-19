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
                <x-navigation.nav-item name="Créer un compte" route="/register" />
            </x-navigation.nav>
        </header>
        <main id="content">@yield('content')</main>
        @include('components.layout.footer')
    </body>
</div>
<script>
    const map = L.map('map').setView([43.3521, 1.3821], 13);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const marker = L.marker([43.3521, 1.3821]).addTo(map)
        .bindPopup('<b>Nous somme situé ici :) </b>').openPopup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(`You clicked the map at ${e.latlng.toString()}`)
            .openOn(map);
    }

    map.on('click', onMapClick);
</script>

<script>
    openOrCloseMenu = () => {
        const menu = document.getElementById('navbar-hamburger');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }
</script>

</html>
