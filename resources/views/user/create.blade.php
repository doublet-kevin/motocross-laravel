@extends('layout')
@section('title')
    <div>
        <button onclick="window.location.href='{{ route('admin.user.board') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Revenir au tableau de bord des
            utilisateurs</button>
    </div>
    <h1>
        Créer un nouvel utilisateur
    </h1>
@endsection
@section('content')
    {{ $errors }}
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <input type="text" id="firstname" name="firstname" placeholder="Prénom">

        <input type="text" id="lastname" name="lastname" placeholder="Nom">

        <input type="text" id="license_number" name="license_number" placeholder="N° de licence">

        <select name="region" id="region">
            <option value="">Veuillez choisir votre région</option>
            @foreach ($regions as $region)
                <option value="{{ $region['nom'] }}">{{ $region['nom'] }}</option>
            @endforeach
        </select>

        <input type="text" id="city" name="city" placeholder="Ville">

        <input type="text" id="postal_code" name="postal_code" placeholder="Code postal">

        <input type="email" id="email" name="email" placeholder="Email">

        <input id="birth_date" name="birth_date" type="date">

        <input type="password" id="password" name="password" placeholder="Mot de passe">

        <button type="submit" class="flex justify-center col-span-3 button whitespace-nowrap">Créer le nouvel
            utilisateur</button>
    @endsection
