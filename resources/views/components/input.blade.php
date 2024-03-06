@props(['name', 'label', 'type', 'value' => null, 'required' => false])
<div>
    <label class="dark:text-gray-400 " for="{{ $name }}">{{ $label }}</label>
    <input required type="{{ $type }}" id='{{ $name }}' name="{{ $name }}"
        value="{{ $value }}">
    @error($name)
        <p class=" text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>
