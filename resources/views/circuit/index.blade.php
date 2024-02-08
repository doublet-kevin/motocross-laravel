@extends('layout')
@section('title')
    <h1 class="pb-4 text-4xl font-bold text-center">Découvrez notre circuit <span class="text-primary">Aventure MX Park</span>
    </h1>
@endsection
@section('content')
    <div class="flex flex-col gap-4">
        @foreach ($circuits as $circuit)
            <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                <img src="{{ Vite::asset('resources/images/circuit-1.jpg') }}" alt="Aventure MX Park picture"
                    class="object-cover rounded-md col-span-2 lg:col-span-1 h-[150px] w-full lg:h-full">
                <div class="flex flex-col w-full col-span-2 gap-4 text-xl text-center rounded-md md:text-start">
                    <p class="text-xl">
                        <span class="font-bold">Aventure MX Park</span> est un circuit de motocross offrant une expérience
                        palpitante pour les amateurs de
                        motocross de tous niveaux. Niché au cœur d'un paysage naturel spectaculaire, ce circuit offre des
                        pistes
                        diversifiées et stimulantes, adaptées aux débutants tout comme aux pilotes chevronnés.
                    </p>
                    <p>
                        Les caractéristiques du circuit incluent des virages serrés, des sauts impressionnants, des sections
                        techniques et des lignes droites pour permettre aux pilotes de tester leurs compétences et de vivre
                        l'excitation du motocross.
                        Les installations comprennent également des stands bien équipés, une zone de
                        détente, et une équipe dévouée assurant la sécurité et le plaisir de tous les participants.
                    <p>
                        Aventure MX Park s'engage à fournir une atmosphère conviviale, propice à la passion du motocross, où
                        les
                        amateurs peuvent se réunir pour partager leur amour de ce sport extrême. Que vous soyez un débutant
                        cherchant à améliorer vos compétences ou un pilote chevronné à la recherche de sensations fortes,
                        Aventure MX Park offre une aventure motocross inoubliable.
                    </p>
                </div>
            </div>
        @endforeach

        <div class="flex justify-center">{{ $circuits->links('components.navigation.pagination') }}</div>
    </div>
@endsection
