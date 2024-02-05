@extends('layout')
@section('title')
    <h1 class="text-4xl font-bold text-center">Fiche pilote - <span class="text-primary">{{ $user->firstname }}
            {{ $user->lastname }}</span></h1>
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endpush
@section('content')
    <div class="flex flex-col border rounded border-primary">
        <span> {{ 'Prénom: ' . $user->firstname }}</span>
        <span>{{ 'Nom: ' . $user->lastname }}</span>
        @foreach ($trainingsHistory as $trainingHistory)
            <span>{{ 'Date: ' . $trainingHistory->date }}</span>
            <span>{{ 'Heure: ' . $trainingHistory->hour }}</span>
            <span>{{ 'Circuit: ' . $trainingHistory->circuit->name }}</span>
        @endforeach
    </div>


    {{ 'Id club: ' . $user->id_club }}
    {{ 'Id licence: ' . $user->id_license }}
    {{ 'Région: ' . $user->region }}
    {{ 'Ville: ' . $user->city }}
    {{ 'Code postal: ' . $user->postal_code }}
    {{ 'Email: ' . $user->email }}
    {{ 'Date: ' . $user->birth_date }}
    @if (session('message'))
        {{ session('message') }}
        <script>
            Toastify({
                text: {!! json_encode(session('message')) !!},
                duration: 3000,
                gravity: "top",
                position: "right",
                offset: {
                    x: 20,
                    y: '80vh'
                },
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {}
            }).showToast();
        </script>
    @endif
@endsection
