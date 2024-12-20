<x-admin>
    <section>
        <div class="flex justify-between items-center">
            <h1 class=text-4xl>Coupons</h1>
            @if(session('success'))
            <div class="text-red-500">
                {{ session('success') }}
            </div>
            @endif
            <div>
                <a href="{{ route('admin.coupons.create') }}">
                    <button class="bg-indigo-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg" title="Create Coupon">
                        Create Coupon
                    </button>
                </a>
            </div>
        </div>

        <x-divider />

        <div>
            @if($coupons->isNotEmpty())
            <table class="admin-view-table">
                <thead>
                    <tr class>
                        <th class="text-left">ID</th>
                        <th class="text-left">Code</th>
                        <th class="text-left">Discount</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $coupon)
                    <tr class="">
                        <td>
                            {{ $coupon->id }}
                        </td>
                        <td>
                            {{ $coupon->code }}
                        </td>
                        <td>{{ $coupon->discount }}%</td>
                        <td>
                            <div class="flex gap-4 justify-end m-8">
                                <a href="{{ route('admin.coupons.show', $coupon->id) }}">
                                    <button class="ml-2 text-green-500 hover:text-gray-700" title="View Coupon">
                                        <i data-lucide="eye"></i>
                                    </button>
                                </a>
                                <a href="{{ route('admin.coupons.edit', $coupon->id) }}">
                                    <button class="ml-2 text-blue-500 hover:text-blue-700" title="Edit Coupon">
                                        <i data-lucide="pencil"></i>
                                    </button>
                                </a>
                                <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-2 text-red-500 hover:text-red-700" title="Delete Coupon">
                                        <i data-lucide="trash"></i>
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

            {{ $coupons->links() }}

        </div>


    </section>
</x-admin>