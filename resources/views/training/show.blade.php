@extends('layout')
@section('title')
    <h1 class="text-4xl font-bold text-center">Liste des <span class="text-primary">pilotes</span></h1>
@endsection
@section('content')
    <div class="max-w-4xl py-8">
        <div class="grid grid-cols-8 gap-4">
            @foreach ($participants as $participant)
                <button class="button-inactive backdrop-blur-lg">
                    {{ $participant->firstname }} {{ $participant->lastname }}
                </button>
            @endforeach
            @for ($i = 1; $i <= 75 - $participants->count(); $i++)
                <div class="p-1 text-center rounded border border-primary backdrop-blur-lg">
                    Place disponible
                </div>
            @endfor
        </div>
    </div>
@endsection
