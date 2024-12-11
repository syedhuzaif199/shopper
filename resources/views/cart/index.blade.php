<x-layout>
    <section class="w-[90%] border border-black/50 dark:border-white/20 rounded-xl p-8 space-y-4">
        <h1 class="text-4xl">Your Cart</h1>
        @if(! $cart->isEmpty())
        <div>
            <x-divider />
        </div>
        @foreach($cart as $item)
        <x-cart-card product_id="{{ $item->product->id }}" quantity="{{ $item->quantity }}" img="{{ asset('storage' . $item->product->image)}}" title="{{ $item->product->name}}" price="${{ $item->product->price }}" />
        @endforeach


        <div>
            <x-divider />
        </div>

        <!-- array length in php -->

        <div class="flex justify-end">
            <p class="text-2xl">Sub-total ({{ count($cart) }} items): ${{ $cart->sum(function ($item) {
                return $item->product->price * $item->quantity;
            }) }}</p>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</button>
        </div>
        @else
        <div class="py-10">
            <p class="text-2xl">Your cart is empty</p>
        </div>
        @endif
    </section>
</x-layout>