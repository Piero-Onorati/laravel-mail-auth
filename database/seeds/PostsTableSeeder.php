<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i=0; $i < 10 ; $i++) { 

            //creare l'istanza
            $newPost = new Post();

            // generare i dati
            $newPost->title= "Post numero" . ($i+1);
            $newPost->slug= Str::slug($newPost->title, '-');
            $newPost->content ='Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, suscipit! Quibusdam dolorum tenetur, repellat dolores aspernatur vel quasi nisi doloremque, veniam, fugiat maiores modi neque. Debitis libero pariatur optio quod?';

            // salvare i dati
            $newPost->save();
        }
    }
}
