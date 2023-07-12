@props(['trigger'])
<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl ">

    <div x-data="{ show: false }" x-on:click.outside=" show = false ">
        <div x-on:click = "show = ! show ">
            {{ $trigger }}

        </div>


        <div x-show="show" class="absolute bg-gray-100 py-2 mt-3 text-sm font-semibold w-full z-50 overflow-auto max-h-32 "
            style="display: none">
          {{ $slot }}

        </div>
    </div>
</div>
