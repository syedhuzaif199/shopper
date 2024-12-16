<x-admin>
    <h1 class="text-4xl">Edit Order</h1>
    <x-divider />
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div>
                <label for="status" class="block text-sm/6 font-medium dark:text-white/80">Order Status</label>
                <select name="status" class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="">Select an option</option>
                    @foreach($status_options as $option)
                    <option value="{{ $option }}" {{ $order->status === $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
                <x-form-error field="status" />
            </div>

            <div>
                <label for="payment_status" class="block text-sm/6 font-medium dark:text-white/80">Payment Status</label>
                <select name="payment_status" class="block w-full rounded-md bg-white/10 px-3 py-3 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="">Select an option</option>
                    @foreach($payment_status_options as $option)
                    <option value="{{ $option }}" {{ $order->payment_status === $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
                <x-form-error field="payment_status" />
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save Changes
                </button>
            </div>
        </form>

    </div>

</x-admin>