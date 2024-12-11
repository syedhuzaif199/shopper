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
            <table class="admin-view-table">
                <thead>
                    <tr class>
                        <th class="text-left">ID</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="">
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="flex gap-4 justify-end m-8">
                                <a href="{{ route('admin.categories.show', $category->id) }}">
                                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
                                        View
                                    </button>
                                </a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}">
                                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xl bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        <i data-lucide="trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
</x-admin>