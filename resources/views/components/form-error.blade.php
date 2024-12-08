@props(['field'])
@error($field)
<p class="pt-2 text-red-500 text-xs">
    {{ $message }}
</p>
@enderror