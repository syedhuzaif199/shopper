<x-admin>
    <h1 class="text-4xl">Create a New Product</h1>
    <x-divider />
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block text-sm/6 font-medium dark:text-white/80">Product Name</label>
                <x-form-input name="name" type="text" value="{{ old('name') }}" requried />
            </div>

            <div>
                <label for="category_id" class="block text-sm/6 font-medium dark:text-white/80">Product Category</label>
                <select name="category_id" required class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="price" class="block text-sm/6 font-medium dark:text-white/80">Price</label>
                <x-form-input name="price" value="{{ old('price') }}" type="number" step="0.01" required />
            </div>

            <div>
                <label for="description" class="block text-sm/6 font-medium dark:text-white/80">Product Description</label>
                <textarea name="description" required class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm/6 font-medium dark:text-white/80">Product Image</label>
                <x-form-input name="image" type="file" value="{{ old('image') }}" required />
            </div>


            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Create
                </button>
            </div>
        </form>


    </div>

</x-admin>