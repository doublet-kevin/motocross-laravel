@extends('admin.layout')

@section('content')
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th scope="col" class="py-2">Actions</th>
                    <th scope="col" class="text-start pl-2 py-2">Nom du circuit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($circuits as $circuit)
                    <tr>
                        <td scope="row" class="w-24">
                            <div class="flex items-center justify-center gap-2">
                                <x-admin.board.actions route="{{ route('admin.circuit.destroy', $circuit->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash"
                                    method="DELETE" />

                                <x-admin.board.actions route="{{ route('admin.circuit.edit', $circuit->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                                <x-admin.board.actions route="{{ route('circuit.show', $circuit->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                            </div>
                        </td>
                        <td>
                            {{ $circuit->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button onclick="window.location.href='{{ route('user.create') }}'"
        class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un circuit</button>
@endsection
