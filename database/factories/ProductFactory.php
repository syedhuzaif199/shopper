<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $imagePath = $this->faker->image(public_path('storage/products'), 640, 640, null, false);
        // $imgUrl = 'storage/products/' . $imagePath;
        $imgUrl = $this->faker->imageUrl(640, 640, 'product', true);
        return [
            "name" => $this->faker->word,
            "description" => $this->faker->text(),
            "price" => $this->faker->randomFloat(2, 1, 1000),
            "image" => $imgUrl,
            "stock" => $this->faker->numberBetween(1, 100),
            "gst_perc" => $this->faker->randomFloat(2, 10, 20),
        ];
    }
}
