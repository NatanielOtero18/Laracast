
<x-setting heading="Dashboard">
    <section class="px-16 w-full">
        <x-panel class="mx-auto">

           @foreach ($posts as $post)
           <x-admin.list :post="$post" />
           @endforeach
           <div class="mt-4">
            {{ $posts->links() }}
           </div>

        </x-panel>
    </section>
</x-setting>
