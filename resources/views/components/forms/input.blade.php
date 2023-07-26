@props(['name'])

<div class="mb-6">

    <x-forms.label name="{{ $name }}" />
    <input class="border border-gray-400 p-2 w-full required:true"
        name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(["value" => old($name)]) }}>
    <x-error-msg name="{{ $name }}" />
</div>
