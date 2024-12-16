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
        $users->each(function ($user) {
            CustomerAddress::factory(random_int(0, 3))->create(['user_id' => $user->id]);
            if ($user->customerAddresses->count() !== 0) {
                Order::factory(random_int(0, 5))->create(['user_id' => $user->id, 'customer_address_id' => $user->customerAddresses->random()->id]);
            }
        });
    }
}
