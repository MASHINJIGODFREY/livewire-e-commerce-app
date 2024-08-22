<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;
use Faker;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create(); 

        $names = [
            "The Retro Studio",
            "A Design Hub",
            "Travel",
            "Mock Up - Rare Restaurant",
            "The Back Yard",
            "Shutter Speed",
        ];

        $images = [
            'assets/imgs/banner/brand-1.png',
            'assets/imgs/banner/brand-2.png',
            'assets/imgs/banner/brand-3.png',
            'assets/imgs/banner/brand-4.png',
            'assets/imgs/banner/brand-5.png',
            'assets/imgs/banner/brand-6.png',
        ];

        foreach(range(1, 6) as $key => $value){
            Brand::create([
                'name' => $names[$key],
                'slug' => Str::slug($names[$key], "."),
                'logo' => $images[$key]
            ]);
        }
    }
}
