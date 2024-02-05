@extends('layout')
@section('title')
    <h1 class="text-4xl font-bold text-center">Liste des <span class="text-primary">pilotes</span></h1>
@endsection
@section('content')
    <div class="">
        @foreach ($participants as $participant)
            <div>{{ $participant->firstname }} {{ $participant->lastname }}</div>
        @endforeach
    </div>
@endsection
