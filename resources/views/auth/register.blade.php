<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight dark:text-white/80">Register a new account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/register" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm/6 font-medium dark:text-white/80">Email address</label>
                    <x-form-input name="email" type="email" value="{{ old('email') }}" autocomplete="email" required />
                    <!-- <div class="mt-2">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <x-form-error field="email" />
                    </div> -->
                </div>

                <div>
                    <label for="username" class="block text-sm/6 font-medium dark:text-white/80">Username</label>
                    <x-form-input name="username" type="username" value="{{ old('username') }}" autocomplete="username" />
                    <!-- <div class="mt-2">
                        <input type="username" name="username" id="username" value="{{ old('username') }}" autocomplete="username" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <x-form-error field="username" />
                    </div> -->
                </div>

                <div>
                    <label for="password" class="block text-sm/6 font-medium dark:text-white/80">Password</label>
                    <x-form-input name="password" type="password" autocomplete="current-password" required />
                    <!-- <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <x-form-error field="password" />
                    </div> -->
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm/6 font-medium dark:text-white/80">Confirm Password</label>
                    <x-form-input name="password_confirmation" type="password" autocomplete="current-password" required />
                    <!-- <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <x-form-error field="password_confirmation" />
                    </div> -->
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Sign up
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 dark:text-white/80">
                Already a member?
                <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Log In</a>
            </p>
        </div>
    </div>
</x-layout>