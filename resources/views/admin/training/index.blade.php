@extends('admin.layout')

@section('content')
    <div class="flex flex-col">
        @foreach ($trainings as $training)
            <div class="grid grid-cols-4 gap-4 min-w-7xl">
                <div>{{ $training->date }}</div>
                <div>{{ $training->circuit->name }}</div>
                <div>{{ $training->type }}</div>
                <div>{{ $training->number_of_places }}</div>
            </div>
        @endforeach
    </div>
@endsection
