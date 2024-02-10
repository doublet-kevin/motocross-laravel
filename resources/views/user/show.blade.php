@extends('layout')
@section('title')
    <div class="flex gap-4 pb-4">
        <h1 class="text-4xl font-bold text-center">Fiche pilote - <span class="text-primary">{{ $user->firstname }}
                {{ $user->lastname }}</span></h1>
        @auth
            @if (Auth::id() === $user->id)
                <a href="{{ route('user.edit', Auth::id()) }}" class="button-inactive">Modifier mes informations personnel</a>
            @endauth
        @endauth
</div>
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endpush
@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endpush
@section('content')
<div>
    <h2 class="text-3xl font-bold">Entraînement effectuer</h2>
</div>
<div>
    <h2 class="text-3xl font-bold">Entraînement à venir</h2>
</div>
@if (session('message'))
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
