@extends('layout')
@section('content')
    <div class="flex w-full max-w-5xl m-auto border rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('training.update', $training->id) }}" method="post" class="flex flex-col flex-grow gap-4">
                @csrf
                @method('PUT')
                {{ $errors }}
                <h2 class="text-4xl font-bold text-accent">Modification de l'entraînement</h2>
                <div class="grid grid-cols-4 gap-x-8 items-end">
                    <x-form.input-group type="date" name="date" placeholder="Date"
                        value="{{ \Carbon\Carbon::parse($training->date)->format('Y-m-d') }}" :errors="$errors->date" />
                    <x-form.input-group type="time" name="time" placeholder="Heure"
                        value="{{ \Carbon\Carbon::parse($training->date)->format('H:i') }}" />

                    <div class="flex flex-col gap-2 mt-2 whitespace-nowrap col-span-2">
                        <label for="type" class="font-bold">Circuit</label>
                        <select name="type" id="type">
                            <option value="" disabled>Type d'entraînement</option>
                            <option value="Jeune pilote"
                                {{ $training->circuit->type == $training->circuit->type ? 'selected' : '' }}>Jeune pilote
                            </option>
                            <option value="Pilote senior"
                                {{ $training->circuit->type == $training->circuit->type ? 'selected' : '' }}>Pilote senior
                            </option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-2 mt-2 whitespace-nowrap col-span-2">
                        <label for="circuit_id" class="font-bold">Circuit</label>
                        <select name="circuit_id" id="circuit_id">
                            <option value="" disabled>Choix du circuit</option>
                            @foreach ($circuits as $circuit)
                                <option value="{{ $circuit->id }}"
                                    {{ $training->circuit->name == $circuit->name ? 'selected' : '' }}>
                                    {{ $circuit->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <x-form.input-group type="number" name="max_participants" placeholder="Nombre de places"
                        value="{{ $training->max_participants }}" />

                    <button class="button text-lg">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
