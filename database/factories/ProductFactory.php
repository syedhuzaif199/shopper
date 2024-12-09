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
        $products = [
            ['name' => "iPhone", 'img' => '/products/iphone.png'],
            ['name' => "Samsung Galaxy", 'img' => '/products/samsung_galaxy.png'],
            ['name' => "MacBook", 'img' => '/products/macbook.png'],
            ['name' => "Dell XPS", 'img' => '/products/dell_xps.png'],
            ['name' => "Nike Air Max", 'img' => '/products/nike_air_max.png'],
            ['name' => "Adidas Superstar", 'img' => '/products/adidas_superstar.png'],
            ['name' => "Harry Potter", 'img' => '/products/harry_potter.png'],
            ['name' => "The Great Gatsby", 'img' => '/products/the_great_gatsby.png'],
            ['name' => "Lego", 'img' => '/products/lego.png'],
            ['name' => "Barbie", 'img' => '/products/barbie.png'],
            ['name' => "Sofa", 'img' => '/products/sofa.png'],
            ['name' => "Table", 'img' => '/products/table.png'],
            ['name' => "Pizza", 'img' => '/products/pizza.png'],
            ['name' => "Burger", 'img' => '/products/burger.png'],
            ['name' => "Drill", 'img' => '/products/drill.png'],
            ['name' => "Screwdriver", 'img' => '/products/screwdriver.png'],
            ['name' => "Basketball", 'img' => '/products/basketball.png'],
            ['name' => "Football", 'img' => '/products/football.png'],
            ['name' => "Car", 'img' => '/products/car.png'],
            ['name' => "Motorcycle", 'img' => '/products/motorcycle.png'],
            ['name' => "Necklace", 'img' => '/products/necklace.png'],
            ['name' => "Ring", 'img' => '/products/ring.png'],
            ['name' => "Earrings", 'img' => '/products/earrings.png'],
        ];
        $product = $this->faker->unique()->randomElement($products);
        return [
            "name" => $product['name'],
            "description" => $this->faker->text(),
            "price" => $this->faker->randomFloat(2, 1, 1000),
            "img" => $product['img'],
            "category_id" => Category::inRandomOrder()->first()->id,
        ];
    }
}
