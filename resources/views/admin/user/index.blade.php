@extends('admin.layout')
@section('content')
    <div class="flex flex-col gap-4 mx-4 lg:mx-0">
        <div class="relative overflow-x-auto border rounded-lg border-primary">
            <table class="w-full text-sm truncate">
                <thead class="text-gray-700 uppercase bg-secondary">
                    <tr>
                        <th scope="col" class="px-6 py-3">Actions</th>
                        <th scope="col" class="px-6 py-3">Adresse mail</th>
                        <th scope="col" class="hidden px-6 py-3 sm:table-cell">Nom</th>
                        <th scope="col" class="hidden px-6 py-3 sm:table-cell">Prénom</th>
                        <th scope="col" class="hidden px-6 py-3 md:table-cell">Licence</th>
                        <th scope="col" class="hidden px-6 py-3 md:table-cell">Date de naissance</th>
                        <th scope="col" class="hidden px-6 py-3 lg:table-cell">Région</th>
                        <th scope="col" class="hidden px-6 py-3 lg:table-cell">Ville</th>
                        <th scope="col" class="hidden px-6 py-3 xl:table-cell">Code postal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b last:border-b-0 border-primary odd:bg-transparent">
                            <th scope="row" class="px-6 py-4 font-medium border-r border-primary whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <x-admin.board.actions route="{{ route('user.destroy', $user->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash" />

                                    <x-admin.board.actions route="{{ route('user.edit', $user->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                                    <x-admin.board.actions route="{{ route('user.show', $user->id) }}"
                                        icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="hidden px-6 py-4 sm:table-cell">
                                {{ $user->firstname }}
                            </td>
                            <td class="hidden px-6 py-4 sm:table-cell">
                                {{ $user->lastname }}
                            </td>
                            <td class="hidden px-6 py-4 md:table-cell">
                                {{ $user->license_number }}
                            </td>
                            <td class="hidden px-6 py-4 md:table-cell">
                                {{ $user->birth_date }}
                            </td>
                            <td class="hidden px-6 py-4 lg:table-cell">
                                {{ $user->region }}
                            </td>
                            <td class="hidden px-6 py-4 lg:table-cell">
                                {{ $user->city }}
                            </td>
                            <td class="hidden px-6 py-4 xl:table-cell">
                                {{ $user->postal_code }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button onclick="window.location.href='{{ route('user.create') }}'"
            class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un utilisateur</button>
    </div>
@endsection
