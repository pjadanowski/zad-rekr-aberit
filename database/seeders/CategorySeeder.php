<?php

namespace Database\Seeders;

use App\Models\Category;
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
                'name'        => 'Electronics',
                'slug'        => 'electronics',
                'description' => 'Electronic devices and gadgets.',
            ],
            [
                'name'        => 'Books',
                'slug'        => 'books',
                'description' => 'Books and literature.',
            ],
            [
                'name'        => 'Clothing',
                'slug'        => 'clothing',
                'description' => 'Apparel and accessories.',
            ],
        ]);
    }
}
