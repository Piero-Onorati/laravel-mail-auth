<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['Front End', 'Back End', 'Database', 'Framework', 'Languages', 'React', 'Bootstrap', 'Laravel', 'Vue'];

        
        foreach ($tags as $tag) {

            //creare l'istanza
            $new_tag= new Tag();

            //popolare i dati
            $new_tag->name=$tag;
            $new_tag->slug=Str::slug($tag, '-');

            //salviamo i dati
            $new_tag->save();
        }
    }
}
