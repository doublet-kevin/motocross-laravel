@push('meta')
    <!-- Balises Open Graph pour Facebook et LinkedIn -->
    <meta property="og:url" content="{{ url()->route('training.show', ['training' => $training->id]) }}" />
    <meta property="og:image" content="{{ Vite::asset('resources/images/circuit-1.jpg') }}" />
    <meta property="og:title" content="Réservation d'entraînement de motocross" />

    <!-- Balises Twitter Cards pour Twitter -->
    <meta name="twitter:image" content="{{ Vite::asset('resources/images/circuit-1.jpg') }}">
    <meta name="twitter:url" content="{{ url()->route('training.show', ['training' => $training->id]) }}" />
    <meta name="twitter:title" content="Réservation d'entraînement de motocross" />
@endpush

@extends('layout')
@section('title')
    <div class="flex flex-col items-center gap-4 m-auto">
        <h1 class="text-4xl font-bold text-center">Liste des <span class="text-primary">pilotes</span></h1>
        <div class="flex gap-2">
            <h2>Partager sur </h2>
            <x-social.icon
                url="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->route('training.show', ['training' => $training->id])) }}"
                src="{{ Vite::asset('resources/images/icons/facebook.svg') }}" />
            <x-social.icon
                url="https://twitter.com/intent/tweet?url={{ urlencode(url()->route('training.show', ['training' => $training->id])) }}"
                src="{{ Vite::asset('resources/images/icons/twitter.svg') }}" />
            <x-social.icon
                url="https://www.linkedin.com/shareArticle?url={{ urlencode(url()->route('training.show', ['training' => $training->id])) }}"
                src="{{ Vite::asset('resources/images/icons/instagram.svg') }}" />
        </div>
    </div>
    <h1 class="text-4xl font-bold text-center">Liste des <span class="text-primary">pilotes</span></h1>
    <div class="border border border-primary p-4 flex flex-col justify-center items-center h-full mt-4">
        <h2 class="text-1xl font-bold text-center">Télécharger la liste des <span class="text-primary">pilotes</span></h2>
        <button class="button-inactive backdrop-blur-lg mt-3.5"> <a
                href="{{ route('dlPilotsPDF.pilots', ['id' => $training]) }}" class="btn btn-primary">Format PDF</a></button>
        <button class="button-inactive backdrop-blur-lg mt-3.5"> <a
                href="{{ route('dlPilotsCSV.pilots', ['id' => $training]) }}" class="btn btn-primary">Format CSV</a></button>
    </div>
@endsection
@section('content')
    <div class="max-w-4xl py-8 m-auto">
        <div class="grid grid-cols-8 gap-4">
            @foreach ($participants as $participant)
                <a href="{{ route('user.show', $participant->id) }}" class="button-inactive backdrop-blur-lg">
                    {{ $participant->firstname }} {{ $participant->lastname }}
                </a>
            @endforeach
            @for ($i = 1; $i <= 75 - $participants->count(); $i++)
                <div class="p-1 text-center border rounded-lg border-primary backdrop-blur-lg">
                    Place disponible
                </div>
            @endfor
        </div>
    </div>
@endsection
