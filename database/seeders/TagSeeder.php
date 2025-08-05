<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'tag_name' => 'PHP',
            'slug' => 'php',
            'description' => 'PHP related content'
        ]);

        Tag::create([
            'tag_name' => 'Laravel',
            'slug' => 'laravel',
            'description' => 'Laravel framework content'
        ]);

        Tag::create([
            'tag_name' => 'JavaScript',
            'slug' => 'javascript',
            'description' => 'JavaScript programming content'
        ]);

        Tag::create([
            'tag_name' => 'Tutorial',
            'slug' => 'tutorial',
            'description' => 'Tutorial and how-to content'
        ]);
    }
}
