<x-admin>
    <div class="border border-black/50 dark:border-white/20 rounded-xl p-10">
        <h1 class=text-4xl>Product</h1>
        <x-divider />
        <div class="space-y-10">
            <div>
                <h1 class="text-2xl mb-4">Product ID:</h1>
                <p class="text-xl">{{ $product->id }}</p>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">Product Name:</h1>
                <p class="text-xl">{{ $product->name }}</p>
            </div>
            <div>
                <h1 class="text-2xl mb-4">Product Category:</h1>
                <p class="text-xl">{{ $product->category->name}}</p>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">Product Images</h1>
                <div class="w-[240px] h-[240px]">
                    <img src="{{ asset($product->image) }}" class="aspect-ration-img p-1">
                </div>
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Product Description:</h1>
                <p>{{ $product->description}}</p>
            </div>

            <div class="flex justify-end gap-4 items-center">

                <a href="{{ route('admin.products.edit', $product->id) }}">
                    <button class="ml-2 text-gray-500 hover:text-gray-700">

                        <i data-lucide="edit"></i>
                    </button>
                </a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <i data-lucide="trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin>