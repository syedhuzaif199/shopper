<x-layout>
    <section class="w-[90%] border border-black/50 dark:border-white/20 rounded-xl p-8 space-y-4">
        <h1 class="text-4xl">Order ID: {{ $order->id }}</h1>
        <div class="flex justify-between">
            <div class="flex flex-col space-y-4 flex-grow mx-4">
                <p class="text-xl">Order Status: {{ $order->status }}</p>
                <p class="text-xl">Total Price: ${{ $order->total_price }}</p>
            </div>
            <div class="flex flex-col justify-start h-full space-y-2">
                <a href="" class="flex justify-center dark:border-white/20 px-4 py-2 text-xl rounded-md bg-indigo-600 hover:bg-indigo-500">Track Order</a>
                <a href="" class="flex justify-center dark:border-white/20 px-4 py-2 text-xl rounded-md bg-red-600 hover:bg-red-700">Cancel Order</a>
            </div>
        </div>
        <div class=" flex items-center" onclick="toggleCollapsible('ord-prod-{{ $order->id }}')">
            <span class="hidden" id="chev-down-ord-prod-{{ $order->id }}">
                <i data-lucide="chevron-down"></i>
            </span>
            <span id="chev-right-ord-prod-{{ $order->id }}">
                <i data-lucide="chevron-right"></i>
            </span>
            <span class="text-2xl">Ordered Products:</span>

        </div>
        <div id="ord-prod-{{ $order->id }}" class="border hidden border-black/50 dark:border-white/20 rounded-lg p-4">
            @foreach($order->products as $product)
            <div class="flex items-center justify-between">
                <div class="w-[240px] h-[240px] flex justify-center items-center text-xl border border-black/50 dark:border-white/20 rounded-lg">
                    <img src="{{ $product->image }}" class="aspect-ratio-img p-1" />
                </div>
                <p class="text-xl">{{ $product->name }} x {{ $product->pivot->quantity }}</p>
            </div>
            <x-divider />
            @endforeach
        </div>
    </section>
</x-layout>