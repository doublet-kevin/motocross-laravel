@extends('layout')

@section('content')
    <div class="flex flex-col gap-4 max-w-5xl">
        @foreach ($users as $user)
            <div class="grid  grid-cols-2 sm:grid-cols-4 md:grid-cols-9 gap-4">
                <div class="flex gap-2">
                    <form action="{{ route('user.destroy', $user->id) }}" method="post" class="shrink-0 w-[24px] h-[24px]">
                        @csrf
                        @method('DELETE')
                        <button type="submit" />
                        <img src="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Delete icon">
                        </button>
                    </form>

                    <button onclick="window.location.href='{{ route('user.edit', $user->id) }}'"
                        class="shrink-0 w-[24px] h-[24px]">
                        <img src="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit icon">
                    </button>

                    <button onclick="window.location.href='{{ route('user.show', $user->id) }}'"
                        class="shrink-0 w-[24px] h-[24px]">
                        <img src="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show icon">
                    </button>
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
