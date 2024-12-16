<x-admin>
    <div>
        <h1 class=text-4xl>Order</h1>
        <x-divider />
        <div class="border border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
            <div>
                <h1 class="text-2xl mb-4">Order ID:</h1>
                <p class="text-xl">{{ $order->id }}</p>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">User ID:</h1>
                <a href="{{ route('admin.users.show', $order->user_id) }}" class="border border-white/10 hover:bg-white/10 px-4 py-2 text-xl">{{ $order->user_id}}</a>
            </div>
            <x-divider />
            <div>
                <h1 class="text-2xl mb-4">Order Status:</h1>
                <p class="text-xl {{ $status_colors[$order->status] }}">{{$order->status}}</p>
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Payment Method:</h1>
                <p class="text-xl">{{$order->payment_method}}</p>
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Payment ID:</h1>
                <p class="text-xl">{{$order->payment_id}}</p>
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Payment Status:</h1>
                <p class="text-xl {{ $payment_status_colors[$order->payment_status] }}">{{$order->payment_status}}</p>
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Total Price:</h1>
                <p class="text-xl">${{ $order->total_price}}</p>
            </div>
            <x-divider />

            <div>
                @if($order->customerAddress)
                <h1 class="text-2xl mb-4">Customer Address Details:</h1>
                <div class="space-y-4 border rounded border-white/20 p-4 mt-8">
                    <h2 class="text-xl font-bold">Customer Address ID:</h2>
                    <p class="text-xl">{{ $order->customer_address_id}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Address:</h2>
                    <p class="text-xl">{{ $order->customerAddress->address}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">City:</h2>
                    <p class="text-xl">{{ $order->customerAddress->city}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">State:</h2>
                    <p class="text-xl">{{ $order->customerAddress->state}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Country:</h2>
                    <p class="text-xl">{{ $order->customerAddress->country}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Zip:</h2>
                    <p class="text-xl">{{ $order->customerAddress->pincode}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Address Type:</h2>
                    <p class="text-xl">{{ $order->customerAddress->type}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Phone:</h2>
                    <p class="text-xl">{{ $order->customerAddress->phone}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Email:</h2>
                    <p class="text-xl">{{ $order->customerAddress->email}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Company</h2>
                    <p class="text-xl">{{ $order->customerAddress->company ?? 'None'}}</p>
                </div>
                @else
                <h1 class="text-2xl mb-4">Not found</h1>
                @endif
            </div>
            <x-divider />

            <div class="flex justify-end gap-4 items-center">

                <a href="{{ route('admin.orders.edit', $order->id) }}">
                    <button class="ml-2 text-gray-500 hover:text-gray-700">

                        <i data-lucide="edit"></i>
                    </button>
                </a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <i data-lucide="trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin>