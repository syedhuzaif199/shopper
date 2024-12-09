@props(['product_id', 'quantity', 'img', 'title', 'price'])
<div class="w-full border bg-blur border-black/50 dark:border-white/20 h-[320px] flex items-center justify-between p-10 rounded-lg">
    <a href="/products/{{ $product_id }}" class="h-full aspect-square bg-white border border-black/50 dark:border-white/20 rounded flex items-center justify-center">
        <img src="{{ $img }}" class="aspect-ratio-img hover:opacity-50 rounded" />
    </a>
    <div class="h-[100%] w-full px-4 flex flex-col justify-between">
        <a href="/products/{{ $product_id }}">
            <h3 class="text-lg">{{ $title }}</h3>
        </a>

        <div class="flex items-center">
            <div class="mr-4">Qty</div>
            <script>
                function incrementQuantity(button) {
                    let input = button.previousElementSibling;
                    input = input.querySelector("input");
                    input.value = Number(input.value) + 1;
                    button.parentElement.submit();
                }

                function decrementQuantity(button) {
                    let input = button.nextElementSibling;
                    input = input.querySelector("input");
                    if (Number(input.value) <= 1) {
                        return;
                    }
                    input.value = Number(input.value) - 1;
                    button.parentElement.submit();
                }
            </script>
            <form action="/cart/{{ $product_id }}" method="POST" class="flex">
                @csrf
                @method('PATCH')
                <button type="button" onclick="decrementQuantity(this)" class="p-4 block rounded-l-md bg-white/10 px-3 py-1.5 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 sm:text-sm/6">-</button>
                <x-form-input type="number" name="quantity" value="{{ $quantity }}" class="rounded-none" />
                <button type="button" onclick="incrementQuantity(this)" class="p-4 block rounded-r-md bg-white/10 px-3 py-1.5 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 sm:text-sm/6">+</button>
            </form>
            <div class="ml-8">
                <form action="/cart/{{ $product_id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center">
                        <i data-lucide="trash-2"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
    <div class="w-[33%] flex justify-end">
        <p class="text-4xl">{{ $price }}</p>
    </div>
</div>