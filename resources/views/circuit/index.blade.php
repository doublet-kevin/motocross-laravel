@extends('layout')

@section('content')
    <h1>Découvrez nos circuits</h1>
    <div class="flex flex-col w-full gap-4 max-w-7xl">
        @foreach ($circuits as $circuit)
            <div class="w-full p-2 border rounded-md">
                <a href="{{ route('circuit.show', $circuit) }}">
                    {{ $circuit->name }}
                </a>
                <p>
                    {{ $circuit->description }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
