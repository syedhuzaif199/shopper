<x-admin>
    <div>
        <div class="flex justify-between items-center">
            <h1 class=text-4xl>Orders</h1>
            @if(session('success'))
            <div class="text-red-500">
                {{ session('success') }}
            </div>
            @endif
            @error('archived')
            <div class="text-red-500">
                {{ 'Error: ' . $message }}
            </div>
            @enderror
        </div>
        <x-divider />
        <div>
            @if($orders->isNotEmpty())
            <table class="admin-view-table">
                <thead>
                    <tr class>
                        <th class="text-left">ID</th>
                        <th class="text-left">User ID</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Coupon ID</th>
                        <th class="text-left">Total Price</th>
                        <th class="text-left">Customer Address ID</th>
                        <th class="text-left">Archived</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id}}</td>
                        <td class="{{$status_colors[$order->status] }}">{{ $order->status}}</td>
                        <td>{{ $order->coupon_id ?? 'None'}}</td>
                        <td>{{ $order->total_price}}</td>
                        <td>{{ $order->customer_address_id}}</td>
                        <td>{{ $order->archived ? 'Yes' : 'No'}}</td>
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
                                    @method('PATCH')
                                    <button type="submit" class="{{ $order->archived ? 'text-yellow-600 hover:text-yellow-800' : 'text-purple-600 hover:text-purple-800' }}" title="{{ $order->archived ? 'Restore order' : 'Archive Order' }}">
                                        <input type="hidden" name="archived" value="{{ $order->archived ? 0 : 1 }}">
                                        <i data-lucide="{{ $order->archived ? 'archive-restore' : 'archive' }}"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-2xl text-gray-500 mt-4">
                Nothing to show here!
            </div>
            @endif
            <x-divider />

            {{ $orders->links() }}
        </div>
    </div>
</x-admin>