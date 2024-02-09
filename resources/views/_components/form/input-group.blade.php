@props([
    'required' => false,
    'disabled' => false,
    'value' => null,
    'placeholder' => '',
    'options' => null,
    'user' => null,
    'errors' => null,
])
@if ($type === 'select')
    <div class="flex flex-col gap-2 mt-2 whitespace-nowrap">
        <label for="{{ $name }}" class="font-bold">{{ $placeholder }} {{ $required ? '*' : '' }}</label>
        <select name="region" id="region">
            <option value="">Veuillez choisir votre région</option>
            @foreach ($options as $option)
                <option value="{{ $option['nom'] }}" {{ $user->region == $option['nom'] ? 'selected' : '' }}>
                    {{ $option['nom'] }}</option>
            @endforeach
            @if ($errors->has($name))
                <div class="text-red-500">{{ $errors->first($name) }}</div>
            @endif
        </select>
    </div>
@else
    <div class="flex flex-col gap-2 mt-2 whitespace-nowrap">
        <label for="{{ $name }}" class="font-bold">{{ $placeholder }} {{ $required ? '*' : '' }}</label>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            placeholder="{{ $placeholder }}" value="{{ $value ? $value : old('name') }}"
            {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }}>
        @if ($errors->has($name))
            <div class="text-red-500">{{ $errors->first($name) }}</div>
        @endif
    </div>
@endif
