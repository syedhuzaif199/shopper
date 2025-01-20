<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Coupon;
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

        $this->call(CouponSeeder::class);

        User::create([
            'username' => 'admin',
            'email' => 'admin@shopper.com',
            'password' => 'password',
            'role' => 'admin',
        ]);
        User::factory(100)->create();
        $users = User::all();
        $coupons = Coupon::all();
        $users->each(function ($user) use ($coupons) {
            $user_coupons = $coupons->where('coupon_type', 'user_specific');
            $user->coupons()->attach($user_coupons->random(random_int(0, min(3, $user_coupons->count()))));
        });
        $products = Product::all();
        $products->each(function ($product) use ($coupons) {
            $product->coupons()->attach($coupons->random(random_int(0, min(3, $coupons->count()))));
        });
    }
}
