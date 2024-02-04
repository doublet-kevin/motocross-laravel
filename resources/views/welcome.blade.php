@extends('layout')


@section('content')
    <div class="p-2 lg:p-0">
        <div class="hidden lg:grid grid-cols-[repeat(auto-fit,minmax(100px,_1fr))] max-w-7xl m-auto my-8">
            <img class="shadow-2xl header-img " src="{{ Vite::asset('resources/images/moto-header-1.jpg') }}" alt="Image 1">
            <img class="shadow-2xl header-img" src="{{ Vite::asset('resources/images/moto-header-2.jpg') }}" alt="Image 2">
            <img class="shadow-2xl header-img" src="{{ Vite::asset('resources/images/moto-header-3.jpg') }}" alt="Image 3">
            <img class="shadow-2xl header-img" src="{{ Vite::asset('resources/images/moto-header-4.jpg') }}" alt="Image 4">
            <img class="shadow-2xl header-img" src="{{ Vite::asset('resources/images/moto-header-5.png') }}" alt="Image 4">
        </div>
        <div
            class="grid max-w-6xl gap-8 m-auto mx-6 my-20 font-bold text-center lg:grid-cols-2 text-light lg:text-start lg:mx-auto">
            <h1 class="text-4xl">
                Commencer l'aventure maintenant en rejoignant le club motocross
                <span class="text-primary">d'Auribail</span>
                !
            </h1>
            <h1 class="text-4xl">Les prochains entrainements</h1>
        </div>
        <div class="flex flex-col items-center justify-center w-full p-2 mb-8 lg:flex-row gap-x-10 lg:px-4">
            <x-home.card title="technology acquisitions 2021" button="Learn more" link="/">
                Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Sed euismod,
                nunc id ullamcorper aliquam, dui mauris aliquet justo, nec tincidunt
                nunc nunc id lectus.
            </x-home.card>
            <x-home.card title="technology acquisitions 2021" button="Learn more" link="/">
                Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Sed euismod,
                nunc id ullamcorper aliquam, dui mauris aliquet justo, nec tincidunt
                nunc nunc id lectus.
            </x-home.card>
            <x-home.card title="technology acquisitions 2021" button="Learn more" link="/">
                Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Sed euismod,
                nunc id ullamcorper aliquam, dui mauris aliquet justo, nec tincidunt
                nunc nunc id lectus.
            </x-home.card>
        </div>
        <div class="flex flex-col items-center justify-center">
            <p class="mb-4 text-2xl font-bold text-light">Galerie</p>
            <div class="container flex flex-wrap justify-center gap-8 mx-auto">
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
            </div>
        </div>

    </div>
@endsection
@section('footer-items')
    <x-home.leaftlet-map />
@endsection
</html>
