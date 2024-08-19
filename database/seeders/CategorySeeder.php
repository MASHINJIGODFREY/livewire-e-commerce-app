<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'assets/imgs/shop/category-thumb-6.jpg',
            'assets/imgs/shop/category-thumb-2.jpg',
            'assets/imgs/shop/category-thumb-4.jpg'
        ];

        $categories = [
            'Electronic Devices',
            'TV & New Applications',
            'Health & Beauty',
            'Babies & Toys',
            'Groceries & Pets',
            'Home & Lifestyle',
            'Womens Fashion',
            'Mens Fashion',
            'Watches & Accessories',
            'Sports & Outdoor',
            'Automotive & Motorbike'
        ];

        foreach($categories as $key => $value){
            Category::create([
                "name" => $value,
                "slug" => Str::slug($value, "."),
                "image" => $images[rand(0, 2)],
                "status" => rand(0, 1)
            ]);
        }
    }
}
