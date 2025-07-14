<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        Product::insert([
            [
                'name'        => 'Smartphone',
                'slug'        => 'smartphone',
                'description' => 'Latest model smartphone.',
                'price'       => 29999,
                'category_id' => $categories->where('slug', 'electronics')->first()?->id,
            ],
            [
                'name'        => 'Macbook',
                'slug'        => 'macbook',
                'description' => 'best macbook',
                'price'       => 4999,
                'category_id' => $categories->where('slug', 'electronics')->first()?->id,
            ],
            [
                'name'        => 'T-shirt',
                'slug'        => 't-shirt',
                'description' => 'Comfortable cotton t-shirt.',
                'price'       => 1999,
                'category_id' => $categories->where('slug', 'clothing')->first()?->id,
            ],
        ]);
    }
}
