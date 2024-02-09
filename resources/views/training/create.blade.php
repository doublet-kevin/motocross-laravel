@extends('layout')
@section('title')
    <h1>
        Créer un training
    </h1>
@endsection
@section('content')
    <form action="{{ route('training.store') }}" method="POST">
        @csrf
        <label for="circuit_id">Sélectionnez un circuit</label>
        <select id="circuit_id" name="circuit_id">
            @foreach ($circuits as $circuit)
                <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="date">Date du training</label>
        <input type="date" name="date" id="date">
        <br>
        <fieldset>
            <legend>Choisir le type de training</legend>
            <div>
                <input type="radio" id="type" name="type" value="Pilote senior" />
                <label for="Pilote senior">Pilote senior</label>
            </div>
            <div>
                <input type="radio" id="type" name="type" value="Jeune pilote" />
                <label for="Jeune pilote">Jeune pilote</label>
            </div>
        </fieldset>
        <br>
        <label for="max_participants">Nombre de places (1-75):</label>
        <input type="number" id="max_participants" name="max_participants" min="1" max="75" />
        <br>
        <button type="submit">Créer le training</button>
    </form>
@endsection
