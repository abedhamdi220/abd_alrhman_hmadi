<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $parent1 = Category::create(['name' => 'Technology']);
        $parent2 = Category::create(['name' => 'Home Services']);

        Category::create(['name' => 'Web Development', 'parent_id' => $parent1->id]);
        Category::create(['name' => 'Mobile Development', 'parent_id' => $parent1->id]);
        Category::create(['name' => 'Plumbing', 'parent_id' => $parent2->id]);
        Category::create(['name' => 'Electrical', 'parent_id' => $parent2->id]);
    }
}
