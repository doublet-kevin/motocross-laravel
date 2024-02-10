@extends('layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endpush
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
