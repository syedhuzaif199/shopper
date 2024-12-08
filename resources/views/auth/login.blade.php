<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight dark:text-white/80">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/login" method="POST">
                @csrf

                <div>
                    <label class="block text-sm/6 font-medium dark:text-white/80">Email address</label>
                    <x-form-input name="email" type="email" value="{{ old('email') }}" requried />
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium dark:text-white/80">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <x-form-input name="password" type="password" autocomplete="current-password" required />
                    <!-- <div class="mt-2">
                        <input type="password" name="password" id="password" value="{{ old('password') }}" autocomplete="current-password" required class="block w-full rounded-md bg-white/10 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <x-form-error field="password" />
                    </div> -->
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 dark:text-white/80">
                Not a member?
                <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign up</a>
            </p>
        </div>
    </div>
</x-layout>