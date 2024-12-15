<x-admin>
    <h1 class="text-4xl">Edit Category: {{ $category->name }}</h1>
    <x-divider />
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label class="block text-sm/6 font-medium dark:text-white/80">Category name</label>
                <x-form-input name="name" type="text" value="{{ $category->name }}" requried />
            </div>


            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save Changes
                </button>
            </div>
        </form>


    </div>
</x-admin>