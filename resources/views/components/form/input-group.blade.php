@props(['required' => false])
<div class="flex flex-col gap-2 mt-2 whitespace-nowrap">
    <label for="{{ $name }}" class="font-bold">{{ $placeholder }} {{ $required ? '*' : '' }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}>
</div>
