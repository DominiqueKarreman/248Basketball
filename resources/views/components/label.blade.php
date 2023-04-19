@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#EDB12C]']) }}>
    {{ $value ?? $slot }}
</label>
