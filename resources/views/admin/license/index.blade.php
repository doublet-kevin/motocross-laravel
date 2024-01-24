@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4">
        @foreach ($licenses as $license)
            <div class="grid grid-cols-2 gap-4 min-w-7xl">
                <div class="flex gap-2">
                    <x-admin.board.actions route="{{ route('license.destroy', $license->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash" />

                    <x-admin.board.actions route="{{ route('license.edit', $license->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />
                </div>
                <div>{{ $license->license_number }}</div>
            </div>
        @endforeach
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un license</button>
    </div>
@endsection
