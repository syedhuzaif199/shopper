<x-admin>
    <div>
        <div class="flex justify-between items-center">
            <h1 class=text-4xl>Orders</h1>
            @if(session('success'))
            <div class="text-red-500">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <x-divider />
        <div>
            <table class="admin-view-table">
                <thead>
                    <tr class>
                        <th class="text-left">ID</th>
                        <th class="text-left">User ID</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Payment Method</th>
                        <th class="text-left">Payment ID</th>
                        <th class="text-left">Payment Status</th>
                        <th class="text-left">Total Price</th>
                        <th class="text-left">Customer Address ID</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id}}</td>
                        <td class="{{$status_colors[$order->status] }}">{{ $order->status}}</td>
                        <td>{{ $order->payment_method}}</td>
                        <td>{{ $order->payment_id}}</td>
                        <td class="{{ $payment_status_colors[$order->payment_status] }}">{{ $order->payment_status}}</td>
                        <td>{{ $order->total_price}}</td>
                        <td>{{ $order->customer_address_id}}</td>
                        <td>
                            <div class="flex gap-4 justify-end m-8">
                                <a href="{{ route('admin.orders.show', $order->id) }}">
                                    <button class="ml-2 text-green-500 hover:text-gray-700" title="View Order">
                                        <i data-lucide="eye"></i>
                                    </button>
                                </a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}">
                                    <button class="ml-2 text-gray-500 hover:text-gray-700" title="Edit Order">

                                        <i data-lucide="edit"></i>
                                    </button>
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-purple-600 hover:text-purple-800" title="Archive Order">
                                        <i data-lucide="archive"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($orders->isEmpty())
            <div class="text-2xl text-gray-500 mt-4">
                Nothing to show here!
            </div>
            @endif
            <x-divider />

            {{ $orders->links() }}
        </div>
    </div>
</x-admin>