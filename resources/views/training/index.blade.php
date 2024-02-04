@extends('layout')
@section('title')
    <h1 class="text-4xl font-bold text-center">Inscrivez-vous sur les prochains <span class="text-primary">entraînements</span></h1>
@endsection
@section('content')
    <div class="flex">
        <h2 class="text-2xl font-bold text-primary">Pour nos pilotes chevronnés</h2>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($trainings as $training)
         <x-training.training-card :training="$training" circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}"/>
        @endforeach
    </div>
        <div class="flex">
        <h2 class="text-2xl font-bold text-primary">Pour nos jeunes pilotes*</h2>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($trainings as $training)
         <x-training.training-card :training="$training" circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}"/>
        @endforeach
    </div>
@endsection
