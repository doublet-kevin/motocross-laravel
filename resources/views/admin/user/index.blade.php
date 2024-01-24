@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4 mx-4 lg:mx-0">
        <div class="grid grid-cols-2 md:grid-cols-6 lg:grid-cols-9">
            <span class="text-center">Actions</span>
            <span class="hidden sm:flex">Nom</span>
            <span class="hidden sm:flex">Prénom</span>
            <span>Adresse mail</span>
            <span class="hidden md:flex">Numéro de license</span>
            <span class="hidden lg:flex">Date de naissance</span>
            <span class="hidden md:flex">Région</span>
            <span class="hidden lg:flex">Ville</span>
            <span class="hidden lg:flex">Code postal</span>
            @foreach ($users as $user)
                <div class="flex justify-center gap-2 py-2">
                    <x-admin.board.actions route="{{ route('user.destroy', $user->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash" />

                    <x-admin.board.actions route="{{ route('user.edit', $user->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                    <x-admin.board.actions route="{{ route('user.show', $user->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                </div>

                <span class="hidden sm:flex">{{ $user->firstname }}</span>
                <span class="hidden sm:flex">{{ $user->lastname }}</span>
                <span>{{ $user->email }}</span>
                <span class="hidden md:flex">{{ $user->license_number }}</span>
                <span class="hidden lg:flex">{{ $user->birth_date }}</span>
                <span class="hidden md:flex">{{ $user->region }}</span>
                <span class="hidden lg:flex">{{ $user->city }}</span>
                <span class="hidden lg:flex">{{ $user->postal_code }}</span>
            @endforeach
        </div>
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un utilisateur</button>
    </div>
@endsection
