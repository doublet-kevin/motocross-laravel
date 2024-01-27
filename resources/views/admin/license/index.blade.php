@extends('admin.layout')

@section('content')
    <div class="flex flex-col gap-4 mx-4 lg:mx-0 backdrop-blur-lg">
        <div class="relative overflow-x-auto border rounded-lg border-primary">
            <table class="w-full text-sm truncate">
                <thead class="uppercase bg-secondary">
                    <tr>
                        <th scope="col" class="px-6 py-3">Actions</th>
                        <th scope="col" class="px-6 py-3">Numéro de license</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($licenses as $license)
                        <tr class="border-b last:border-b-0 border-primary">
                            <th scope="row" class="px-6 py-4 font-medium border-r border-primary whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <x-admin.board.actions route="{{ route('user.destroy', $license->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash"
                                        method="DELETE" />

                                    <x-admin.board.actions route="{{ route('user.edit', $license->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $license->license_number }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un licence</button>
    </div>
@endsection
