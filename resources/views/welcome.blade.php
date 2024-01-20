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
