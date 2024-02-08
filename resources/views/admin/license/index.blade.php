@extends('admin.layout')

@section('content')
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th scope="col" class="py-2">Actions</th>
                    <th scope="col" class="text-start pl-2 py-2">Numéro de license</th>
                    <th scope="col" class="text-start pl-2 py-2">Pilote</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($licenses as $license)
                    <tr>
                        <td scope="row" class="w-24">
                            <div class="flex items-center justify-center gap-2">
                                <x-admin.board.actions route="{{ route('user.destroy', $license->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash"
                                    method="DELETE" />

                                <x-admin.board.actions route="{{ route('user.edit', $license->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />
                            </div>
                        </td>
                        <td>
                            {{ $license->license_number }}
                        </td>
                        <td>
                            @if ($license->user_id)
                                {{ $license }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button onclick="window.location.href='{{ route('user.create') }}'"
        class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un licence</button>
@endsection
