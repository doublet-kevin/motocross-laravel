@extends('board-layout')

@section('dashboard-content')
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th scope="col" class="py-2">Actions</th>
                    <th scope="col" class="py-2 pl-2 text-start">Date</th>
                    <th scope="col" class="py-2 pl-2 text-start">Circuit</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start sm:table-cell">Type</th>
                    <th scope="col" class="hidden py-2 pl-2 text-start md:table-cell">Places disponibles</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainings as $training)
                    <tr>
                        <td scope="row" class="w-24">
                            <div class="flex items-center justify-center gap-2">
                                <x-admin.board.actions route="{{ route('training.destroy', $training->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/trash.svg') }}" alt="Trash"
                                    method="DELETE" />

                                <x-admin.board.actions route="{{ route('training.edit', $training->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/edit.svg') }}" alt="Edit" />

                                <x-admin.board.actions route="{{ route('training.show', $training->id) }}"
                                    icon="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="Show" />
                            </div>
                        </td>
                        <td>
                            {{ $training->date }}
                        </td>
                        <td>
                            {{ $training->circuit->name }}
                        </td>
                        <td class="hidden sm:table-cell">
                            {{ $training->type }}
                        </td>
                        <td class="hidden md:table-cell">
                            {{ $training->number_of_places }}
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
    <button onclick="window.location.href='{{ route('training.create') }}'"
        class="flex justify-center col-span-3 button whitespace-nowrap">Ajouter un entraînement</button>
    </div>
@endsection
