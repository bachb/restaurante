<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // $category->products 1:N
    public function products()
    {
    	return $this->hasMany(Product::Class);
    }
    // $product->images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
