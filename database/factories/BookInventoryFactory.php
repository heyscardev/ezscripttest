<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\BookInventory;
use Faker\Generator as Faker;

$factory->define(BookInventory::class, function (Faker $faker) {
$total = $faker->randomNumber(2, false);
    return [
        "total_inventory"=>$total,
        "available_inventory"=>$total,
        "book_id"=>Book::inRandomOrder()->limit(5)->get()->random()->id
    ];
});
