<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $provider = User::where('role', 'provider')->first();
        $category = Category::where('name', 'Web Development')->first();

        if ($provider && $category) {
            Service::create([
                'name' => 'Build a Website',
                'description' => 'Professional website development service',
                'price' => 500,
                'status' => 'active',
                'category_id' => $category->id,
                'provider_id' => $provider->id,
            ]);

            Service::create([
                'name' => 'Fix Plumbing Issues',
                'description' => 'Quick plumbing fixes and installations',
                'price' => 150,
                'status' => 'active',
                'category_id' => Category::where('name', 'Plumbing')->first()->id,
                'provider_id' => $provider->id,
            ]);
        }
    }
}
