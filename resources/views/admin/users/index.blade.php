<x-admin>
    <div>
        <h1 class=text-4xl>Users</h1>
        @if(session('success'))
        <div class="text-red-500">
            {{ session('success') }}
        </div>
        @endif
        <x-divider />

        @if($users->isEmpty())
        <div class="text-2xl text-gray-500">
            No users found
        </div>
        @else
        <div>
            <table class="admin-view-table">
                <thead>
                    <tr class>
                        <th class="text-left">ID</th>
                        <th class="text-left">Username</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">Role</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="">
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="flex gap-4 justify-end m-8">
                                <a href="{{ route('admin.users.show', $user->id) }}">
                                    <button class="ml-2 text-green-500 hover:text-gray-700" title="View User">
                                        <i data-lucide="eye"></i>
                                    </button>
                                </a>
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <x-divider />
        {{ $users->links() }}
    </div>
</x-admin>