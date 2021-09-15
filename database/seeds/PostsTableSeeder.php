<?php

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $tags = Tag::all();
        
        foreach ($users as $user) {

            if( (rand(0, 1)%2) == 0 ){
                
                for ($i=0; $i < rand(0, 10); $i++) { 
                    
                    $post = new Post();

                    $post->title = $faker->sentence();
                    $post->content = $faker->realText( rand(1000, 10000) );
                    $post->date = $faker->date();
                    $post->slug = Str::slug($post->title, '-');
                    $post->published = rand(0, 1);
                    $post->image = 'images/placeholder.png';
                    
                    $post->user_id = $user->id;


                    $maxTags = rand(1, 5);
                    // $idTagsEntered = [];
                    $tagsEntered = [];
                    $numTagsEntered = 0;


                    $post->save();

                    while($numTagsEntered <= $maxTags){
                        
                        $idTag = rand(0, count($tags)-1);

                  
                        if( !$this->tagAlreadyInserted($tagsEntered, $idTag) ){ 
                            $tagsEntered[] = $idTag;
                            $post->tags()->attach($tags[$idTag]) ;
                            $numTagsEntered++;
                        }
                    }
                }

            }
        }
    }



    public function tagAlreadyInserted($array, $element){
        
        foreach ($array as $value) {
            if($value == $element){
                return true;
            }
        }
        return false;
    }
}
