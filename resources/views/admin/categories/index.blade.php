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
                    <button class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        Create Category
                    </button>
                </a>
            </div>
        </div>
        <x-divider />

        <div>
            <i data-lucide="x"></i>
        </div>

        <div class="ml-2.5">
            @foreach ($categories as $category)
            <x-category :category="$category"></x-category>
            @endforeach
        </div>
    </div>
</x-admin>