@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4">
        @foreach ($users as $user)
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 md:grid-cols-9">
                <div class="flex gap-2">
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
                <span class="hidden md:flex">{{ $user->city }}</span>
                <span class="hidden md:flex">{{ $user->postal_code }}</span>

            </div>
        @endforeach
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un utilisateur</button>
    </div>
@endsection
