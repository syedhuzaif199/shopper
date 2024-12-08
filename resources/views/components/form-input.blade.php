@props(['name'])
<?php
$defaultClass = "block w-full rounded-md bg-white/10 px-3 py-1.5 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6";
?>
<div>
    <input name="{{ $name }}" id="{{ $name }}"
        {{ $attributes(['class' => $defaultClass,]) }}>
    <x-form-error field="{{ $name }}" />
</div>