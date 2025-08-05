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
        Category::create([
            'category_name' => 'Technology',
            'slug' => 'technology',
            'description' => 'Posts about technology and programming'
        ]);

        Category::create([
            'category_name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'description' => 'Posts about lifestyle and personal experiences'
        ]);

        Category::create([
            'category_name' => 'Education',
            'slug' => 'education',
            'description' => 'Educational content and tutorials'
        ]);
    }
}
