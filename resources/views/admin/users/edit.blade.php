<x-admin>
    <h1 class="text-4xl">Edit User: {{ $user->username}}</h1>
    <x-divider />
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label class="block text-sm/6 font-medium dark:text-white/80">User Role</label>
                <select name="role" class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" type="text" value="{{ $user->role}}" requried>
                    <option value="employee" {{$user->role === 'employee' ? 'selected' : ''}}>Employee</option>
                    <option value="customer" {{$user->role === 'customer' ? 'selected' : ''}}>Customer</option>

                </select>
                <x-form-error field="role" />
            </div>


            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save Changes
                </button>
            </div>
        </form>


    </div>

</x-admin>