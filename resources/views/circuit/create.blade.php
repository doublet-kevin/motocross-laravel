@extends('layout')
@section('title')
    <div>
        <button onclick="window.location.href='{{ route('admin.training.board') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Revenir au tableau des circuits</button>
    </div>
    <h1>
        Créer un nouveau circuit
    </h1>
@endsection
@section('content')
    <form action="{{ route('admin.circuit.store') }}" method="POST">
        @csrf
        <label for="circuit_name">Nom du circuit</label>
        <input type="text" name="name" id="name">
        <br>

        <label for="circuit_name">Description du circuit</label>
        <textarea id="description" name="description" rows="5" cols="33"></textarea>
        <br>

        <button type="submit" class="flex justify-center col-span-3 button whitespace-nowrap">Créer le nouveau
            circuit</button>
    </form>
@endsection
