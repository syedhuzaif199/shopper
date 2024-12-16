<x-admin>
    <h1 class="text-4xl">Edit Product: {{ $product->name }}</h1>
    <x-divider />
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <label class="block text-sm/6 font-medium dark:text-white/80">Product Name</label>
                <x-form-input name="name" type="text" value="{{ $product->name }}" requried />
            </div>

            <div>
                <label for="category_id" class="block text-sm/6 font-medium dark:text-white/80">Product Category</label>
                <select name="category_id" class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="">None</option>
                    <?php
                    $stack = [];
                    foreach ($categories as $category) {
                        $stack[] = $category;
                        while (count($stack) > 0) {
                            $current = array_pop($stack);
                            $indent = str_repeat('&nbsp &nbsp &nbsp', $current->depth) . '└─';
                            $attribs = $product->category_id === $current->id ? 'selected' : '';
                            echo "<option value='{$current->id}' {$attribs}>{$indent} {$current->name}</option>";
                            foreach ($current->children as $child) {
                                $child->depth = $current->depth + 1;
                                $stack[] = $child;
                            }
                        }
                    }
                    ?>
                </select>
                <x-form-error field="category_id" />
            </div>
            <div>
                <label for="price" class="block text-sm/6 font-medium dark:text-white/80">Price</label>
                <x-form-input name="price" value="{{ $product->price }}" type="number" step="0.01" required />
            </div>

            <div>
                <label for="stock" class="block text-sm/6 font-medium dark:text-white/80">Stock</label>
                <x-form-input name="stock" value="{{ $product->stock}}" type="number" required />
            </div>

            <div>
                <label for="gst_perc" class="block text-sm/6 font-medium dark:text-white/80">GST (in percents)</label>
                <x-form-input name="gst_perc" value="{{ $product->gst_perc}}" type="number" step="0.01" required />
            </div>

            <div>
                <label for="description" class="block text-sm/6 font-medium dark:text-white/80">Product Description</label>
                <textarea name="description" required class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ $product->description }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm/6 font-medium dark:text-white/80">Product Image</label>
                <x-form-input name="image" type="file" value="{{ old('image') }}" />
            </div>


            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save Changes
                </button>
            </div>
        </form>


    </div>

</x-admin>