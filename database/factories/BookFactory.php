<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        "title"=>$faker->title,
        "author_id"=>Author::inRandomOrder()->limit(5)->get()->random()->id
    ];
});
