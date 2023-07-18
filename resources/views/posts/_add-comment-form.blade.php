@auth
<x-panel>
    <form action="/posts/{{ $post->slug }}/comment" method="post" class="">
        @csrf
        <header class="flex items-center ">
            <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="avatar" height="60"
                width="60">
            <h2 class="ml-3">Want to participate?</h2>
        </header>
        <div class="mt-4">
            <textarea name="body" id="body" class="w-full p-2 text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Comment..." required></textarea>

            @error('body')
                <x-error-msg>{{ $message }}</x-error-msg>
            @enderror
        </div>
        <div class="flex justify-end border-t border-gray-400 py-2">
            <button type="submit"
                class="bg-blue-400 font-bold hover:bg-blue-600 px-7 py-1.5 rounded-2xl text-white text-xs uppercase">Comment</button>
        </div>
    </form>
</x-panel>
@else
<x-panel class="text-sm font-semibold">
    <a href="/register" class="text-blue-400 hover:underline">Register</a> or <a href="/login"
        class="text-blue-400 hover:underline">Log in </a> to leave a comment!
</x-panel>
@endauth
