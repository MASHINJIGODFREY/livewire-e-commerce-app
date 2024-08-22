<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
use Illuminate\Support\Str;
use Faker;

class SliderSeeder extends Seeder
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
            'assets/imgs/slider/slider-1.png',
            'assets/imgs/slider/slider-2.png',
            'assets/imgs/shop/product-1-1.jpg',
            'assets/imgs/shop/product-2-1.jpg',
            'assets/imgs/shop/product-3-1.jpg',
            'assets/imgs/shop/product-4-1.jpg',
            'assets/imgs/shop/product-5-1.jpg',
            'assets/imgs/shop/product-6-1.jpg',
            'assets/imgs/shop/product-7-1.jpg',
            'assets/imgs/shop/product-8-1.jpg',
            'assets/imgs/shop/product-9-1.jpg',
        ];

        foreach(range(1, 20) as $key => $value){
            $top_title = $this->generateUniqueProductName($faker);
            $title = $this->generateUniqueProductName($faker);
            $sub_title = $this->generateUniqueProductName($faker);
            $startDate = $faker->dateTimeBetween('-30 days', '+30 days');
            $endDate = $faker->dateTimeBetween($startDate, $startDate->modify('+30 days'));
            Slider::create([
                "top_title" => $top_title,
                "slug" => Str::slug($top_title, "."),
                "title" => $title,
                "sub_title" => $sub_title,
                "link" => "link.com",
                "offer" => $faker->numberBetween(10, 50),
                "image" => $images[rand(0, 10)],
                "start_date" => $startDate,
                "end_date" => $endDate,
                "type" => "slider"
            ]);
        }
    }
}
