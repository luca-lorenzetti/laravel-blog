<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 40; $i++) { 
            
            $user = new User();
            
            $user->name = $faker->name();
            $user->password = Hash::make($faker->password());
            $user->email = $faker->email();

            $user->save();
        }
    }
}
