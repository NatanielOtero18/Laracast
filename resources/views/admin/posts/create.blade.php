<script>
    generateSlug = () => {
        document.getElementById('slug').value = document.getElementById('title').value.split(" ").join("-")
            .toLowerCase();
    }
</script>

<x-setting heading="Publish new post">
    <section class="px-16 w-full">
        <x-panel class="mx-auto">

            <form action="/admin/post" method="post" class="mt-10" enctype="multipart/form-data">
                @csrf
                <x-forms.input name="title" />
                <x-forms.input name="thumbnail" type="file" />
                <input type="hidden" name="slug" value="{{ old('slug') }}" id="slug">
                <x-forms.textarea name="excerpt" />
                <x-forms.textarea name="body" />


                <div class="mt-4">
                    <x-forms.label name="category" />
                    <select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full required:true">

                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-error-msg name="category" />
                </div>

                <div class="my-6">
                    <button type="submit" onclick="generateSlug()"
                        class="bg-blue-500 text-white rounded py-2 px-4 w-full hover:bg-blue-700">Publish</button>
                </div>

            </form>
            </main>
        </x-panel>
    </section>
</x-setting>
