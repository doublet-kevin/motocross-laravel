@extends('layout')


@section('content')
    <div class="p-2 lg:p-0">
        <div class="hidden lg:grid grid-cols-[repeat(auto-fit,minmax(100px,_1fr))] max-w-7xl m-auto my-8">
            <img class="header-img" src="{{ Vite::asset('resources/images/moto-header-1.jpg') }}" alt="Image 1">
            <img class="header-img" src="{{ Vite::asset('resources/images/moto-header-2.jpg') }}" alt="Image 2">
            <img class="header-img" src="{{ Vite::asset('resources/images/moto-header-3.jpg') }}" alt="Image 3">
            <img class="header-img" src="{{ Vite::asset('resources/images/moto-header-4.jpg') }}" alt="Image 4">
            <img class="header-img" src="{{ Vite::asset('resources/images/moto-header-5.png') }}" alt="Image 4">
        </div>
        <div
            class="grid lg:grid-cols-2 max-w-6xl font-bold text-light gap-8 my-20 text-center lg:text-start mx-6 lg:mx-auto m-auto">
            <h1 class="text-4xl">
                Commencer l'aventure maintenant en rejoignant le club motocross
                <span class="text-primary">d'Auribail</span>
                !
            </h1>
            <h1 class="text-4xl">Les prochains entrainements</h1>

        </div>
        <div class="w-full mb-8 flex flex-col lg:flex-row justify-center items-center gap-x-10 p-2 lg:px-4">
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
        <div class="flex flex-col justify-center items-center">
            <p class="text-light mb-4 text-2xl font-bold">Galerie</p>
            <div class="container flex justify-center gap-8 mx-auto flex-wrap">
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
                <x-home.gallery-item src="{{ Vite::asset('resources/images/bike.png') }}" />
            </div>
        </div>
        <x-home.leaftlet-map />
    </div>
@endsection

</html>
