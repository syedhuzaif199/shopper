<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Database\Factories\CustomerAddressFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $categories = Category::all();
        $categories->each(function ($category) {
            Product::factory(random_int(0, 10))->create(['category_id' => $category->id]);
        });

        User::create([
            'username' => 'admin',
            'email' => 'admin@shopper.com',
            'password' => 'password',
            'role' => 'admin',
        ]);
        User::factory(100)->create();
        $users = User::all();
        $products = Product::all();
        $users->each(function ($user) use ($products) {
            CustomerAddress::factory(random_int(0, 3))->create(['user_id' => $user->id]);
            if ($user->customerAddresses->count() !== 0) {
                $orders = Order::factory(random_int(0, 5))->create([
                    'user_id' => $user->id,
                    'customer_address_id' => $user->customerAddresses->random()->id
                ]);

                $orders->each(function ($order) use ($products) {
                    $ordered_products = $products->random(random_int(1, 5));
                    $ordered_products->each(function ($product) use ($order) {
                        $discount = random_int(0, 75);
                        $quantity = random_int(1, 5);
                        $total_price = $quantity * $product->price - $quantity * $product->price * $discount / 100;
                        $order->products()->attach(
                            $product->id,
                            [
                                'quantity' => $quantity,
                                'price' => $product->price,
                                'gst_perc' => $product->gst_perc,
                                'total' => $total_price,
                                'discount_perc' => $discount,
                                'grand_total' => $total_price - ($total_price * $discount / 100),

                            ]
                        );
                    });
                });
            }
        });
    }
}
