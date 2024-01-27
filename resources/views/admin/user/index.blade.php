@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4 mx-4 lg:mx-0">
        <div
            class="grid grid-cols-3 border rounded-lg divide-primary sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-10 border-primary">
            <div class="flex justify-center border-r rounded-tl-lg col-title">
                <p>Actions</p>
            </div>
            <div class="hidden border-r sm:flex col-title">
                <p>Nom</p>
            </div>
            <div class="hidden border-r sm:flex col-title">
                <p>Prénom</p>
            </div>
            <div class="col-span-2 border-r rounded-tr-lg md:rounded-tr-none col-title">
                <p>
                    Adresse mail
                </p>
            </div>
            <div class="hidden lg:border-r md:flex col-title md:rounded-tr-lg lg:rounded-tr-none">
                <p>License</p>
            </div>
            <div class="hidden border-r lg:flex col-title">
                <p>
                    Date de naissance
                </p>
            </div>
            <div class="hidden lg:flex lg:border-r col-title">
                <p>Région</p>
            </div>
            <div class="hidden border-r lg:flex col-title">
                <p>Ville</p>
            </div>
            <div class="hidden lg:flex lg:rounded-tr-lg col-title">
                <p>
                    Code postal
                </p>
            </div>
            @foreach ($users as $user)
                <div class="flex items-center justify-center gap-2 py-2 border-r">
                    <x-admin.board.actions route="{{ route('user.destroy', $user->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash" />

                    <x-admin.board.actions route="{{ route('user.edit', $user->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                    <x-admin.board.actions route="{{ route('user.show', $user->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                </div>

                <span class="hidden border-r sm:flex col-content">{{ $user->firstname }}</span>
                <span class="hidden border-r sm:flex col-content">{{ $user->lastname }}</span>
                <span class="flex col-span-2 md:border-r col-content">{{ $user->email }}</span>
                <span class="hidden lg:border-r md:flex col-content">{{ $user->license_number }}</span>
                <span class="hidden border-r lg:flex col-content">{{ $user->birth_date }}</span>
                <span class="hidden border-r lg:flex col-content">{{ $user->region }}</span>
                <span class="hidden p-2 border-r lg:flex col-content">{{ $user->city }}</span>
                <span class="hidden lg:flex col-content">{{ $user->postal_code }}</span>
            @endforeach
        </div>
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un utilisateur</button>
    </div>
@endsection
