@extends('admin.layout')
@section('content')

    <body>
        <h1>
            Créer un circuit
        </h1>
        <form action="{{ route('admin.circuit.store') }}" method="POST">
            @csrf
            <label for="circuit_name">Nom du circuit</label>
            <input type="text" name="name" id="name">
            <br>

            <button type="submit">Créer le circuit</button>
        </form>
    </body>
@endsection
