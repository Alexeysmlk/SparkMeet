<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Music',
            'Art',
            'Theater',
            'Dance',
            'Food & Drink',
            'Sports & Fitness',
            'Health & Wellness',
            'Science & Technology',
            'Travel & Outdoor',
            'Charity & Causes',
            'Religion & Spirituality',
            'Family & Education',
            'Holiday',
            'Government & Politics',
            'Fashion & Beauty',
            'Business & Professional',
            'Film, Media & Entertainment',
            'Community & Culture',
            'Performing & Visual Arts',
            'Hobbies & Special Interest',
            'Home & Lifestyle',
            'School Activities',
            'Auto, Boat & Air',
            'Real Estate',
            'Science Fiction & Fantasy',
            'Mystery & Crime',
            'Romance',
            'Historical Fiction',
            'Horror & Thriller',
            'LGBTQ+',
            'Poetry & Literature',
            'Comics & Graphic Novels',
            'Spirituality & Religion',
            'Science & Nature',
            'Travel Writing'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag
            ]);
        }
    }
}
