<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Bags & Accessories',
                'slug' => 'bags',
                'description' => 'Handwoven bags, baskets, and accessories made by local artisans',
                'is_active' => true,
            ],
            [
                'name' => 'Honey & Food',
                'slug' => 'honey',
                'description' => 'Pure organic honey and food products from local producers',
                'is_active' => true,
            ],
            [
                'name' => 'Pottery & Crafts',
                'slug' => 'pottery',
                'description' => 'Traditional pottery and ceramic crafts with authentic designs',
                'is_active' => true,
            ],
            [
                'name' => 'Beauty Products',
                'slug' => 'beauty',
                'description' => 'Natural beauty products made from local ingredients',
                'is_active' => true,
            ],
            [
                'name' => 'Art & Portraits',
                'slug' => 'art',
                'description' => 'Handcrafted art pieces and portrait frames',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}