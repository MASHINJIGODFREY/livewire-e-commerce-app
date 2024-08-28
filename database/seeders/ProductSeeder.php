<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Faker;

class ProductSeeder extends Seeder
{
    private function generateUniqueProductName($faker)
    {
        // Combine different Faker methods to create a unique product name
        $adjective = $faker->word;
        $noun = $faker->word;
        $number = $faker->numberBetween(1, 100);

        return ucfirst($adjective) . ' ' . ucfirst($noun) . ' ' . $number;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create(); 
        
        $images = [
            'assets/imgs/shop/category-thumb-6.jpg',
            'assets/imgs/shop/category-thumb-2.jpg',
            'assets/imgs/shop/category-thumb-4.jpg'
        ];

        $sizes = ['XL','S','L','XXL','M'];

        $colors = ['red','yellow','white','orange','cyan','green','purple'];

        foreach(range(1, 100) as $key => $value){
            $name = $this->generateUniqueProductName($faker);
            Product::create([
                "name" => $name,
                "slug" => Str::slug($name, "."),
                "short_description" => $faker->text(100),
                "long_description" => $faker->text(250),
                "regular_price" => $faker->numberBetween(100, 500),
                "sale_price" => $faker->numberBetween(50, 300),
                "image" => $images[rand(0, 2)],
                "images" => json_encode($images),
                "size" => json_encode($sizes),
                "color" => json_encode($colors),
                "category_id" => rand(1, 11)
            ]);
        }
    }
}
