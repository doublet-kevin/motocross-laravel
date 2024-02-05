@props(['adult' => false])
<div class="flex flex-col overflow-hidden border rounded-md border-primary backdrop-blur-md shrink-0">
    <img src="{{ $circuitImg }}" alt="circuit"
        class="object-cover w-[300px] h-[100px] rounded-t-md border-b border-primary">
    <div class="flex flex-col p-2">
        <span class="text-xl font-bold text-primary">{{ $training->circuit->name }}</span>
        <div class="flex justify-between gap-4 pb-2">
            <div class="flex items-center gap-2">
                {{ date('d/m/Y', strtotime($training->date)) }}
                <img src='{{ Vite::asset('resources/images/icons/calendar.svg') }}' alt="calendar" class="w-4 h-4">
            </div>
            <div class="flex items-center gap-2">
                {{ date('H:i', strtotime($training->date)) }}
                <img src='{{ Vite::asset('resources/images/icons/clock.svg') }}' alt="clock" class="w-4 h-4">
            </div>

            <div class="flex items-center gap-2">
                {{ $training->number_of_places }}/75
                <img src='{{ Vite::asset('resources/images/icons/users.svg') }}' alt="users" class="w-5 h-5">
            </div>
        </div>

        <form method="POST"
            action="{{ route('registration.store', ['id_training' => $training->id, 'id_user' => Auth::id()]) }}">
            @csrf
            <div class="flex gap-2">
                @auth
                    <a href="{{ route('training.show', $training->id) }}" class="flex-grow button-inactive">Liste des
                        pilotes</a>
                    @if (Auth::user()->isAdult() && $adult)
                        <button type="submit" class="button">Participer</button>
                    @elseif (!Auth::user()->isAdult() && !$adult)
                        <button type="submit" class="button">Participer</button>
                    @endif
                @endauth
                @guest
                    <button type="submit" class="w-full button">Participer</button>
                @endguest
            </div>

        </form>
    </div>

</div>
