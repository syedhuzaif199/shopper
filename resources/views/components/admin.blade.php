<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script rel="preload" src="https://unpkg.com/lucide@latest"></script>
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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-black dark:text-white pb-10">
    <div class="px-10">
        <nav class="w-full h-[80px] border-b border-black/50 dark:border-white/10 mb-10 flex items-center justify-between">
            <div class="w-[33%]">
                <div class="flex w-fit">
                    <a href="{{ route('admin.index') }}" class="flex items-center">
                        <i data-lucide="barcode"></i>
                        <h2 class="text-2xl ml-2">shopper</h2>
                    </a>
                </div>
            </div>
            <div class="w-[33%] flex justify-between">
                <x-nav-link href="{{ route('admin.orders.index') }}">Orders</x-nav-link>
                <x-nav-link href="{{ route('admin.products.index') }}">Products</x-nav-link>
                <x-nav-link href="{{ route('admin.categories.index') }}">Categories</x-nav-link>
                <x-nav-link href="{{ route('admin.users.index') }}">Users</x-nav-link>
            </div>
            <div class="w-[33%] flex justify-end items-center space-x-4">
                <!-- add user account options -->

                @auth
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-2 dark:hover:bg-white/10 hover:bg-gray-200 rounded-xl">Log out</button>
                </form>
                @endauth
            </div>
        </nav>

        <main class="max-w-[90% ] mx-auto">
            {{ $slot }}
        </main>
    </div>


    <script>
        lucide.createIcons();
    </script>
</body>

</html>