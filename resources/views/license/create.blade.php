@extends('layout')
@section('title')
    <div>
        <button onclick="window.location.href='{{ route('license.board') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Revenir au tableau de bord des
            licences</button>
    </div>
    <h1>
        Créer une nouvelle licence
    </h1>
@endsection
@section('content')
    <form action="{{ route('license.store') }}" method="post">
        @csrf
        <input type="text" name="user_id" id="user_id" placeholder="Id utilisateur">

        <input type="text" name="license_number" id="license_number" placeholder="Numéro de licence">

        <button type="submit" class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter la nouvelle
            licence</button>
    @endsection
