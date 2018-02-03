<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' => 'Bebida',
        	'description' => 'Para acompañar su comida.',
        ]);
        Category::create([
        	'name' => 'Desayuno',
        	'description' => 'Para empezar eñ día.',
        ]);
        Category::create([
        	'name' => 'Almuerzo',
        	'description' => 'Para acompañar continuar su día.',
        ]);
        Category::create([
        	'name' => 'Cena',
        	'description' => 'Para terminar su día.',
        ]);
        Category::create([
        	'name' => 'Comida rápida',
        	'description' => 'Comida al instante.',
        ]);
        Category::create([
        	'name' => 'Bocadillos',
        	'description' => 'Para acompañar su comida.',
        ]);
        Category::create([
        	'name' => 'Poste',
        	'description' => 'Para acompañar su comida.',
        ]);
    }
}
