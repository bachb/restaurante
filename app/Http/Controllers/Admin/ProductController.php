<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Product;
use App\Company;
use App\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $messages = [
            'name.required' =>'Es necesario ingresar un nombre para el producto.',
            'name.min' =>'El nombre del producto debe tener al menos 3 carácteres.',
            'description.required' =>'La descripción corta es un campo obligatorio.',
            'description.max' =>'La descripción corta solo admite hasta 200 caracteres.',
            'price.required' =>'Es obligatorio definir un precio para el producto.',
            'price.numeric' =>'Ingrese un precio válido.',
            'price.min' =>'No se admiten valores negativos.'


        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'

        ];

        $this->validate($request, $rules, $messages);
        //registrar el nuevo producto en la base de datos
        // dd($request->all()); 
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();
        $notification = 'Se ha agregado un nuevo producto.';
        return back()->with(compact('notification'));
    }

    public function edit($id)
    {        
        $product =Product::find($id);
        $categories = Category::all();
        $company =Company::find(1);
        return view('admin.products.edit')->with(compact('product', 'categories', 'company'));//formulario de registro
    }
        public function update(Request $request, $id)
    {
        $messages = [
            'name.required' =>'Es necesario ingresar un nombre para el producto.',
            'name.min' =>'El nombre del producto debe tener al menos 3 carácteres.',
            'description.required' =>'La descripción corta es un campo obligatorio.',
            'description.max' =>'La descripción corta solo admite hasta 200 caracteres.',
            'price.required' =>'Es obligatorio definir un precio para el producto.',
            'price.numeric' =>'Ingrese un precio válido.',
            'price.min' =>'No se admiten valores negativos.'


        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'

        ];

        $this->validate($request, $rules, $messages);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save(); // Update
        $notification = 'Se han guardado los cambios.';
    	return redirect('/home')->with(compact('notification'));
    }
        public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();
        $notification = 'Se ha eliminado el producto.';
        return back()->with(compact('notification'));
    }
    public function select($id)
    {
        $company = Company::all();
        
        $product = Product::find($id);
        $limits = $company->pluck('limit');//obtenemos el valor de la colomna limit en Company
            foreach ($limits as $limit) {
                $lim= $limit; //definimos una nueva variable limite
            }
        $count = count(Product::where('featured', true)->get());

        if ($product->featured) {
            Product::where('id', $id)->update([
            'featured' => false,
            'order' => null
            ]);
        }elseif (! $product->featured) {   
            if ($count < $lim) { 

                $product->featured = true;
                $product->order = $count +1;
                $product->save();
                $notification = $product->name. ' fué agregado como favorito.';
                return back()->with(compact('notification'));
                
            }elseif (!$count < $lim) {

                $notification = 'El número máximo de productos favoritos es: '.$lim;
                return back()->with(compact('notification'));
            }
            
        }
            
                return back();
    }        
}
