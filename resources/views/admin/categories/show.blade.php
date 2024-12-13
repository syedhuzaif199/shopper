<x-admin>
    <div>
        <div class="flex justify-between items-center">
            <h1 class=text-4xl>Category</h1>
            <div class="flex justify-end gap-4 items-center">

                <a href="{{ route('admin.products.edit', $category->id) }}">
                    <button class="ml-2 text-gray-500 hover:text-gray-700">

                        <i data-lucide="edit"></i>
                    </button>
                </a>
                <form action="{{ route('admin.products.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <i data-lucide="trash"></i>
                    </button>
                </form>
            </div>
        </div>
        <x-divider />
        <div class="space-y-10 border rounded-xl p-8 max-w-[75%]">
            <div>
                <h1 class="text-2xl mb-4">Category ID:</h1>
                <p class="text-xl">{{ $category->id }}</p>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">Category Name:</h1>
                <p class="text-xl">{{ $category->name }}</p>
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Parent Category:</h1>
                @if($category->parent)
                <a href="{{ route('admin.categories.show', $category->parent->id) }}" class="border border-white/10 hover:bg-white/10 px-4 py-2 text-xl">
                    {{ $category->parent->name }}
                </a>
                @else
                <p class="text-xl">None</p>
                @endif
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Child Categories:</h1>
                @foreach($category->children as $child)
                <a href="{{ route('admin.categories.show', $child->id) }}" class="border border-white/10 hover:bg-white/10 px-4 py-2 text-xl">
                    {{ $child->name}}
                </a>
                @endforeach
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Rooted Subtree</h1>
                <div class="flex items-center mb-4">
                    <i data-lucide="x"></i>
                    <h1 class="text-2xl ml-2">{{$category->name}}</h1>
                </div>
                <div class="ml-2.5">
                    @foreach ($subtree as $child)
                    <x-category :category="$child"></x-category>
                    @endforeach
                </div>
            </div>



        </div>



    </div>
</x-admin>