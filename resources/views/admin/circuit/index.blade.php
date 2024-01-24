@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4">
        @foreach ($circuits as $circuit)
            <div class="grid grid-cols-2 gap-4 min-w-7xl">
                <div class="flex gap-2">
                    <x-admin.board.actions route="{{ route('circuit.destroy', $circuit->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash" />

                    <x-admin.board.actions route="{{ route('circuit.edit', $circuit->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                    <x-admin.board.actions route="{{ route('circuit.show', $circuit->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                </div>
                <div>{{ $circuit->name }}</div>
            </div>
        @endforeach
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un circuit</button>
    </div>
@endsection
