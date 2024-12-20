<x-layout>
    <div class="fixed popup hidden top-0 left-0 w-[100vw] h-[100vh] bg-black opacity-[70%]">
    </div>
    <div class="fixed popup hidden top-0 left-0 w-[100vw] h-[100vh] flex justify-center items-center">
        <div class=" w-[640px] px-4 py-8 bg-white/10 dark:bg-black flex flex-col items-center text-xl border border-black/50 dark:border-white/20 rounded-lg">
            <div class="flex justify-end w-[100%] mb-2 items-start">
                <button onclick="document.querySelectorAll('.popup').forEach((ele)=> ele.classList.add('hidden'));"><i data-lucide="x"></i></button>
            </div>
            <h2 class="text-4xl">Add a new address</h2>
            <form action="/addresses" method="POST" class="flex flex-col space-y-4 p-2 w-[75%]">
                @csrf
                <x-form-input type="text" value="{{ old('name') }}" name="name" placeholder="Name" required />
                <x-form-input type="text" value="{{ old('email') }}" name="email" placeholder="Email" required />
                <x-form-input type="number" value="{{ old('phone') }}" name="phone" placeholder="Phone" required />
                <x-form-input type="text" value="{{ old('address') }}" name="address" placeholder="Address" required />
                <x-form-input type="text" value="{{ old('city') }}" name="city" placeholder="City" required />
                <x-form-input type="text" value="{{ old('state') }}" name="state" placeholder="State" required />
                <x-form-input type="text" value="{{ old('pincode') }}" name="pincode" placeholder="Pincode" required />
                <x-form-input type="text" value="{{ old('country') }}" name="country" placeholder="Country" required />
                <select name="type" id="type" class="block w-full rounded-md bg-white/10 px-3 py-2.5 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/" required>
                    <option value="home">Home</option>
                    <option value="office">Office</option>
                    <option value="other">Other</option>
                </select>
                <x-form-error field="type" />
                <span class="items-center">
                    <input type="checkbox" name="is_default" id="is_default" class="w-6 h-6 mr-2" />
                    <label for="is_default">Set as default address</label>
                </span>
                <button type="submit" class="flex justify-center px-3 py-2 bg-indigo-600 hover:bg-indigo-500 rounded">
                    Add Address
                </button>
            </form>

        </div>
    </div>

    <h1 class="text-4xl">Checkout</h1>
    <div>
        <form id="checkout-form" action="/checkout" method="POST">
            @csrf
            <div class="border mt-8 border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
                <h1 class="text-2xl">Select a delivery Address</h1>
                <x-form-error field="customer_address_id" />
                <div class="space-y-4">

                    @foreach($addresses as $address)
                    <div class="flex items-center border {{ $address->is_default ? 'bg-green-600 address-select' : '' }} border-black/50 dark:border-white/20 p-2">
                        <input type="radio" form="checkout-form" name="customer_address_id"
                            id="address-{{ $address->id }}"
                            value="{{ $address->id }}"
                            class="w-6 h-6"
                            {{ $address->is_default ? 'checked' : '' }} required>

                        <label for="address-{{ $address->id }}" class="ml-4 w-full">
                            {{ $address->name}}<br>
                            {{ $address->address}}<br>
                            {{ $address->city}},
                            {{ $address->state}}<br>
                            {{ $address->pincode}}<br>
                            {{ $address->country}}
                        </label>
                    </div>
                    @endforeach
                    <button class="flex px-3 py-2 bg-indigo-600 hover:bg-indigo-500 rounded" onclick="document.querySelectorAll('.popup').forEach((ele)=> ele.classList.remove('hidden'));">
                        <i data-lucide="plus"></i>
                        Add a new address
                    </button>

                </div>
            </div>
            <div class=" border mt-8 border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
                <h1 class="text-2xl">Payment Method</h1>
                <div class="flex items-center border border-black/50 dark:border-white/20 h-20 p-2">
                    <input type="radio" form="checkout-form" id="cash" name="payment_method"
                        value="cash"
                        class="w-6 h-6"
                        required>

                    <label for="cash" class="ml-4 w-full">
                        Cash on delivery
                    </label>
                </div>
                <div class="flex items-center border border-black/50 dark:border-white/20 p-2">
                    <input type="radio" form="checkout-form" id="paypal" name="payment_method"
                        value="paypal"
                        class="w-6 h-6">

                    <label for="paypal" class="ml-4 w-full">
                        <img src="https://www.paypalobjects.com/digitalassets/c/website/logo/full-text/pp_fc_hl.svg" alt="PayPal" class="h-12 p-4 bg-black" />
                    </label>
                </div>
            </div>
            <div class="border mt-8 border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
                <h1 class="text-2xl">Review Items and delivery</h1>
                @foreach($carts as $item)
                <div class="flex items-center border border-black/50 dark:border-white/20 p-2">
                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="h-20 w-20 p-2 bg-white" />
                    <div class="ml-4 w-full">
                        <h2 class="text-xl">{{ $item->product->name }}</h2>
                        <p class="text-gray-500">{{ $item->quantity }} x ${{ $item->product->price }}</p>
                    </div>
                    <p class="text-xl">${{ $item->quantity * $item->product->price }}</p>
                </div>
                @endforeach
                <div class="flex flex-col items-end space-y-4">
                    <p class="text-2xl mr-2">
                        Sub-total ({{ $carts->sum(function ($item) {return $item->quantity;} ) }} items): <strong>${{ $carts->sum(function ($item) {
                        return $item->product->price * $item->quantity;
                    }) }}</strong>
                    </p>
                    <p class="text-2xl mr-2">
                        Discount: <strong>- ${{ $carts->sum(function ($item) {
                        return $item->product->price * $item->quantity * $item->product->discount_perc/100;
                    }) }}</strong>
                    </p>
                    <p class="text-2xl mr-2">
                        Total: <strong>${{ $carts->sum(function ($item) {
                        return $item->product->price * $item->quantity * (1- $item->product->discount_perc/100);
                    }) }}</strong>
                    </p>
                    <p class="text-2xl mt-4 mr-2">
                        GST: <strong>+ ${{ $carts->sum(function ($item) {
                            return $item->product->price * $item->quantity * (1 - $item->product->discount_perc/100) * $item->product->gst_perc/100;
                    }) }}</strong>
                    </p>
                    <p class="text-2xl mt-4 mr-2">
                        Grand Total: <strong>${{ $carts->sum(function ($item) {
                        return $item->product->price * $item->quantity * (1 - $item->product->discount_perc / 100) * (1 + $item->product->gst_perc/100);
                    }) }}</strong>
                    </p>
                </div>
            </div>

            <div class="flex justify-between items-center border mt-8 border-black/50 dark:border-white/20 rounded-xl p-10">
                <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Place Order
                </button>
                <p class="text-2xl">
                    You Pay: <strong>${{ $carts->sum(function ($item) {
                        return $item->product->price * $item->quantity * (1 - $item->product->discount_perc / 100) * (1 + $item->product->gst_perc/100);
                    }) }}</strong>
                </p>
            </div>
        </form>

</x-layout>