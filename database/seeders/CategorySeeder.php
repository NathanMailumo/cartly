<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'categoryname' => 'Electronics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Clothing & Apparel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Home & Garden',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Books & Media',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Sports & Outdoors',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Health & Beauty',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Toys & Games',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Art & Crafts',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Furniture',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoryname' => 'Collectibles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
