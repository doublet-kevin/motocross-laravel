@extends('layout')

@section('content')
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <select name="id_club" id="id_club">
            <option value="">Veuillez choisir votre club</option>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}" {{ $user->id_club == $club->id ? 'selected' : '' }}>{{ $club->name }}
                </option>
            @endforeach
        </select>

        <input type="text" id="firstname" name="firstname" placeholder="Prénom" value="{{ $user->firstname }}">

        <input type="text" id="lastname" name="lastname" placeholder="Nom" value="{{ $user->lastname }}">

        <input type="text" id="id_license" name="id_license" placeholder="Id licence" value="{{ $user->id_license }}">

        <select name="region" id="region">
            <option value="">Veuillez choisir votre région</option>
            @foreach ($regions as $region)
                <option value="{{ $region['nom'] }}" {{ $user->region == $region['nom'] ? 'selected' : '' }}>
                    {{ $region['nom'] }}</option>
            @endforeach
        </select>

        <input type="text" id="city" name="city" placeholder="Ville" value="{{ $user->city }}">

        <input type="text" id="postal_code" name="postal_code" placeholder="Code postal"
            value="{{ $user->postal_code }}">

        <input type="email" id="email" name="email" placeholder="Email" value="{{ $user->email }}">

        <input id="birthdate" name="birthdate" type="date" value="{{ $user->birthdate }}">

        <input type="password" id="password" name="password" placeholder="Mot de passe">

        <input type="submit" value="Modifier">
    @endsection
