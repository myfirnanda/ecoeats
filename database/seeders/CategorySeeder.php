<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
/**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "image_name" => "tomato-category.jpeg",
                "name" => "Vegetables",
                "slug" => "vegetables",
            ],
            [
                "image_name" => "fruit-category.jpeg",
                "name" => "Fruits",
                "slug" => "fruits",
            ],
            [
                "image_name" => "meat-category.jpeg",
                "name" => "Meat",
                "slug" => "meat",
            ],
            [
                "image_name" => "seafood-category.jpeg",
                "name" => "Seafood",
                "slug" => "seafood",
            ],
            [
                "image_name" => "milk-category.jpeg",
                "name" => "Milk",
                "slug" => "milks",
            ],
            [
                "image_name" => "baking-category.jpeg",
                "name" => "Baking",
                "slug" => "baking",
            ],
            [
                "image_name" => "drinks-category.jpeg",
                "name" => "Drinks",
                "slug" => "drinks",
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
