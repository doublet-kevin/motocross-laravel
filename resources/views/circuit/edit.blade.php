@extends('layout')
@section('content')
    <div class="flex w-full max-w-5xl m-auto border rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('circuit.update', $circuit->id) }}" method="POST" class="flex flex-col flex-grow gap-4">
                @csrf
                @method('PUT')
                <h2 class="text-4xl font-bold text-accent">Modification du circuit</h2>
                <x-form.input-group type="text" name="name" placeholder="Nom du circuit" value="{{ $circuit->name }}"
                    :errors="$errors->name" />
                <div class="flex flex-col gap-2 mt-2 whitespace-nowrap col-span-2">
                    <label for="circuit_id" class="font-bold">Déscriptif</label>
                    <textarea name="decription" id="description" rows="7">{{ $circuit->description }}</textarea>
                </div>
                <br>
                <button type="submit" class="button">Modifier les informations du circuit</button>
            </form>
        </div>
    </div>
@endsection
