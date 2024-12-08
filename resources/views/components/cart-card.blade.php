<div class="w-full border bg-blur border-black/50 dark:border-white/20 h-[320px] flex items-center justify-between p-10 rounded-lg">
    <a href="/product" class="h-full aspect-square bg-white rounded flex items-center justify-center">
        <img src="{{ $img }}" class="aspect-ratio-img hover:opacity-50 border border-black/50 dark:border-white/10 rounded" />
    </a>
    <div class="h-[100%] w-full px-4 flex flex-col justify-between">
        <a href="/product">
            <h3 class="text-lg">{{ $title }}</h3>
        </a>

        <div class="flex items-center">
            <div class="block rounded-l-md bg-white/10 px-3 py-1.5 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">Qty</div>
            <x-form-input type="number" name="quantity" value="0" class="rounded-none rounded-r-md" style=""/>
            <div class="ml-10">
                <i data-lucide="trash-2"></i>
            </div>
        </div>

    </div>
    <div class="w-[33%] flex justify-end">
        <p class="text-4xl">{{ $price }}</p>
    </div>
</div>