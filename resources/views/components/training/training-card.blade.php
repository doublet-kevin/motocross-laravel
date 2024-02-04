<div class="flex flex-col border rounded">
    <img src="{{ $circuitImg }}" alt="circuit" class="object-cover w-[300px] h-[100px]">
    <span class="text-xl font-bold text-primary">{{ $training->circuit->name }}</span>
        <div class="flex items-center gap-2">
            {{ date('d/m/Y', strtotime($training->date))}}
            <img src='{{ Vite::asset("resources/images/icons/calendar.svg") }}' alt="calendar" class="w-4 h-4">
        </div>
            <div class="flex items-center gap-2">
            {{ date('H:i', strtotime($training->date))}}
            <img src='{{ Vite::asset("resources/images/icons/clock.svg") }}' alt="clock" class="w-4 h-4">
        </div>

        <div class="flex items-center gap-2">
            {{ $training->number_of_places}}/75
            <img src='{{ Vite::asset("resources/images/icons/users.svg") }}' alt="users" class="w-5 h-5">
        </div>
        <button class="button">Participer</button>
    {{ $training->type }}
</div>