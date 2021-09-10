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
        $seeders = [
            UsersTableSeeder::class,
            TagsTableSeeder::class,
            PostsTableSeeder::class
        ];

         $this->call($seeders);
    }
}
