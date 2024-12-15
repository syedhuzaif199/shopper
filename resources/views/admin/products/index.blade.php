<x-admin>
    <div>
        <div class="flex justify-between items-center">
            <h1 class=text-4xl>Products</h1>
            @if(session('success'))
            <div class="text-red-500">
                {{ session('success') }}
            </div>
            @endif
            <div>
                <a href="{{ route('admin.products.create') }}">
                    <button class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        Create Product
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
                        <th class="text-left">Image</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Category</th>
                        <th class="text-left">Price</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="">
                        <td>
                            {{ $product->id }}
                        </td>
                        <td class="flex justify-center">
                            <div class="w-[240px] h-[240px] border border-black/50 dark:border-white/20">
                                <img src="{{ $product->image}}" class="aspect-ratio-img p-1" />
                            </div>
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category ? $product->category->name : 'None'}}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <div class="flex gap-4 justify-end m-8">
                                <a href="{{ route('admin.products.show', $product->id) }}">
                                    <button class="ml-2 text-green-500 hover:text-gray-700">
                                        <i data-lucide="eye"></i>
                                    </button>
                                </a>
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($products->isEmpty())
            <div class="text-2xl text-gray-500 mt-4">
                Nothing to show here!
            </div>
            @endif
            <x-divider />

            {{ $products->links() }}
        </div>
    </div>
</x-admin>