@if (session()->has('success'))
        <div x-data="{ show : true }"
            x-init="
                setTimeout(()=>show = false, 4000)
            "
            x-show="show"
         class="fixed bg-blue-500 py-3 px-3 bottom-3 right-3 rounded-xl text-sm text-white">
            <p>
                {{ session('success') }}
            </p>
        </div>
    @endif
