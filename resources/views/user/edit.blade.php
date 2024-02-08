@extends('layout')

@section('content')
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')

        <x-form.input-group type="text" name="firstname" placeholder="Prénom" value="{{ $user->firstname }}" />

        <x-form.input-group type="email" name="email" placeholder="Email" value="{{ $user->email }}" disabled />

        <x-form.input-group type="text" name="license_id" placeholder="Numéro de licence"
            value="{{ $user->license_number }}" />

        <select name="region" id="region">
            <option value="">Veuillez choisir votre région</option>
            @foreach ($regions as $region)
                <option value="{{ $region['nom'] }}" {{ $user->region == $region['nom'] ? 'selected' : '' }}>
                    {{ $region['nom'] }}</option>
            @endforeach
        </select>

        <x-form.input-group type="text" name="city" placeholder="Ville" value="{{ $user->city }}" />
        <x-form.input-group type="text" name="postal_code" placeholder="Code postal" value="{{ $user->postal_code }}" />

        <x-form.input-group type="email" name="email" placeholder="Email" value="{{ $user->email }}" disabled />

        <x-form.input-group type="date" name="birthdate" value="{{ $user->birth_date }}" />

        <input id="birthdate" name="birthdate" type="date" value="{{ $user->birthdate }}">

        <input type="password" id="password" name="password" placeholder="Mot de passe">

        <input type="submit" value="Modifier">
    @endsection
