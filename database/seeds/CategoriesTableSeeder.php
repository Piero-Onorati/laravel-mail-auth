<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Html', 'Css', 'PHP', 'JavaScript', 'Vue Cli'];

        foreach ($categories as $category) {

            // creare l'istanza
            $newCategory = new Category();

            // popolare i dati
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category, '-');

            // salvare i dati
            $newCategory->save();
        }
    }
}
