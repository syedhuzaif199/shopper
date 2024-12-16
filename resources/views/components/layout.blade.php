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

<body class="bg-gray-100 dark:bg-black text-black dark:text-white h-[100vh]">
    <div class="px-10">
        <nav class="w-full h-[80px] border-b border-black/50 dark:border-white/10 mb-10 flex items-center justify-between">
            <div class="w-[33%]">
                <div class="flex w-fit">
                    <a href="/" class="flex items-center">
                        <i data-lucide="barcode"></i>
                        <h2 class="text-2xl ml-2">shopper</h2>
                    </a>
                </div>
            </div>
            <div class="flex w-[33%]">
                <input class="px-3 py-2 rounded-l-xl w-full bg-white/10 border border-black/50 dark:border-white/20 outline outline-0 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600" type="text" placeholder="Search for products">
                <button class="px-3 py-2 rounded-r-xl bg-white/10 border border-l-0 border-black/50 dark:border-white/20 hover:bg-gray-200 dark:hover:bg-white/20"><i data-lucide="search"></i></button>
            </div>
            <div class="w-[33%] flex justify-end items-center space-x-4">
                <!-- add user account options -->
                <x-nav-link href="/cart">
                    <i data-lucide="shopping-cart"></i>
                </x-nav-link>
                @guest
                <x-nav-link href="/login">Log In</x-nav-link>
                <x-nav-link href="/register">Sign Up</x-nav-link>
                @endguest
                @auth
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-2 dark:hover:bg-white/10 hover:bg-gray-200 rounded-xl">Log out</button>
                </form>
                @endauth
            </div>
        </nav>

        <main class="max-w-[90% ] mx-auto pb-10">
            {{ $slot }}
        </main>
    </div>


    <script>
        lucide.createIcons();
    </script>
</body>

</html>