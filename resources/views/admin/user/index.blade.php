@extends('layout')

@section('content')
    <!--
                                                                                                                                    <div class="overflow-scroll border-2 rounded-md border-primary backdrop-blur-lg">
                                                                                                                                        <table>
                                                                                                                                            <thead>
                                                                                                                                                <tr>
                                                                                                                                                    <th class="px-8">Actions</th>
                                                                                                                                                    <th>Prénom</th>
                                                                                                                                                    <th>Nom</th>
                                                                                                                                                    <th>Numéro de license</th>
                                                                                                                                                    <th>Région</th>
                                                                                                                                                    <th>Ville</th>
                                                                                                                                                    <th>Code postal</th>
                                                                                                                                                    <th>Email</th>
                                                                                                                                                    <th>Date de naissance</th>
                                                                                                                                                </tr>
                                                                                                                                            </thead>
                                                                                                                                            <tbody>
                                                                                                                                                @foreach ($users as $user)
    <tr>
                                                                                                                                                        <td>
                                                                                                                                                            <div class="flex items-center gap-4 flex-nowrap shrink-0 whitespace-nowrap">
                                                                                                                                                                <button onclick="window.location.href='{{ route('user.show', $user->id) }}'"
                                                                                                                                                                    class="shrink-0">
                                                                                                                                                                    <img src="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show icon"
                                                                                                                                                                        class="w-[24px] h-[24px]">
                                                                                                                                                                </button>


                                                                                                                                                                <button onclick="window.location.href='{{ route('user.edit', $user->id) }}'"
                                                                                                                                                                    class="shrink-0">
                                                                                                                                                                    <img src="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit icon"
                                                                                                                                                                        class="w-[24px] h-[24px]">
                                                                                                                                                                </button>

                                                                                                                                                                <form action="{{ route('user.destroy', $user->id) }}" method="post" class="shrink-0">
                                                                                                                                                                    @csrf
                                                                                                                                                                    @method('DELETE')
                                                                                                                                                                    <button type="submit">
                                                                                                                                                                        <img src="{{ Vite::asset('resources/images/icons/trash.svg') }}"
                                                                                                                                                                            alt="Delete icon" class="w-[24px] h-[24px]">
                                                                                                                                                                    </button>
                                                                                                                                                                </form>

                                                                                                                                                            </div>
                                                                                                                                                        </td>
                                                                                                                                                        <td>{{ $user->firstname }}</td>
                                                                                                                                                        <td>{{ $user->lastname }}</td>
                                                                                                                                                        <td>{{ $user->id_license }}</td>
                                                                                                                                                        <td>{{ $user->region }}</td>
                                                                                                                                                        <td>{{ $user->city }}</td>
                                                                                                                                                        <td>{{ $user->postal_code }}</td>
                                                                                                                                                        <td>{{ $user->email }}</td>
                                                                                                                                                        <td>{{ $user->birth_date }}</td>
                                                                                                                                                    </tr>
    @endforeach
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                        <button onclick="window.location.href='{{ route('user.create') }}'" class="w-full button !rounded-none">Ajouter
                                                                                                                                            un
                                                                                                                                            utilisateur</button>
                                                                                                                                    </div>
                                                                                                                                    -->
    <div class="grid grid-cols-4 gap-4 shrink-0 auto-cols-auto]">
        @foreach ($users as $user)
            <form action="{{ route('user.destroy', $user->id) }}" method="post"
                class="hidden md:flex shrink-0 w-[24px] h-[24px]>
                @csrf
                @method('DELETE')
                <button type="submit" ">
                                                    <img src="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Delete icon">
                                                </button>
                                            </form>
                                            <button onclick="window.location.href='{{ route('user.edit', $user->id) }}'"
                                                class="hidden md:flex shrink-0 w-[24px] h-[24px]">
                                                <img src="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit icon">
                                            </button>
                                            <button onclick="window.location.href='{{ route('user.show', $user->id) }}'"
                                                class="shrink-0 w-[24px] h-[24px]">
                                                <img src="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show icon">
                                            </button>
                                            <span>{{ $user->email }}</span>
                                            <span>{{ $user->firstname }}</span>
                                            <span>{{ $user->lastname }}</span>
     @endforeach

    </div>
    <button onclick="window.location.href='{{ route('user.create') }}'"
        class="flex justify-center col-span-3 my-4 button whitespace-nowrap">Ajouter un utilisateur</button>
@endsection
