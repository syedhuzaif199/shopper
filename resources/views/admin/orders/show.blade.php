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
                <h1 class="text-2xl mb-4">Coupon ID:</h1>
                @if($order->coupon_id)
                <p class="text-xl {{ route('admin.coupons.show', $order->coupon_id) }}">{{ $order->coupon_id}}</p>
                @else
                <p class="text-xl">None</p>
                @endif
            </div>
            <x-divider />

            <div>
                <h1 class="text-2xl mb-4">Total Price:</h1>
                <p class="text-xl">${{ $order->total_price}}</p>
            </div>
            <x-divider />

            <div>
                @if($order->customerAddress)
                <!-- 'ord-' prepended to $order->id to uniquely identify elements related to order items -->
                <div class=" flex items-center" onclick="toggleCollapsible('ord-{{ $order->id }}')">
                    <span class="hidden" id="chev-down-ord-{{ $order->id }}">
                        <i data-lucide="chevron-down"></i>
                    </span>
                    <span id="chev-right-ord-{{ $order->id }}">
                        <i data-lucide="chevron-right"></i>
                    </span>
                    <span class="text-2xl">Customer Address Details</span>

                </div>
                <div id="ord-{{ $order->id }}" class=" hidden space-y-4 border bg-white/5 rounded border-white/20 p-4 mt-8">
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

                    <h2 class="text-xl font-bold">Pincode:</h2>
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

            <div>
                <!-- 'ord-prod-' prepended to $order->id to uniquely identify elements related to order table items -->
                <div class="flex items-center" onclick="toggleCollapsible('ord-prod-{{ $order->id }}')">
                    <span class="hidden" id="chev-down-ord-prod-{{ $order->id }}">
                        <i data-lucide="chevron-down"></i>
                    </span>
                    <span id="chev-right-ord-prod-{{ $order->id }}">
                        <i data-lucide="chevron-right"></i>
                    </span>
                    <span class="text-2xl">Ordered Products</span>

                </div>
                <div id="ord-prod-{{ $order->id }}" class="hidden p-4 mt-8">
                    <table class="admin-view-table">
                        <thead>
                            <tr>
                                <th class="text-left">Product ID</th>
                                <th class="text-left">Product Name</th>
                                <th class="text-left">Quantity</th>
                                <th class="text-left">Price per item</th>
                                <th class="text-left">Discount</th>
                                <th class="text-left">Total Price</th>
                                <th class="text-left">GST</th>
                                <th class="text-left">Grand Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->id}}</td>
                                <td>{{ $product->name}}</td>
                                <td>{{ $product->pivot->quantity}}</td>
                                <td>${{ $product->pivot->price}}</td>
                                <td>{{ $product->pivot->discount_perc}}%</td>
                                <td>${{ $product->pivot->price * $product->pivot->quantity * (1-$product->pivot->discount_perc / 100) }}</td>
                                <td>{{ $product->pivot->gst_perc}}%</td>
                                <td>${{ $product->pivot->price * $product->pivot->quantity * (1-$product->pivot->discount_perc / 100) * (1 + $product->pivot->gst_perc / 100) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <x-divider />

            <div>
                <div class="flex items-center" onclick="toggleCollapsible('payment-{{ $order->id }}')">
                    <span class="hidden" id="chev-down-payment-{{ $order->id }}">
                        <i data-lucide="chevron-down"></i>
                    </span>
                    <span id="chev-right-payment-{{ $order->id }}">
                        <i data-lucide="chevron-right"></i>
                    </span>
                    <span class="text-2xl">Payment Details</span>

                </div>
                <div id="payment-{{ $order->id }}" class="hidden space-y-4 border bg-white/5 rounded border-white/20 p-4 mt-8">
                    <h2 class="text-xl font-bold">ID:</h2>
                    <p class="text-xl">{{ $order->payment->id}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Payment ID:</h2>
                    <p class="text-xl">{{ $order->payment->payment_id ?? 'None'}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Payment Method:</h2>
                    <p class="text-xl">{{ $order->payment->payment_method}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Payment Status:</h2>
                    <p class="text-xl">{{ $order->payment->payment_status}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Payment Amount:</h2>
                    <p class="text-xl">{{ $order->payment->payment_amount}}</p>
                    <x-divider />

                    <h2 class="text-xl font-bold">Payment Currency:</h2>
                    <p class="text-xl">{{ $order->payment->payment_currency}}</p>
                    <x-divider />
                </div>
            </div>
        </div>
        <x-divider />

        <div class="flex justify-end gap-4 items-center">
            <x-form-error field='archived' />

            <a href="{{ route('admin.orders.edit', $order->id) }}">
                <button class="ml-2 text-gray-500 hover:text-gray-700">

                    <i data-lucide="edit"></i>
                </button>
            </a>
            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="text-purple-600 hover:text-purple-800">
                    <input type="hidden" name="archived" value="1">
                    <i data-lucide="archive"></i>
                </button>
            </form>
        </div>
    </div>
    </div>
</x-admin>