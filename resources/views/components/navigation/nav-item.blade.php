@props(['method'])

@if (isset($method) && $method === 'POST')
    <li
        class="p-2 duration-300 border-b border-orange-500 rounded-sm cursor-pointer hover:rounded-md hover:bg-orange-500">
        <form action="{{ $route }}" method="POST" class="my-0">
            @csrf
            @method($method)

            <button type="submit">{{ $name }}</button>

        </form>
    </li>
@else
    <li
        class="p-2 duration-300 border-b border-orange-500 rounded-sm cursor-pointer hover:rounded-md hover:bg-orange-500">
        <a href="{{ $route }}">{{ $name }}</a>
    </li>
@endif
