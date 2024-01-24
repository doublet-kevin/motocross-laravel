@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4">
        @foreach ($trainings as $training)
            <div class="grid grid-cols-5 gap-4 min-w-7xl">
                <div class="flex gap-2">
                    <x-admin.board.actions route="{{ route('training.destroy', $training->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash" />

                    <x-admin.board.actions route="{{ route('training.edit', $training->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                    <x-admin.board.actions route="{{ route('training.show', $training->id) }}"
                        icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                </div>
                <div>{{ $training->date }}</div>
                <div>{{ $training->circuit->name }}</div>
                <div>{{ $training->type }}</div>
                <div>{{ $training->number_of_places }}</div>
            </div>
        @endforeach
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un entraînement</button>
    </div>
@endsection
