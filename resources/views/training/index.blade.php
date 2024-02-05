@extends('layout')
@section('title')
    <h1 class="text-4xl font-bold text-center">Inscrivez-vous sur les prochains <span
            class="text-primary">entraînements</span></h1>
@endsection
@section('content')
    <div class="flex flex-col items-center justify-start gap-2">
        <div class="flex flex-col gap-2">
            <h2 class="py-2 text-2xl font-bold underline text-primary">Pour nos pilotes chevronnés</h2>
            <div class="flex flex-col items-center justify-center">
                <div class="flex w-[350px] md:w-full gap-4 overflow-x-auto">
                    @foreach ($adultTrainings as $adultTraining)
                        <x-training.training-card :training="$adultTraining"
                            circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}" adult />
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <h2 class="py-2 text-2xl font-bold underline text-primary">Pour nos jeunes pilotes*</h2>
            <div class="flex w-[350px] md:w-auto gap-4 overflow-x-auto">
                @foreach ($youngTrainings as $youngTraining)
                    <x-training.training-card :training="$youngTraining"
                        circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}" />
                @endforeach
            </div>
            <span class="flex py-2 w-80">(*) Les sessions jeunes pilotes sont accessibles pour les 12-18 ans</span>
            @if (session('message'))
                <div>
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
@endsection
