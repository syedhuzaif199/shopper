<x-admin>
    <div>
        <div class="flex justify-between items-center">
            <h1 class=text-4xl>Categories</h1>
            @if(session('success'))
            <div class="text-red-500">
                {{ session('success') }}
            </div>
            @endif
            <div>
                <a href="{{ route('admin.categories.create') }}">
                    <button class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg" title="Create Category">
                        Create Category
                    </button>
                </a>
            </div>
        </div>
        <x-divider />

        @if($categories->isEmpty())
        <div class="text-2xl text-gray-500">
            No categories found
        </div>
        @else
        <div>
            <i data-lucide="x"></i>
        </div>
        @endif

        <div class="ml-2.5">
            @foreach ($categories as $category)
            <x-category :category="$category"></x-category>
            @endforeach
        </div>
    </div>
</x-admin>