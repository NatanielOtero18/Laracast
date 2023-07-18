@props(['comment'])
<x-panel class=" bg-gray-50 ">
    <article class="flex flex-col  p-3 ">
        <div class="flex items-center space-x-2 ">
            <div>
                <img src="https://i.pravatar.cc/150?u={{ $comment->user_id }}" alt="avatar" height="60"
                    width="60">
            </div>
            {{-- https://pbs.twimg.com/media/FO8nQ9yXIAkTqfl.jpg --}}
            <div>
                <header>
                    <h3 class="font-bold">{{ $comment->author->name }}</h3>
                    <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
                </header>
            </div>
        </div>
        <p class="p-1 mt-3">
            {{ $comment->body }}
        </p>
    </article>
</x-panel>
