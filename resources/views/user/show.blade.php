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
    <div class="flex flex-col items-center gap-2">
        <div class="flex flex-col w-full overflow-x-scroll gap-">

            <div class="flex flex-col justify-center gap-4">
                <div class="flex flex-col gap-2">
                    <h2 class="pb-2 text-2xl font-bold underline text-primary">Entraînement effectuer</h2>
                    <div class="flex w-[350px] md:w-full gap-4">
                        @foreach ($endedTrainings as $registration)
                            @if ($registration->date < date('Y-m-d'))
                                <x-training.training-card :training="$registration"
                                    circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}" />
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="pb-2 text-2xl font-bold underline text-primary">Entraînement à venir</h2>
                    <div class="flex w-[350px] md:w-full gap-4">
                        @foreach ($nextTrainings as $registration)
                            @if ($registration->date > date('Y-m-d'))
                                <x-training.training-card :training="$registration"
                                    circuitImg="{{ Vite::asset('resources/images/circuit-1.jpg') }}" adult />
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
