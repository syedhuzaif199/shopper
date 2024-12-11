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

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {
            \App\Models\Product::factory(random_int(1, 5))->create([
                "category_id" => $category->id,
            ]);
            // Optionally, create child categories
            if (rand(0, 1)) {
                Category::factory()->count(rand(1, 3))->create()->each(function ($child) use ($category) {
                    $child->appendToNode($category)->save();
                });
            }
        });
    }
}
