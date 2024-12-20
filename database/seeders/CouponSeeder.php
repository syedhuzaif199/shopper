<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            [
                'code' => 'WELCOME',
                'discount_type' => 'fixed',
                'value' => 1000,
                'min_order_amount' => 5000,
                'max_discount_amount' => 1000,
                'valid_from' => now(),
                'valid_to' => now()->addMonth(),
                'usage_limit' => 50,
                'usage_per_user' => 1,
            ],
            [
                'code' => 'HELLO',
                'discount_type' => 'percentage',
                'value' => 10,
                'min_order_amount' => 199,
                'max_discount_amount' => 1000,
                'valid_from' => now(),
                'valid_to' => now()->addMonth(),
                'usage_limit' => 100,
                'usage_per_user' => 1,
            ],
            [
                'code' => 'GIFT',
                'discount_type' => 'fixed',
                'value' => 500,
                'min_order_amount' => 1000,
                'max_discount_amount' => 500,
                'valid_from' => now(),
                'valid_to' => now()->addMonth(),
                'usage_limit' => 50,
                'usage_per_user' => 1,
            ],
            [
                'code' => 'DISCOUNT',
                'discount_type' => 'percentage',
                'value' => 5,
                'min_order_amount' => 99,
                'max_discount_amount' => 500,
                'valid_from' => now(),
                'valid_to' => now()->addMonth(),
                'usage_limit' => 100,
                'usage_per_user' => 1,
            ],
            [
                'code' => 'OFFER',
                'discount_type' => 'fixed',
                'value' => 200,
                'min_order_amount' => 1000,
                'max_discount_amount' => 200,
                'valid_from' => now(),
                'valid_to' => now()->addMonth(),
                'usage_limit' => 20,
                'usage_per_user' => 1,
            ]
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
