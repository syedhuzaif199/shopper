<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $max_children = 2;
        $max_depth = 2;

        $roots = Category::factory(random_int(1, 3))->create();
        foreach ($roots as $root) {
            $queue = [$root];
            while (count($queue) > 0) {
                $next = array_shift($queue);
                if ($next->depth < $max_depth) {
                    $children = Category::factory(random_int(0, $max_children))->create([
                        'parent_id' => $next->id,
                    ]);
                    foreach ($children as $child) {
                        $queue[] = $child;
                    }
                }
            }
        }
    }
}
