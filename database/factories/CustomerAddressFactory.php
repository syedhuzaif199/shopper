<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerAddresses>
 */
class CustomerAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "address" => $this->faker->address,
            "city" => $this->faker->city,
            "state" => $this->faker->state,
            "pincode" => $this->faker->postcode,
            "country" => $this->faker->country,
            "phone" => $this->faker->phoneNumber,
            "type" => $this->faker->randomElement(['home', 'office', 'other']),
            "name" => $this->faker->name,
            "email" => $this->faker->email,
            "company" => $this->faker->company,
        ];
    }
}
