@props(['product_id', 'img', 'title', 'price'])
<a href="{{ route('admin.products.show', $product_id) }}">
    <div class="flex items-center justify-start border border-black/50 dark:border-white/20 m-4 p-4 rounded-xl hover:bg-white/10">
        <div class="flex justify-center w-[10%]">
            <h1 class="text-xl">{{ $product_id }}</h1>
        </div>
        <div class=" w-[160px] h-[160px] bg-white flex justify-center items-center text-xl border border-black/50 dark:border-white/20 rounded-lg">
            <img src="{{ $img }}" class="aspect-ratio-img p-1" />
        </div>
        <div class="flex justify-between w-full items-center">
            <div class="w-[50%] pl-10">
                <h1 class="text-4xl">{{ $title }}</h1>
            </div>
            <div class="flex justify-end">
                <p class=" text-4xl">${{ $price }}</p>
            </div>
            <div class="ml-10">
                <i data-lucide="chevron-right"></i>
            </div>
        </div>
    </div>
</a>