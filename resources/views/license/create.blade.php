@extends('layout')
@section('title')
    <div class="w-full">
        <button onclick="window.location.href='{{ route('license.board') }}'"
            class="flex  col-span-3 button whitespace-nowrap mb-4">Revenir au Dashboard</button>
    </div>
@endsection
@section('content')
    <div class="flex w-full max-w-5xl m-auto border rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('license.store') }}" method="post" class="flex flex-col flex-grow gap-4">
                @csrf
                <h2 class="text-4xl font-bold text-accent">Ajout d'une nouvelle licence</h2>
                <x-form.input-group type="text" name="license_number" placeholder="Numéro de licence" :errors="$errors->name" />
                <x-form.input-group type="mail" name="associate_email" placeholder="Mail associé" :errors="$errors->name" />
                <button type="submit" class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter la
                    licence</button>
            </form>
        </div>
    </div>
@endsection
