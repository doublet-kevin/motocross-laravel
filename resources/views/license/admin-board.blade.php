@extends('board-layout')

@section('dashboard-content')
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th scope="col" class="py-2">Actions</th>
                    <th scope="col" class="py-2 pl-2 text-start">Numéro de license</th>
                    <th scope="col" class="py-2 pl-2 text-start">Pilote</th>
                    <th scope="col" class="py-2 pl-2 text-start">Mail associé</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($licenses as $license)
                    <tr>
                        <td scope="row" class="w-24">
                            <div class="flex items-center justify-center gap-2">
                                <x-admin.board.actions route="{{ route('license.destroy', $license->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash"
                                    method="DELETE" />
                            </div>
                        </td>
                        <td>
                            {{ $license->license_number }}
                        </td>
                        <td>
                            @if ($license->user)
                                {{ $license->user->firstname }} {{ $license->user->lastname }}
                            @else
                                <span class="text-red-500">Pilote non enregistré</span>
                            @endif
                        </td>
                        <td>
                            {{ $license->associate_email }}
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
    <div class="flex gap-8">
        <a href="{{ route('license.create') }}"
            class="flex justify-center flex-grow col-span-3 button whitespace-nowrap">Ajouter une licence</a>
        <div>{{ $licenses->links('_components.navigation.pagination') }}</div>
    </div>
@endsection
