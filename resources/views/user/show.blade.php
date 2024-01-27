@extends('layout')

@section('content')
    {{ 'Prénom: ' . $user->firstname }}
    {{ 'Nom: ' . $user->lastname }}
    {{ 'Id club: ' . $user->id_club }}
    {{ 'Id licence: ' . $user->id_license }}
    {{ 'Région: ' . $user->region }}
    {{ 'Ville: ' . $user->city }}
    {{ 'Code postal: ' . $user->postal_code }}
    {{ 'Email: ' . $user->email }}
    {{ 'Date: ' . $user->birth_date }}
@endsection
