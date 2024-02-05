@extends('layout')
@section('title')
    <h1 class="text-4xl font-bold text-center">Liste des <span class="text-primary">pilotes</span></h1>
@endsection
@section('content')
    {{ $training->registrations->count() }}
@endsection
