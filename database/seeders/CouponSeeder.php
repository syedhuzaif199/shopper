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
                'discount_value' => 1000,
                'coupon_type' => 'user_specific',
                'min_order_amount' => 5000,
                'max_discount_amount' => 1000,
                'expiry_date' => now()->addMonth(),
                'usage_limit' => 50,
                'usage_per_user' => 1,
                'is_active' => true,
            ],
            [
                'code' => 'HELLO',
                'discount_type' => 'percentage',
                'discount_value' => 10,
                'coupon_type' => 'user_specific',
                'min_order_amount' => 199,
                'max_discount_amount' => 1000,
                'expiry_date' => now()->addMonth(),
                'usage_limit' => 100,
                'usage_per_user' => 1,
                'is_active' => true,
            ],
            [
                'code' => 'GIFT',
                'discount_type' => 'fixed',
                'discount_value' => 500,
                'coupon_type' => 'general',
                'min_order_amount' => 1000,
                'max_discount_amount' => 500,
                'expiry_date' => now()->addMonth(),
                'usage_limit' => 50,
                'usage_per_user' => 1,
                'is_active' => true,
            ],
            [
                'code' => 'DISCOUNT',
                'discount_type' => 'percentage',
                'discount_value' => 5,
                'coupon_type' => 'general',
                'min_order_amount' => 99,
                'max_discount_amount' => 500,
                'expiry_date' => now()->addMonth(),
                'usage_limit' => 100,
                'usage_per_user' => 1,
                'is_active' => true,
            ],
            [
                'code' => 'OFFER',
                'discount_type' => 'fixed',
                'discount_value' => 200,
                'coupon_type' => 'general',
                'min_order_amount' => 1000,
                'max_discount_amount' => 200,
                'expiry_date' => now()->addMonth(),
                'usage_limit' => 20,
                'usage_per_user' => 1,
                'is_active' => true,
            ]
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
