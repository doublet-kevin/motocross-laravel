@extends('layout')
@section('title')
    <div>
        <button onclick="window.location.href='{{ route('training.board') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Revenir au tableau des circuits</button>
    </div>
    <h1>
        Créer un nouveau circuit
    </h1>
@endsection
@section('content')
    <form action="{{ route('circuit.store') }}" method="POST">
        @csrf
        <label for="circuit_name">Nom du circuit</label>
        <input type="text" name="name" id="name">
        <br>

        <button type="submit">Créer le circuit</button>
    </form>
    </body>
@endsection
