<?php

use Illuminate\Database\Seeder;
use App\ProductImage;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/6brchourl/club-sandwich.jpg',
        	'product_id' => '1'
        ]);
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/7qsx6ddu9/combo-thumb.jpg',
        	'product_id' => '2'
        ]);
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/kuyhj3g6p/hamburger.jpg',
        	'product_id' => '3'
        ]);
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/5m8k59ws1/hot-cakes-thumb.jpg',
        	'product_id' => '4'
        ]);
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/71a4u230x/panini.jpg',
        	'product_id' => '5'
        ]);
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/ufi462d9d/wine-dharma-452975-r80.jpg',
        	'product_id' => '6'
        ]);
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/6brchourl/club-sandwich.jpg',
        	'product_id' => '7'
        ]);
        ProductImage::create([
        	'image' => 'https://s6.postimg.org/7qsx6ddu9/combo-thumb.jpg',
        	'product_id' => '8'
        ]);
    }
}
