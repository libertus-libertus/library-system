<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) {
            $book = new Book;

            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->name;
            $book->year = rand(2020, 2024);
            $book->publisher_id = rand(1, 10);
            $book->author_id = rand(1, 10);
            $book->catalog_id = rand(1, 4);
            $book->qty = rand(10, 20);
            $book->price = rand(10000, 20000);

            $book->save();
        }
    }
}
