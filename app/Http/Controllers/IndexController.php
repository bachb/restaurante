<?php

namespace App\Http\Controllers;
use App\Product;
use App\Company;
use App\User;

use Illuminate\Http\Request;

class IndexController extends Controller
{
        public function welcome(){
    	$products = Product::all();
        // $admin = User::where('admin', '=', true)->pluck('email')->first();
    	$company = Company::all();
    	$limits = $company->pluck('limit');//obtenemos el valor de la colomna limit en Company
    	foreach ($limits as $limit) {
    		$limit= $limit; //definimos una nueva variable limite
    	}
        $outstandings = Product::where('featured', '=', true)->take($limit)->orderBy('order' , 'asc')->get();
    	return view('welcome')->with(compact('products', 'company', 'outstandings'));
    }
}