<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Author::class, 50)->create();
        factory(App\Book::class, 100)->create()->each(function ($book) {
            $book->bookInventory()->save(factory(App\BookInventory::class)->make());
        });
    }
}
