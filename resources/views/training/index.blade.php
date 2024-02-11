@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endpush
@extends('layout')
@section('title')
    <h1 class="pb-4 text-4xl font-bold text-center">Inscrivez-vous sur les prochains <span
            class="text-primary">entraînements</span></h1>
@endsection
@section('content')
    <div class="flex flex-col items-center gap-2">
        <div class="flex flex-col w-full gap-2 overflow-x-scroll">
            <h2 class="pb-2 text-2xl font-bold underline text-primary">Pour nos pilotes chevronnés</h2>
            <div class="flex flex-col justify-center">
                <div class="flex w-[350px] md:w-full gap-4">
                    @foreach ($adultTrainings as $adultTraining)
                        <x-training.training-card :training="$adultTraining"
                            circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}" />
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col w-full gap-2 overflow-x-scroll">
            <h2 class="pb-2 text-2xl font-bold underline text-primary">Pour nos jeunes pilotes*</h2>
            <div class="flex flex-col justify-center">
                <div class="flex w-[350px] md:w-full gap-4">
                    @foreach ($youngTrainings as $youngTraining)
                        <x-training.training-card :training="$youngTraining"
                            circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}" />
                    @endforeach
                </div>
            </div>

            @if (session('message'))
                <script>
                    Toastify({
                        text: {!! json_encode(session('message')) !!},
                        duration: 2000,
                        gravity: "top",
                        position: "right",
                        offset: {
                            x: 20,
                            y: '80vh'
                        },
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                        onClick: function() {}
                    }).showToast();
                </script>
            @endif

        </div>
        <div class="flex flex-col">
            <span class="flex ">(*) Les sessions jeunes pilotes sont accessibles pour les 12-18
                ans</span>
            <span class="flex text-red-500">Les inscriptions sont ouverte jusqu'à 12h avant l'entraînement</span>
        </div>
    </div>
@endsection
