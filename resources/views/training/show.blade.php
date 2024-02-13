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
    <div class="flex flex-col gap-4 w-full">
        <h1 class="text-4xl font-bold text-center">Liste des <span class="text-primary">pilotes</span></h1>
    </div>
@endsection
@section('content')
    <div class="flex flex-col justify-center items-center max-w-4xl py-2 m-auto">
        <div class="flex-col gap-2 justify-between pb-4 w-full">
            <div class="flex gap-2 items-end justify-center">
                <h2 class="text-lg font-bold">Partager sur </h2>
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
            @auth
                @if (Auth::user()->isAdmin())
                    <div class=" flex flex-col justify-center items-center h-full mt-4">
                        <h2 class="text-1xl font-bold text-center">Télécharger la liste des
                            pilotes</h2>
                        <div class="flex gap-4">
                            <button class="button backdrop-blur-lg mt-3.5"> <a
                                    href="{{ route('dlPilotsPDF.pilots', ['id' => $training]) }}"
                                    class="btn btn-primary">Format
                                    PDF</a></button>
                            <button class="button backdrop-blur-lg mt-3.5"> <a
                                    href="{{ route('dlPilotsCSV.pilots', ['id' => $training]) }}"
                                    class="btn btn-primary">Format
                                    CSV</a></button>
                        </div>
                    </div>
                @endif
            @endauth

        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ($participants as $participant)
                <a href="{{ route('user.show', $participant->id) }}"
                    class="button-inactive backdrop-blur-lg w-[120px] h-[60px]">
                    {{ $participant->firstname }} {{ $participant->lastname }}
                </a>
            @endforeach
            @for ($i = 1; $i <= 75 - $participants->count(); $i++)
                <div class="p-1 text-center border rounded-lg border-green-300 backdrop-blur-lg w-[120px] h-[60px]">
                    Place disponible
                </div>
            @endfor
        </div>
    </div>
@endsection
