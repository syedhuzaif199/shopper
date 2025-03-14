<x-layout>

    <div class="flex gap-10">
        <div class="space-y-10">

            <div class="w-[640px] h-[640px] bg-white flex justify-center items-center text-xl border border-black/50 dark:border-white/20 rounded-lg">
                <img src="{{ $product->image }}" class="aspect-ratio-img p-1" />
            </div>
            <div class="flex justify-between">
                <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="bg-yellow-500 flex justify-center text-white w-[300px] py-2 text-2xl rounded-lg">Add to cart</button>
                </form>
                <a href="" class=" bg-orange-500 flex justify-center text-white w-[300px] py-2 text-2xl rounded-lg">Buy Now</a>
            </div>
        </div>

        <div class="flex flex-col space-y-10 border border-black/50 dark:border-white/20 p-10 overflow-y w-[50%] break-words rounded-lg">
            <h1 class="text-4xl font-bold">{{ $product->name }}</h1>
            @if($product->discount_perc > 0)
            <p class="text-4xl text-red-800 line-through">${{ $product->price }}</p>
            <p class="text-4xl text-green-500">${{ $product->price * (1- $product->discount_perc/100) }}</p>
            @else
            <p class="text-4xl">${{ $product->price }}</p>
            @endif
            <h3 class="text-2xl">Description</h3>
            <p>{{ $product->description }}</p>
        </div>
    </div>

</x-layout>