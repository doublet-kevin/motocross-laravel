@props(['method' => 'POST'])

@if ($method === 'DELETE')
    <form action="{{ $route }}" method="POST" class='flex m-0'>
        @csrf
        @method('DELETE')
        <button type="submit" class="shrink-0 w-[20px] h-[20px]">
            <img src="{{ $icon }}" alt="{{ $alt }} icon">
        </button>
    </form>
@else
    <a href="{{ $route }}" class="shrink-0 w-[20px] h-[20px]">
        <img src="{{ $icon }}" alt="{{ $alt }} icon">
    </a>
@endif
