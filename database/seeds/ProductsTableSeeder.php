<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
        	'name' => 'Club Sandwich',
        	'description' => 'Hecho con verduras frescas, pollo, queso y pan integral.',
        	'price' => '2000',
            'featured' => true,
        	'category_id' => '6'
        ]);
        Product::create([
        	'name' => 'Combo Hamburguesa',
        	'description' => 'Lleva 4 por el precio de 3.',
        	'price' => '13000',
            'featured' => true,
        	'category_id' => '5'
        ]);
        Product::create([
        	'name' => 'Hamburguesa',
        	'description' => 'Hecho con verduras frescas, pollo, queso y pan integral..',
        	'price' => '8000',
            'featured' => true,
        	'category_id' => '5'
        ]);
        Product::create([
        	'name' => 'Hot cakes',
        	'description' => 'Tortillas con un toque de jalea.',
        	'price' => '6000',
            'featured' => true,
        	'category_id' => '2'
        ]);
        Product::create([
        	'name' => 'Panini',
        	'description' => 'Sandwich de origen italiano.',
        	'price' => '10000',
            'featured' => true,
        	'category_id' => '6'
        ]);
        Product::create([
        	'name' => 'Jugos naturales',
        	'description' => 'Gran variedad de sabores.',
        	'price' => '3000',
            'featured' => true,
        	'category_id' => '1'
        ]);
        Product::create([
        	'name' => 'Club Sandwich',
        	'description' => 'Hecho con verduras frescas, pollo, queso y pan integral.',
        	'price' => '2000',
            'featured' => true,
        	'category_id' => '6'
        ]);
        Product::create([
        	'name' => 'Combo Hamburguesa',
        	'description' => 'Lleva 4 por el precio de 3.',
        	'price' => '13000',
            'featured' => true,
        	'category_id' => '5'
        ]);
    }
}
