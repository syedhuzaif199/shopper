<x-layout>
    <?php
    $items = [
        [
            "img" => "https://m.media-amazon.com/images/I/61ZYtF-byGL._AC_AA180_.jpg",
            "title" => "iPad Pro 12.9-in, 3rd Generation",
            "price" => "459",
        ],
        [
            "img" => "https://m.media-amazon.com/images/I/61fd2oCrvyL._AC_SX466_.jpg",
            "title" => "MacBook Pro 2023",
            "price" => "1169",
        ],
        [
            "img" => "https://m.media-amazon.com/images/I/61d46oYQgdL._AC_AA180_.jpg",
            "title" => "Samsung Galaxy Tab A9+ Tablet 11-inch",
            "price" => "399",
        ],
        [
            "img" => "https://m.media-amazon.com/images/I/61xk4XNRktL._AC_SL1500_.jpg",
            "title" => "Motorola",
            "price" => "109",
        ]
    ]
    ?>
    <section class="w-[90%] border border-black/50 dark:border-white/20 rounded-xl p-8 space-y-4">
        <h1 class="text-4xl">Your Cart</h1>
        <div>
            <x-vertical-bar />
        </div>
        @foreach($items as $item)
        <x-cart-card img="{{ $item['img'] }}" title="{{ $item['title'] }}" price="${{ $item['price'] }}" />
        @endforeach

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const images = document.querySelectorAll(".aspect-ratio-img");
                images.forEach((img) => {
                    if (img.naturalHeight >= img.naturalWidth) {
                        img.classList.add("h-full");
                    } else {
                        img.classList.add("w-full");
                    }
                })

            })
        </script>

        <div>
            <x-vertical-bar />
        </div>

        <!-- array length in php -->

        <div class="flex justify-end">
            <p class="text-2xl">Sub-total ({{ count($items) }} items): ${{ array_reduce($items, function($carry, $item) {
                return $carry + $item['price'];
            }, 0); }}</p>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Checkout</button>
        </div>
    </section>
</x-layout>