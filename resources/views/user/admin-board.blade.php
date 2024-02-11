@extends('board-layout')
@section('dashboard-content')
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th scope="col" class="py-2">Actions</th>
                    <th scope="col" class="py-2 pl-2 text-start">Adresse mail</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start sm:table-cell">Nom</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start sm:table-cell">Prénom</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start md:table-cell">Licence</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start md:table-cell">Statut</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start md:table-cell">Date de naissance</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start lg:table-cell">Région</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start lg:table-cell">Ville</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start xl:table-cell">Code postal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row" class="w-24">
                            <div class="flex items-center justify-center gap-2">
                                <x-admin.board.actions route="{{ route('user.destroy', $user->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash"
                                    method="DELETE" />

                                <x-admin.board.actions route="{{ route('user.edit', $user->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                                <x-admin.board.actions route="{{ route('user.show', $user->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                            </div>
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td class="hidden sm:table-cell">
                            {{ $user->lastname }}
                        </td>
                        <td class="hidden sm:table-cell">
                            {{ $user->firstname }}
                        </td>
                        <td class="hidden md:table-cell">
                            @if ($user->license)
                                {{ $user->license_number }}
                            @else
                                Aucune licence
                            @endif
                        </td>
                        <td class="hidden md:table-cell">
                            @php
                                $birth_date = \Carbon\Carbon::parse($user->birth_date);
                                $age = $birth_date->age;
                            @endphp
                            {{ $age < 18 ? 'Jeune pilote' : 'Pilote senior' }}
                        </td>
                        <td class="hidden md:table-cell">
                            {{ $birth_date->format('d/m/Y') }}
                        </td>
                        <td class="hidden lg:table-cell">
                            {{ $user->region }}
                        </td>
                        <td class="hidden lg:table-cell">
                            {{ $user->city }}
                        </td>
                        <td class="hidden xl:table-cell">
                            {{ $user->postal_code }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('message'))
            <script>
                Toastify({
                    text: {!! json_encode(session('message')) !!},
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    offset: {
                        x: 20,
                        y: '80vh'
                    },
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    onClick: function() {}
                }).showToast();
            </script>
        @endif
    </div>
    <div class="flex flex-col-reverse items-center justify-center gap-4 sm:flex-row whitespace-nowrap">
        <div>{{ $users->links('_components.navigation.pagination') }}</div>
    </div>
@endsection
