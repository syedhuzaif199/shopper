<x-admin>
    <div>
        <h1 class=text-4xl>User</h1>
        <x-divider />
        <div class="border border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
            <div>
                <h1 class="text-2xl mb-4">User ID:</h1>
                <p class="text-xl">{{ $user->id }}</p>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">Username:</h1>
                <p class="text-xl">{{ $user->username}}</p>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">Email:</h1>
                <p class="text-xl">{{ $user->email}}</p>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">Role:</h1>
                <p class="text-xl">{{ $user->role }}</p>
            </div>
            <x-divider />




            <div class="flex justify-end gap-4 items-center">

                <a href="{{ route('admin.users.edit', $user->id) }}">
                    <button class="ml-2 text-gray-500 hover:text-gray-700" title="Edit User">

                        <i data-lucide="edit"></i>
                    </button>
                </a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700" title="Delete User">
                        <i data-lucide="trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin>