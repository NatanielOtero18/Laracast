@props(['name'])

<div>
    <x-forms.label name="{{ $name }}" />
    <textarea name="{{ $name }}" id="{{ $name }}"
        class="w-full p-2 border mb-2 mt-2 border-gray-400 text-sm focus:outline-none focus:ring" rows="5"
        placeholder="{{ $name }}..." required >{{ $slot ?? old($name) }}</textarea>
    <x-error-msg name="{{ $name }}" />
</div>
