<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <h1 class="font-bold text-center text-xl">Register</h1>
            <form action="/register" method="post" class="mt-10">
                @csrf
                <div class="mb-6">
                 <x-forms.input name="name" />
                </div>
                <div class="mb-6">
                    <x-forms.input name="username" />
                </div>
                <div class="mb-6">
                    <x-forms.input name="email" type="email" />
                </div>
                <div class="mb-6">
                    <x-forms.input name="password" type="password" />
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-500 text-white rounded py-2 px-4 w-full hover:bg-blue-700">Submit</button>
                </div>

            </form>
            </x-panel>
        </main>
    </section>
</x-layout>
