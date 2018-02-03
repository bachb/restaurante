<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Company;
use File;

class CompanyController extends Controller
{
	public function index()
    {
    	$products = Product::all();
        $company = Company::all();
    	return view('admin.company.config')->with(compact('products', 'company'));//listado
    }
    public function edit($id)
    {
    	$company =Company::find($id);
        return view('admin.company.edit')->with(compact('company'));//formulario de registro
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' =>'Es necesario ingresar un nombre para el local.',
            'direccion.required' =>'Es necesario ingresar la direccion del local.',
            'municipio.required' =>'Es necesario ingresar el municipio del local.',
            'departamento.required' =>'Es necesario ingresar el departamento del local.',
            'name.min' =>'El nombre del local debe tener al menos 3 carácteres.',
            'description.required' =>'La descripción corta  o eslogan es un campo obligatorio.',
            'description.max' =>'La descripción corta solo admite hasta 200 caracteres.',


        ];
        $rules = [
            'name' => 'required|min:3',
            'direccion' => 'required',
            'municipio' => 'required',
            'departamento' => 'required',
            'description' => 'required|max:200',


        ];

        $this->validate($request, $rules, $messages);

        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->limit = $request->input('limit');
        $company->email = $request->input('email');
        $company->direccion = $request->input('direccion');
        $company->municipio = $request->input('municipio');
        $company->departamento = $request->input('departamento');        
        $company->description = $request->input('description');
        $company->long_description = $request->input('long_description');
        $company->save(); // Update
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = public_path() . '/images/company';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path,$fileName);
            if ($moved) {
                $previusPath = $path . '/' . $company->logo;                
                $company->logo = $fileName;
                $saved = $company->save();
                if ($saved) {
                    File::delete($previusPath);
                }
            }
        }
        $notification = 'Los datos de básicos se han guardado correctamente.';
    	return redirect('/admin/config')->with(compact('notification'));
    }
}
