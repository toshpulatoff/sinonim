<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Letter;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LettersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $title = strtoupper($faker->randomLetter);
            $slug = Str::slug($title);

            if (!Letter::where('title', $title)->exists()) {
                Letter::create(['title' => $title, 'slug' => $slug]);
            }
        }
    }
}
