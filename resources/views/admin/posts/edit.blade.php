<script>
    generateSlug = () => {
        document.getElementById('slug').value = document.getElementById('title').value.split(" ").join("-")
            .toLowerCase();
    }
</script>
<x-setting heading="Edit post: {{ $post->title }}">
    <section class="px-16 w-full">
        <x-panel class="mx-auto">

            <form action="/admin/post/{{ $post->id }}" method="post" class="mt-10" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-forms.input name="title" :value="old('title', $post->title)" />
                <div class="flex w-full">
                    <x-forms.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"  class="flex-1 flex-shrink-0"/>
                    <img src="{{ asset('storage/'. $post->thumbnail) }}"  class="rounded-xl ml-10" width="120">

                </div>
                <input type="hidden" name="slug" value="{{ old('slug') }}" id="slug">
                <x-forms.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-forms.textarea>
                <x-forms.textarea name="body">{{ old('body', $post->body) }}</x-forms.textarea>


                <div class="mt-4">
                    <x-forms.label name="category" />
                    <select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full required:true">

                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-error-msg name="category" />
                </div>

                <div class="my-6">
                    <button type="submit" onclick="generateSlug()"
                        class="bg-blue-500 text-white rounded py-2 px-4 w-full hover:bg-blue-700">Update</button>
                </div>

            </form>
            </main>
        </x-panel>
    </section>
</x-setting>
