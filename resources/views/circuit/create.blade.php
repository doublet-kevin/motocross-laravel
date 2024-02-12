@extends('layout')
@section('title')
    <div class="w-full">
        <button onclick="window.location.href='{{ route('circuit.board') }}'"
            class="flex  col-span-3 button whitespace-nowrap mb-4">Revenir au Dashboard</button>
    </div>
@endsection
@section('content')
    <div class="flex w-full max-w-5xl m-auto border rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('circuit.store') }}" method="POST" class="flex flex-col flex-grow gap-4">
                @csrf
                <h2 class="text-4xl font-bold text-accent">Ajout d'un nouveau circuit</h2>
                <x-form.input-group type="text" name="name" placeholder="Nom du circuit" required />
                <label for="description" class="font-bold">Description</label>
                <textarea name="description" id="" cols="30" rows="5"></textarea>

                <button type="submit" class="button">Créer le circuit</button>
            </form>
        </div>
    </div>
@endsection
