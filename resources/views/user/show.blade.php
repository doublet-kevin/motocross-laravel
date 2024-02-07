@extends('layout')

@section('content')
    {{ 'Prénom: ' . $user->firstname }}
    {{ 'Nom: ' . $user->lastname }}
    {{ 'Id club: ' . $user->club_id }}
    {{ 'Id licence: ' . $user->license_id }}
    {{ 'Région: ' . $user->region }}
    {{ 'Ville: ' . $user->city }}
    {{ 'Code postal: ' . $user->postal_code }}
    {{ 'Email: ' . $user->email }}
    {{ 'Date: ' . $user->birth_date }}
@endsection
