@extends('layout')

@section('content')
    <div class="flex w-full max-w-5xl border rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('register') }}" method="POST" class="flex flex-col flex-grow gap-4">
                @csrf
                <h2 class="text-4xl font-bold text-accent">Inscription</h2>
                <div class="grid grid-cols-2 gap-x-8">
                    <div class="col-span-2 md:col-span-1">
                        <x-form.input-group type="text" name="firstname" placeholder="Prénom"
                            value="{{ old('firstname') }}" required />
                        <x-form.input-group type="text" name="lastname" placeholder="Nom" value="{{ old('lastname') }}"
                            required />
                        <x-form.input-group type="date" name="birth_date" placeholder="Date de naissance"
                            value="{{ old('birth_date') }}" required />
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <x-form.input-group type="email" name="email" placeholder="Adresse mail"
                            value="{{ old('email') }}" required />
                        <x-form.input-group type="password" name="password" placeholder="Mot de passe" required />
                        <x-form.input-group type="password" name="password_confirmation"
                            placeholder="Confirmer le mot de passe" required />
                    </div>
                    <div class="col-span-2">
                        <x-form.input-group type="text" name="region" placeholder="Région" value="{{ old('region') }}"
                            required />
                    </div>
                    <x-form.input-group type="text" name="city" placeholder="Ville" value="{{ old('city') }}"
                        required />
                    <x-form.input-group type="text" name="postal_code" placeholder="Code postal"
                        value="{{ old('postal_code') }}" required />
                    <div class="col-span-2">
                        <x-form.input-group type="text" name="license_number" placeholder="Numéro de licence"
                            value="{{ old('license_number') }}" />
                    </div>
                    <div class="flex flex-col">
                        @foreach ($errors->all() as $error)
                            <span class="py-2 text-red-500">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="justify-between gap-4 lg:flex">
                    <div class="flex flex-col items-center gap-4 lg:flex-row">
                        <button type="submit" class="button">Inscription</button>
                        <span>(*) Champs requis</span>
                    </div>
                    <a href="{{ route('login') }}" class="mt-4 button lg:mt-0">Déja inscrit ?
                        Connectez-vous</a>
                </div>

            </form>
        </div>
        <img class="hidden md:flex w-[280px] shadow-2xl object-cover"
            src="{{ Vite::asset('resources/images/moto-header-2.jpg') }}" alt="Image 4">
    </div>
@endsection
