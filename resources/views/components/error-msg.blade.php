@props(['name'])
@error($name)
<p class='text-red-500 font-bold text-xs mt-1'> {{ $message }}</p>
@enderror
