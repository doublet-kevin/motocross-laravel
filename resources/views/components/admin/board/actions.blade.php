@props(['method' => 'POST'])

@if ($method === 'DELETE')
    <form action="{{ $route }}" method="POST" class='flex'>
        @csrf
        @method('DELETE')
        <button type="submit" class="shrink-0 w-[24px] h-[24px]">
            <img src="{{ $icon }}" alt="{{ $alt }} icon">
        </button>
    </form>
@else
    <a href="{{ $route }}" class="shrink-0 w-[24px] h-[24px]">
        <img src="{{ $icon }}" alt="{{ $alt }} icon">
    </a>
@endif
