<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'declined', 'canceled', 'refunded', 'failed']),
            'payment_method' => $this->faker->randomElement(['cash', 'credit_card', 'paypal', 'stripe']),
            'payment_id' => $this->faker->uuid,
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
            'total_price' => $this->faker->randomFloat(2, 1, 1000),

        ];
    }
}
