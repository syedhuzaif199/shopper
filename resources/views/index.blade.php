<x-layout>
    <section class="flex justify-center w-full">
        <div class="flex items-center space-x-4 overflow-x-auto">
            @foreach($categories as $category)
            <a href="">
                <div class="w-[160px] h-[160px] p-2 bg-gray-300 hover:bg-gray-400 dark:bg-white/10 dark:hover:bg-white/20 flex justify-center text-center items-center text-xl border border-white/20 rounded-lg">{{ $category->name }}</div>
            </a>
            @endforeach
        </div>
    </section>

    <x-vertical-bar />
    <section>
        <div class="mt-10 flex items-center">
            <i data-lucide="chevron-right"></i>
            <h1 class="text-2xl pl-2">Featured</h1>
        </div>

        <div class="flex justify-center w-full mt-8">
            <div class="flex items-center space-x-4 overflow-x-auto">

                @foreach($products as $item)
                <a href="/products/{{ $item->id }}">
                    <div class="w-[240px] h-[240px] hover:bg-gray-400 bg-white hover:opacity-50 flex justify-center items-center text-xl border border-white/20 rounded-lg">
                        <img src="{{ asset('storage/' . $item->img)}}" class="aspect-ratio-img p-1" />
                    </div>
                    <p class="font-bold mt-5 mb-1">
                        ${{ $item->price}}
                    </p>
                    <p>
                        {{ $item->name }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $item->category->name }}
                    </p>
                </a>
                @endforeach

            </div>
        </div>
    </section>
</x-layout>