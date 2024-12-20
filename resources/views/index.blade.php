<x-layout>
    <section class="w-full">
        <div class="flex h-fit items-center">
            <!-- <i data-lucide="brackets"></i> -->
            <h1 class="text-2xl pl-2">Categories</h1>
        </div>
        <div class="flex items-center mt-4 w-full space-x-4 h-[200px] overflow-x-auto">
            @foreach($categories as $category)
            <a href="">
                <div class="w-[160px] h-[160px] p-2 bg-gray-300 hover:bg-gray-400 dark:bg-white/10 dark:hover:bg-white/20 flex justify-center text-center items-center text-xl border border-white/20 rounded-lg">{{ $category->name }}</div>
            </a>
            @endforeach
        </div>
    </section>


    <div class="mt-10 flex items-center">
        <h1 class="text-2xl pl-2">Featured</h1>
    </div>

    <div class="flex w-full mt-8">
        <div class="flex space-x-8 overflow-x-auto">

            @foreach($products as $item)
            <a href="/products/{{ $item->id }}" class="max-w-[240px]">
                <div class="w-[240px] h-[240px] hover:bg-gray-400 bg-white hover:opacity-50 flex justify-center items-center text-xl border border-black/50 dark:border-white/20 rounded-lg">
                    <img src="{{ $item->image }}" class="aspect-ratio-img p-1" />
                </div>
                <!-- <p class="font-bold mt-5 mb-1">
                    ${{ $item->price}}
                </p> -->
                @if($item->discount_perc > 0)
                <p class="font-bold text-red-500 text-sm mt-5 mb-1 line-through">${{ $item->price }}</p>
                <p class="font-bold mb-1">${{ $item->price * (1- $item->discount_perc/100) }}</p>
                @else
                <p class="font-bold mt-5 mb-1">${{ $item->price }}</p>
                @endif
                <p>
                    {{ $item->name }}
                </p>
                <p class="text-sm text-gray-500">
                    {{ $item->category ? $item->category->name : '' }}
                </p>
            </a>
            @endforeach

        </div>
    </div>
    </section>
</x-layout>