@props(['post'])
<ul role="list" class="divide-y divide-gray-100">
    <li class="flex justify-between gap-x-6 py-5 border-b" >
        <div class="flex gap-x-4">
            <div class="min-w-0 flex-auto">
                <a href="/posts/{{ $post->slug }}">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $post->title }}</p>
                </a>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $post->author->name }}</p>
            </div>
        </div>
        <div class="hidden sm:flex  sm:items-end space-x-1 items-center">
            <p class="text-sm leading-6 text-gray-900">
                <a href="/admin/post/{{ $post->id }}/edit" class="p-4">Edit</a>
            </p>

                {{-- <a href="/admin/post/{{ $post->id }}/delete" class="p-4">Delete</a> --}}
                <form action="/admin/post/{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="text-sm leading-6 text-gray-900" type="submit">Delete</button>
                </form>


        </div>
    </li>
</ul>
