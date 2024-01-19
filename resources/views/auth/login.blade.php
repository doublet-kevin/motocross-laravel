@extends('layout')

@section('content')
    @if ($errors)
        {{ $errors }}
    @endif
    <div class="flex justify-around max-w-xl m-auto border rounded-sm">
        <div class="flex flex-col justify-between gap-4 p-8 max-w-80 ">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col justify-between flex-grow">
                @csrf
                <h2>Connectez-vous</h2>
                <div class="flex flex-col gap-2">
                    <input type="email" name="email" id="email" required placeholder="Adresse mail"
                        class="bg-transparent border rounded text-sm px-1.5 py-1" />
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required
                        class="bg-transparent border rounded text-sm px-1.5 py-1" />
                </div>
                <div>
                    <button type="submit">Connexion</button>
                </div>

            </form>
        </div>
    </div>
@endsection
