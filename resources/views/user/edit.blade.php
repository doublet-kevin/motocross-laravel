@extends('layout')
@section('content')
    <div class="flex w-full max-w-5xl m-auto border rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('user.update', $user->id) }}" method="post" class="flex flex-col flex-grow gap-4">
                @csrf
                @method('PUT')
                <h2 class="text-4xl font-bold text-accent">Modification du profil</h2>
                <div class="grid grid-cols-2 gap-x-8">
                    <x-form.input-group type="text" name="firstname" placeholder="Prénom" value="{{ $user->firstname }}"
                        :errors="$errors->firstname" />
                    <x-form.input-group type="text" name="lastname" placeholder="Nom" value="{{ $user->lastname }}" />

                    <div class="flex flex-col gap-2 mt-2 whitespace-nowrap">
                        <label for="region" class="font-bold">Région</label>
                        <select name="region" id="region">
                            <option value="" disabled>Choisissez votre région</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region['nom'] }}"
                                    {{ $user->region == $region['nom'] ? 'selected' : '' }}>
                                    {{ $region['nom'] }} </option>
                            @endforeach
                        </select>
                    </div>

                    <x-form.input-group type="text" name="city" placeholder="Ville" value="{{ $user->city }}" />
                    <x-form.input-group type="text" name="postal_code" placeholder="Code postal"
                        value="{{ $user->postal_code }}" />
                    <x-form.input-group type="date" name="birth_date" value="{{ $user->birth_date }}"
                        placeholder="Date de naissance" />

                    <div class="col-span-2">
                        <x-form.input-group type="email" name="email" placeholder="Email" value="{{ $user->email }}" />
                    </div>
                    <div class="col-span-2">
                        <x-form.input-group type="text" name="license_number" placeholder="Numéro de licence"
                            value="{{ $user->license_number }}" />
                    </div>


                </div>
                <button class="button-inactive">Modifier le mot de passe</button>

                <button type="submit" class="button">Mettre à jour le profil</button>
            </form>
        </div>
    </div>
@endsection
