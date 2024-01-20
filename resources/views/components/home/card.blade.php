<div class="max-w-sm p-6 mt-10 card-glass border rounded-md shadow bg-gray-800 border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-light">
            {{ $title }}</h5>
    </a>
    <p class="mb-3 font-normal text-light">
        {{ $slot }}
    </p>
    <a href=""
        class="bg-orange-500 hover:bg-orange-600 duration-500 inline-flex items-center px-3 py-2 gap-2 text-sm font-medium text-center rounded-lg  focus:ring-4 focus:outline-none ">
        {{ $button }}
        <img class="mt-0.5" src="{{ Vite::asset('resources/images/icons/arrow.svg') }}">
    </a>
</div>
