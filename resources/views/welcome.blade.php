@extends('layout')


@section('content')
    <div class="p-2 lg:p-0">

        <div class="lg:grid lg:grid-cols-2  min-h-screen">
            <div class="col-span-1">
                <div>
                    <div class="rounded-full mt-8">
                        <img width="800px" height="800px" class="bg-motocross-circle" />
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <main class="container text-center lg:text-start mx-auto px-4 py-8 items-center lg:flex lg:flex-col">
                    <header class="py-4">
                        <x-navigation.nav>
                            <x-navigation.nav-item name="Accueil" route="/" />
                            <x-navigation.nav-item name="Notre circuit" route="/" />
                            <x-navigation.nav-item name="Nos entraînements" route="/" />
                            <x-navigation.nav-item name="Connexion" route="/" />
                        </x-navigation.nav>
                    </header>
                    <h1
                        class="mt-1
                                bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 bg-clip-text text-4xl
                                font-extrabold uppercase tracking-tighter text-transparent sm:text-5xl lg:text-7xl">
                        Motocross
                    </h1>
                    <h1
                        class="mt-1 bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 bg-clip-text text-4xl font-extrabold uppercase tracking-tighter text-transparent sm:text-5xl lg:text-7xl">
                        AURIBAIL
                    </h1>
                    <div
                        class="max-w-sm p-6 mt-10 card-glass bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Noteworthy technology acquisitions 2021</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-200 dark:text-gray-400">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Sed euismod,
                            nunc id ullamcorper aliquam, dui mauris aliquet justo, nec tincidunt
                            nunc nunc id lectus.
                        </p>
                        <a href=""
                            class="bg-orange-500 !text-white hover:bg-orange-600 duration-500 inline-flex items-center px-3 py-2 text-sm font-medium text-center rounded-lg  focus:ring-4 focus:outline-none ">
                            Learn more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </main>
            </div>
        </div>
        <div class="w-full mb-8 lg:flex justify-center gap-x-10 p-2 lg:p-0">
            <div
                class="max-w-sm p-6 mt-10 card-glass bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                        technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-200 dark:text-gray-400">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Sed euismod,
                    nunc id ullamcorper aliquam, dui mauris aliquet justo, nec tincidunt
                    nunc nunc id lectus.
                </p>
                <a href=""
                    class="bg-orange-500 !text-white hover:bg-orange-600 duration-500 inline-flex items-center px-3 py-2 text-sm font-medium text-center rounded-lg  focus:ring-4 focus:outline-none ">
                    Learn more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div
                class="max-w-sm p-6 mt-10 card-glass bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                        technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-200 dark:text-gray-400">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Sed euismod,
                    nunc id ullamcorper aliquam, dui mauris aliquet justo, nec tincidunt
                    nunc nunc id lectus.
                </p>
                <a href=""
                    class="bg-orange-500 !text-white hover:bg-orange-600 duration-500 inline-flex items-center px-3 py-2 text-sm font-medium text-center rounded-lg  focus:ring-4 focus:outline-none ">
                    Learn more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div
                class="max-w-sm p-6 mt-10 card-glass bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                        technology acquisitions 2021</h5>
                </a>
                <p class="mb-3 font-normal text-gray-200 dark:text-gray-400">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Sed euismod,
                    nunc id ullamcorper aliquam, dui mauris aliquet justo, nec tincidunt
                    nunc nunc id lectus.
                </p>
                <a href=""
                    class="bg-orange-500 !text-white hover:bg-orange-600 duration-500 inline-flex items-center px-3 py-2 text-sm font-medium text-center rounded-lg  focus:ring-4 focus:outline-none ">
                    Learn more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="lg:grid lg:grid-cols-3 container gap-x-6 mx-auto">
            <div class="col-span-1">
                <img height="50%" class="border-2 border-orange-500"
                    src="{{ Vite::asset('resources/images/motocross-classic.png') }}"></img>
            </div>
            <div class="col-span-2 text-white">
                <h1 class="text-4xl mt-8 mb-8">Vestibulum quis nisl molestie, porttitor <span class="underline">lorem
                        vitae</span>, </h1>
                <p>
                    Nullam elementum porttitor urna, ac dictum felis ornare ut. Ut luctus, risus quis aliquam
                    fermentum, turpis nulla fringilla libero, et vestibulum lectus lectus ut ligula. Aliquam
                    tincidunt orci sed tincidunt fermentum. Vestibulum auctor justo condimentum urna ornare, sit
                    amet auctor est bibendum. Morbi vitae erat convallis elit gravida sollicitudin. Nullam eget
                    facilisis arcu. Proin non sagittis felis. Nulla scelerisque risus felis, vel finibus erat
                    pharetra nec. In rutrum sapien vitae ultrices vulputate. Sed eget augue ac urna ultricies
                    dignissim.
                </p>
            </div>
        </div>
        <p class="text-orange-500 mb-4 text-2xl font-bold text-center">Galerie des photos des entrainements</p>
        <div class="container flex gap-8 mx-auto mb-8 flex-wrap">
            <x-gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
            <x-gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
            <x-gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
            <x-gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
            <x-gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
            <x-gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
        </div>
        <div id="map" style="height: 400px;"></div>
    </div>
    </div>
    </div id="footer">
@endsection
<!-- le script pr afficher la carte -->
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
<!--
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
-->

</html>
