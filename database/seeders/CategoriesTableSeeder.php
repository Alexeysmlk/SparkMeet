<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Music', 'icon_path' => '/images/category-icons/icon-1.png'],
            ['name' => 'Classics', 'icon_path' => '/images/category-icons/icon-2.png'],
            ['name' => 'Comedy', 'icon_path' => '/images/category-icons/icon-3.png'],
            ['name' => 'Crafts', 'icon_path' => '/images/category-icons/icon-4.png'],
            ['name' => 'Dance', 'icon_path' => '/images/category-icons/icon-5.png'],
            ['name' => 'Drinks', 'icon_path' => '/images/category-icons/icon-6.png'],
            ['name' => 'Fitness & Workout', 'icon_path' => '/images/category-icons/icon-7.png'],
            ['name' => 'Foods', 'icon_path' => '/images/category-icons/icon-8.png'],
            ['name' => 'Games', 'icon_path' => '/images/category-icons/icon-9.png'],
            ['name' => 'Gardening', 'icon_path' => '/images/category-icons/icon-10.png'],
            ['name' => 'Health & Medical', 'icon_path' => '/images/category-icons/icon-11.png'],
            ['name' => 'Healthy living and self-care', 'icon_path' => '/images/category-icons/icon-12.png'],
            ['name' => 'Home and garden', 'icon_path' => '/images/category-icons/icon-13.png'],
            ['name' => 'Music and radio', 'icon_path' => '/images/category-icons/icon-14.png'],
            ['name' => 'Parties', 'icon_path' => '/images/category-icons/icon-15.png'],
            ['name' => 'Professional Networking', 'icon_path' => '/images/category-icons/icon-16.png'],
            ['name' => 'Religions', 'icon_path' => '/images/category-icons/icon-17.png'],
            ['name' => 'Shopping', 'icon_path' => '/images/category-icons/icon-18.png'],
            ['name' => 'Social Issues', 'icon_path' => '/images/category-icons/icon-19.png'],
            ['name' => 'Sports', 'icon_path' => '/images/category-icons/icon-20.png'],
            ['name' => 'Theatre', 'icon_path' => '/images/category-icons/icon-21.png'],
            ['name' => 'TV and films', 'icon_path' => '/images/category-icons/icon-22.png'],
            ['name' => 'Visual arts', 'icon_path' => '/images/category-icons/icon-23.png'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'icon_path' => $category['icon_path']
            ]);
        }
    }
}
