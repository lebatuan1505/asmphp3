<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;
use Nette\Utils\Random;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
           
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->text(25),
                'thumbnail' => $faker->imageUrl(200, 300, 'books', true, 'Faker'),
                'author' => $faker->text(20),
                'publisher' => $faker->text(20),
                'publication' => $faker->dateTime('now'),
                'price' =>rand(10, 100), 
                'quantity' => rand(10, 100),
                'category_id' => Rand(1, 5) 
            ]);
        }
    }
}
