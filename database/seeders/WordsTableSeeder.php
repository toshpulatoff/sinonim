<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Word;
use App\Models\Letter;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class WordsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            $title = $faker->unique()->word;
            $slug = Str::slug($title);   

            if (!Word::where('title', $title)->exists()) {
                Word::create([
                    'title' => $title,
                    'slug' => $slug,
                    'requests_count' => $faker->numberBetween(0, 100),
                    'status' => $faker->boolean(),
                    'letter_id' => Letter::inRandomOrder()->first()->id
                ]);
            }
        }
    }
}
