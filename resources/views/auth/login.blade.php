@extends('layout')

@section('content')
    <div class="flex w-full max-w-4xl border-2 rounded-md shadow-2xl border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col justify-between flex-grow flew-grow">
                @csrf
                <h2 class="text-4xl font-bold text-accent">Connectez-vous</h2>
                <div class="flex flex-col gap-4 my-4">
                    <input type="email" name="email" id="email" required placeholder="Adresse mail">
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required />
                </div>
                <div class="justify-between gap-4 lg:flex">
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <button type="submit" class="!block button">Connexion</button>
                        <a href="" class="!block button-inactive">Mot de passe oublié ?</a>
                    </div>
                    <a href="/" class="!block button mt-4 lg:mt-0">Pas encore inscrit ?</a>
                </div>

            </form>
        </div>
        <img class="hidden md:flex w-[280px] h-[400px] shadow-2xl object-cover"
            src="{{ Vite::asset('resources/images/moto-header-4.jpg') }}" alt="Image 4">
    </div>
@endsection
