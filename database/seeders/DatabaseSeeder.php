<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
        $categories = Category::factory(7)->create();
        User::create([
            'username' => 'admin',
            'email' => 'admin@shopper.com',
            'password' => 'password',
            'role' => 'admin',
        ]);
        User::factory(100)->create();
    }
}
