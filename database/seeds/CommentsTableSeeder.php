<?php

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            if(rand(0, 1) == 1){

                for ($i=0; $i < rand(0, 10); $i++) { 
                    $newComment = new Comment();

                    $newComment->date = $faker->date();
                    $newComment->content = $faker->text();
                    $newComment->post_id = $post->id;
    
                    // To decide if user is not registered
                    rand(0, 10) >= 8 ? $newComment->user_id = null : $newComment->user_id = $users[rand(0, count($users)-1)]->id;
    
                    $newComment->save();
                }

            }
        }

    }
}
