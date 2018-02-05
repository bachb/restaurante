<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Company;
use App\Product;
use App\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('order', 'asc')->get();       
        $company =Company::find(1);
        $categories = Category::all();
        return view('home')->with(compact('products', 'company', 'categories'));
    }
}