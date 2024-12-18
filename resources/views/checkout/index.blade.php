<x-layout>
    <h1 class="text-4xl">Checkout</h1>
    <div>
        <div class="border mt-8 border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
            <h1 class="text-2xl">Select a delivery Address</h1>
            <div class="space-y-4">
                @foreach($addresses as $address)
                <div class="flex items-center border border-black/50 dark:border-white/20 p-2" onclick="const a = document.getElementById('address-{{ $address->id }}'); document.querySelectorAll('.address-select').forEach((ele)=>{ele.classList.remove('bg-indigo-600'); ele.classList.remove('address-select')}); this.classList.toggle('bg-indigo-600'); this.classList.toggle('address-select'); console.log('address-{{ $address->id }}');">
                    <input type="radio" name="address"
                        id="address-{{ $address->id }}"
                        value="{{ $address->id }}"
                        class="w-6 h-6" />
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
                            <x-form-input type="text" value="{{ old('name') }}" name="name" placeholder="Name" />
                            <x-form-input type="text" value="{{ old('email') }}" name="email" placeholder="Email" />
                            <x-form-input type="number" value="{{ old('phone') }}" name="phone" placeholder="Phone" />
                            <x-form-input type="text" value="{{ old('address') }}" name="address" placeholder="Address" />
                            <x-form-input type="text" value="{{ old('city') }}" name="city" placeholder="City" />
                            <x-form-input type="text" value="{{ old('state') }}" name="state" placeholder="State" />
                            <x-form-input type="text" value="{{ old('pincode') }}" name="pincode" placeholder="Pincode" />
                            <x-form-input type="text" value="{{ old('country') }}" name="country" placeholder="Country" />
                            <select name="type" id="type" class="block w-full rounded-md bg-white/10 px-3 py-2.5 text-base text-gray-900 dark:text-white/80 outline outline-1 -outline-offset-1 dark:outline-white/20 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/">
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
            </div>
        </div>
        <div class=" border mt-8 border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
            <h1 class="text-2xl">Payment Method</h1>
        </div>
        <div class="border mt-8 border-black/50 dark:border-white/20 rounded-xl p-10 space-y-10">
            <h1 class="text-2xl">Review Items and delivery</h1>
        </div>
    </div>

</x-layout>