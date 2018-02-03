<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id) {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured', 'desc')->get();
    	return view('admin.products.images.index')->with(compact('product','images'));
    }
    public function store(Request $request, $id) {
    	//guardar la img en nuestro proyecto
    	$file = $request->file('photo'); //Guarda la imagen en una variable temporal
    	$path = public_path(). '/images/products'; //concatenamos la ruta a public_path(ruta absoluta a la carpeta public (creamos la ruta))
    	$fileName = uniqid() . $file->getClientOriginalName();// asignamos un id+el nombre original
    	$moved = $file->move($path, $fileName);//guardar el archivo en esa ruta con ese nombre

    	//crear 1 registro en la tabla product_image
    	if ($moved) {
    		$productImage = new ProductImage();
	    	$productImage->image = $fileName;
	    	$productImage->product_id = $id;
	    	$productImage->save();
    	}
    	
    	return back();

    }
    public function destroy(Request $request, $id) {
        //eliminar el archivo
        $productImage = ProductImage::find($request->image_id);

        if (substr($productImage->image, 0, 4) === "http") {
            $deleted = true;
        } else {
            $fullPath = public_path(). '/images/products/' . $productImage->image;
            $deleted = File::delete($fullPath);
        }

        //eliminar el registro de la img en la bd
        if ($deleted) {
            $productImage->delete();
        }
        return back();
    }
    public function select($id, $image)
    {
    	ProductImage::where('product_id', $id)->update([
    		'featured' => false
    	]);
    	$productImage = ProductImage::find($image);
    	$productImage->featured = true;
    	$productImage->save();
    	return back();
    }
}
