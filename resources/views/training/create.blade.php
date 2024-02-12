@extends('layout')
@section('title')
    <div class="w-full">
        <button onclick="window.location.href='{{ route('training.board') }}'"
            class="flex  col-span-3 button whitespace-nowrap mb-4">Revenir au Dashboard</button>
    </div>
@endsection
@section('content')
    <div class="flex w-full max-w-5xl m-auto border rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('training.store') }}" method="POST" class="flex flex-col flex-grow gap-4">
                @csrf
                <h2 class="text-4xl font-bold text-accent">Ajout d'un entraînement</h2>
                <label for="circuit_id" class="font-bold">Sélectionnez un circuit *</label>
                <select id="circuit_id" name="circuit_id">
                    @foreach ($circuits as $circuit)
                        <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
                    @endforeach
                </select>
                <x-form.input-group type="datetime-local" name="date" placeholder="Date et heure" required />
                <fieldset class="flex gap-4">
                    <legend class="font-bold pb-1">Type de pilote *</legend>
                    <div class="flex items-end gap-4">
                        <label for="Pilote senior">Pilote senior</label>
                        <input type="radio" id="type" name="type" value="Pilote senior" class="w-min mb-0.5" />
                    </div>

                    <div class="flex items-end gap-4">
                        <label for="Jeune pilote">Jeune pilote</label>
                        <input type="radio" id="type" name="type" value="Jeune pilote" class="w-min mb-0.5" />
                    </div>
                </fieldset>
                <x-form.input-group type="number" name="max_participants" placeholder="Nomre de places max." required />
                <button type="submit" class="button">Créer l'entraînement</button>
            </form>
        </div>
    </div>
@endsection
