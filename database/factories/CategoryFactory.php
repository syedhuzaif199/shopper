<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $categories = [
        //     "Electronics",
        //     "Clothing",
        //     "Books",
        //     "Toys",
        //     "Furniture",
        //     "Food",
        //     "Tools",
        //     "Sporting Goods",
        //     "Automotive",
        //     "Jewelry",
        // ];

        return [
            "name" => $this->faker->word,
        ];
    }
}
