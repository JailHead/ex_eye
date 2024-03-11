@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm']) !!}>
