@props(['adult' => false])
<div class="flex flex-col w-[350px] overflow-hidden border rounded-md border-primary shrink-0">
    <img src="{{ $circuitImg }}" alt="circuit"
        class="object-cover w-[350px] h-[100px] rounded-t-md border-b border-primary">
    <div class="flex flex-col p-2 ">
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
                {{ $training->occupied_places ?? 'nan' }}/75
                <img src='{{ Vite::asset('resources/images/icons/users.svg') }}' alt="users" class="w-5 h-5">
            </div>
        </div>

        <div class="flex gap-2">
            @if ($training->date < date('Y-m-d'))
                <a href="{{ route('training.show', $training->id) }}" class="flex-grow button-inactive">Liste des
                    pilotes</a>
                <div class="button-disabled">
                    <img src='{{ Vite::asset('resources/images/icons/exit.svg') }}' alt="calendar">
                    <span>Terminé</span>
                </div>
            @else
                <!-- If the user is authenticated -->
                @auth
                    <!-- Show pilote list button -->
                    <a href="{{ route('training.show', $training->id) }}" class="flex-grow button-inactive">Liste des
                        pilotes</a>
                    <!-- If the user is an adult -->
                    @if (Auth::user()->isAdult())
                        @if (!Auth::user()->isRegistered($training->id))
                            <form method="POST"
                                action="{{ route('registration.store', ['training_id' => $training->id, 'user_id' => Auth::id()]) }}">
                                @csrf
                                <button type="submit" class="button">Participer</button>
                            </form>
                        @else
                            <div class="button-inactive">
                                <img src='{{ Vite::asset('resources/images/icons/check.svg') }}' alt="calendar">
                                <form method="POST" action="{{ route('registration.destroy', $training->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Se désinscrire</button>
                                </form>
                            </div>
                        @endif
                        <!-- If the user is not an adult -->
                    @elseif (!Auth::user()->isAdult())
                        @if (!Auth::user()->isRegistered($training->id))
                            <button type="submit" class="button">Participer</button>
                        @else
                            <div class="button-disabled">
                                <img src='{{ Vite::asset('resources/images/icons/check.svg') }}' alt="calendar">
                                <form method="POST" action="{{ route('registration.destroy', $training->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Se désinscrire</button>
                                </form>
                            </div>
                        @endif
                    @endif
                @endauth
                @guest
                    <button type="submit" class="w-full button">Participer</button>
                @endguest
            @endif
        </div>

        </form>
    </div>

</div>
