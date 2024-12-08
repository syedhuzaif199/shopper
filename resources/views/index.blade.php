<x-layout>
    <section class="flex justify-center w-full">
        <div class="flex items-center space-x-4 overflow-x-auto">
            <?php $categories = [
                "Grocery",
                "Electronics",
                "Computers",
                "Fashion",
                "Appliances",
                "Home and Furnishing",
                "Beauty",
                "Toys",
            ] ?>
            @foreach($categories as $category)
            <a href="">
                <div class="w-[160px] h-[160px] p-2 bg-gray-300 hover:bg-gray-400 dark:bg-white/10 dark:hover:bg-white/20 flex justify-center text-center items-center text-xl border border-white/20 rounded-lg">{{ $category }}</div>
            </a>
            @endforeach
        </div>
    </section>

    <x-vertical-bar />
    <section>
        <div class="mt-10 flex items-center">
            <i data-lucide="chevron-right"></i>
            <h1 class="text-2xl pl-2">Featured</h1>
        </div>

        <div class="flex justify-center w-full mt-8">
            <div class="flex items-center space-x-4 overflow-x-auto">
                <?php $featured = [
                    "square-m",
                    "shell",
                    "cookie",
                    "croissant",
                    "cpu",
                    "laptop-minimal",
                    "candy",
                    "candy-cane",
                    "drama",
                    "dribbble",
                    "drill",
                ] ?>

                @foreach($featured as $item)
                <a href="">
                    <div class="w-[240px] h-[240px] bg-gray-300 hover:bg-gray-400 dark:bg-white/10 dark:hover:bg-white/20 flex justify-center items-center text-xl border border-white/20 rounded-lg"><i data-lucide="{{ $item }}" style="width: 32px; height: 32px;"></i> </div>
                </a>
                @endforeach

            </div>
        </div>
    </section>
</x-layout>