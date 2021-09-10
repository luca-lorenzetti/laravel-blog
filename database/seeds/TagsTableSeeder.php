<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'html',
            'css',
            'php',
            'js',
            'vuejs',
            'laravel',
            'windows',
            'linux',
            'typescript'
        ];

        foreach ($tags as $tag) {

            $newTag = new Tag($tag);
            $newTag->save();
        }

    
}
