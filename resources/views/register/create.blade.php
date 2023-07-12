<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-300 p-6 rounded-xl border border-gray-400">
            <h1 class="font-bold text-center text-xl">Register</h1>
            <form action="/register" method="post" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Name
                    </label>
                    <input type="text" class="border border-gray-400 p-2 w-full required:true" required name="name"
                        id="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 font-bold text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Username
                    </label>
                    <input type="text" class="border border-gray-400 p-2 w-full required:true" required
                        name="username" id="username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 font-bold text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>
                    <input type="email" class="border border-gray-400 p-2 w-full required:true" required
                        name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 font-bold text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password
                    </label>
                    <input type="password" class="border border-gray-400 p-2 w-full required:true" required
                        name="password" id="password">
                    @error('password')
                        <p class="text-red-500 font-bold text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-500 text-white rounded py-2 px-4 w-full hover:bg-blue-700">Submit</button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
