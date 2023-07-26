@props(['heading'])
<x-layout>
    <h1 class="font-bold text-left text-xl mt-4 p-4 border-b-2 border-gray-300">{{ $heading }}</h1>
    <div class="flex justify-evenly mt-6">
        <x-panel>
            <aside class=" flex-shrink-0 p-6  w-48 ">

                <ul class="space-y-4">
                    <li>
                        <a href="/admin/posts"
                            class="font-semibold {{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="/admin/post/create"
                            class="font-semibold {{ request()->is('admin/post/create') ? 'text-blue-500' : '' }}">New
                            Post</a>
                    </li>

                </ul>

            </aside>
        </x-panel>


        {{ $slot }}

    </div>
</x-layout>
