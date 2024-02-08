@extends('layout')
@section('title')
    <div>
        <button onclick="window.location.href='{{ route('admin.training.board') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Revenir au tableau de bord des
            entraînements</button>
    </div>
    <h1>
        Créer un nouvel entraînement
    </h1>
@endsection
@section('content')
    <form action="{{ route('admin.training.store') }}" method="POST">
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
                <input type="radio" id="type" name="type" value="Adulte" />
                <label for="Adulte">Adulte</label>
            </div>
            <div>
                <input type="radio" id="type" name="type" value="Enfant" />
                <label for="Enfant">Enfant</label>
            </div>
        </fieldset>
        <br>
        <label for="max_participants">Nombre de places (1-75):</label>
        <input type="number" id="max_participants" name="max_participants" min="1" max="75" />
        <br>
        <button type="submit" class="flex justify-center col-span-3 button whitespace-nowrap">Créer le nouvel
            entraînement</button>
    </form>
@endsection
