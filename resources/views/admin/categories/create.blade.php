<x-admin>
    <h1 class="text-4xl">Create a New Category</h1>
    <x-divider />
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div>
                <label class="block text-sm/6 font-medium dark:text-white/80">Category name</label>
                <x-form-input name="name" type="text" value="{{ old('name') }}" requried />
            </div>

            <div>
                <label for="parent_id" class="block text-sm/6 font-medium dark:text-white/80">Parent Category</label>
                <select name="parent_id" class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="">None</option>
                    <?php
                    $stack = [];
                    foreach ($categories as $category) {
                        $stack[] = $category;
                        while (count($stack) > 0) {
                            $current = array_pop($stack);
                            $indent = str_repeat('&nbsp &nbsp &nbsp', $current->depth) . '└─';
                            echo "<option value='{$current->id}'>{$indent} {$current->name}</option>";
                            foreach ($current->children as $child) {
                                $child->depth = $current->depth + 1;
                                $stack[] = $child;
                            }
                        }
                    }
                    ?>
                </select>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save Changes
                </button>
            </div>
        </form>


    </div>
</x-admin>