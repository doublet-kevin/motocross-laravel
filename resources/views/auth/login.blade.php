@extends('layout')

@section('content')
    <div
        class="flex justify-center w-full max-w-4xl m-auto rounded-md shadow-2xl md:border-2 border-primary backdrop-blur-lg">
        <div class="flex flex-grow p-8">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col justify-between flex-grow flew-grow">
                @csrf
                <h2 class="text-4xl font-bold text-accent">Connectez-vous</h2>
                <div class="flex flex-col">
                    <x-form.input-group type="email" name="email" placeholder="Adresse mail" value="{{ old('firstname') }}"
                        required />
                    <x-form.input-group type="password" name="password" placeholder="Mot de passe" required />
                </div>
                <div class="justify-between gap-4 lg:flex">
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <button type="submit" class=" button h-min">Connexion</button>
                        <a href="" class=" button-inactive h-min">Mot de passe oublié ?</a>
                    </div>
                    <a href="{{ route('register') }}" class="mt-4 button lg:mt-0 h-min">Pas encore inscrit ?</a>
                </div>

            </form>
        </div>
        <img class="hidden md:flex w-[280px] h-[400px] shadow-2xl object-cover"
            src="{{ Vite::asset('resources/images/moto-header-4.jpg') }}" alt="Image 4">
    </div>
@endsection
