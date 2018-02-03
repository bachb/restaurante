<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
	public function index()
    {
    	$categories = Category::all();
    	return view('admin.categories.index')->with(compact('categories'));//listado
    }
    public function store(Request $request)
    {
        $messages = [
            'name.required' =>'Es necesario ingresar un nombre para de categoría.',
            'name.min' =>'El nombre de la categoría debe tener al menos 3 carácteres.',
            'description.required' =>'La descripción corta es un campo obligatorio.',
            'description.max' =>'La descripción corta solo admite hasta 200 caracteres.'


        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',

        ];

        $this->validate($request, $rules, $messages);
    	//registrar el nuevo producto en la base de datos
        // dd($request->all()); 
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        $notification = 'Se ha agregado una nueva categoría.';
        return back()->with(compact('notification'));
    }

    public function edit($id)
    {
    	$category =Category::find($id);
        return view('admin.categories.edit')->with(compact('category'));//formulario de registro
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' =>'Es necesario ingresar un nombre para la categoria.',
            'description.required' =>'La descripción corta.',
            'description.max' =>'La descripción corta solo admite hasta 200 caracteres.',


        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',


        ];

        $this->validate($request, $rules, $messages);

        $category = Category::find($id);
        $category->name = $request->input('name');       
        $category->description = $request->input('description');
        $category->save();
        
        $notification = 'Categoría actualizada correctamente.';
    	return redirect('/admin/categories')->with(compact('notification'));
    }
        public function destroy($id)
    {

        $category = Category::find($id);
        $category->delete();
        $notification = 'Se ha eliminado la categoria correctamente.';
        return back()->with(compact('notification'));
    } 
}
