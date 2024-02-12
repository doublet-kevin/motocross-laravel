@extends('layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endpush
@vite('resources/css/admin.css')
@section('content')
    <ul class="hidden gap-4 py-4  sm:flex lg:mx-0">
        <li><a href="{{ route('user.board') }}" class="button-inactive">Utilisateurs</a></li>
        <li><a href="{{ route('training.board') }}" class="button-inactive">Entraînements</a></li>
        <li><a href="{{ route('circuit.board') }}" class="button-inactive">Circuits</a></li>
        <li><a href="{{ route('license.board') }}" class="button-inactive">Licenses</a></li>
    </ul>

    <div x-data="{ open: false }" class="flex flex-col m-4 sm:hidden lg:mx-0">
        <button @click="open = !open"
            class="flex items-center justify-center gap-2 px-3 py-2 font-medium text-center duration-500 bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none">
            <span>Dashboard</span>
            <img src="{{ Vite::asset('resources/images/icons/chevron-down.svg') }}" class="transition-all duration-300"
                x-bind:style="open ? 'transform: rotate(-180deg);;' : 'transform: rotate(0deg);'">
        </button>
        <ul class="flex flex-col gap-2 overflow-hidden transition-all duration-300 max-h-0"
            x-bind:style="open ? 'max-height: 500px;' : 'max-height: 0;'">
            <li><a href="{{ route('user.board') }}" class="button-inactive">Utilisateurs</a></li>
            <li><a href="{{ route('training.board') }}" class="button-inactive">Entraînements</a>
            </li>
            <li><a href="{{ route('circuit.board') }}" class="button-inactive">Circuits</a></li>
            <li><a href="{{ route('license.board') }}" class="button-inactive">Licenses</a></li>
        </ul>
    </div>
    <div class="flex flex-col gap-4">
        @yield('dashboard-content')
    </div>
@endsection
