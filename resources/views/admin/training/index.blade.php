@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4 mx-4 lg:mx-0">
        <div class="relative overflow-x-auto border rounded-lg border-primary">
            <table class="w-full text-sm truncate">
                <thead class="uppercase bg-secondary">
                    <tr>
                        <th scope="col" class="px-6 py-3">Actions</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Circuit</th>
                        <th scope="col" class="hidden px-6 py-3 sm:table-cell">Type</th>
                        <th scope="col" class="hidden px-6 py-3 md:table-cell">Places disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainings as $training)
                        <tr class="border-b last:border-b-0 border-primary">
                            <th scope="row" class="px-6 py-4 font-medium border-r border-primary whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <x-admin.board.actions route="{{ route('user.destroy', $training->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash" />

                                    <x-admin.board.actions route="{{ route('user.edit', $training->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                                    <x-admin.board.actions route="{{ route('user.show', $training->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $training->date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $training->circuit->name }}
                            </td>
                            <td class="hidden px-6 py-4 sm:table-cell">
                                {{ $training->type }}
                            </td>
                            <td class="hidden px-6 py-4 md:table-cell">
                                {{ $training->number_of_places }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un entraînement</button>
    </div>
@endsection
