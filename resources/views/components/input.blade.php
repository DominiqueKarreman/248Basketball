@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-black bg-zinc-800 text-[#EDB12C] focus:border-[#EDB12C] focus:ring-[#EDB12C] rounded-md shadow-sm']) !!}>
