<?php

Route::get('/', 'IndexController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/config', 'CompanyController@index');
	Route::get('/company/{id}/edit', 'CompanyController@edit'); //formulario
	Route::post('/company/{id}/edit', 'CompanyController@update');// actualizar

	Route::post('/products', 'ProductController@store');// crear
	Route::get('/products/{id}/edit', 'ProductController@edit');//formulario edicion
	Route::post('/products/{id}/edit', 'ProductController@update');// actualizar
	Route::delete('/products/{id}', 'ProductController@destroy');// actualizar
	Route::get('/products/{id}', 'ProductController@select');//favorito

	Route::get('/categories', 'CategoryController@index');
	Route::get('/categories/{id}/edit', 'CategoryController@edit');
	Route::post('/categories/{id}/edit', 'CategoryController@update');
	Route::post('/categories', 'CategoryController@store');// crear
	Route::delete('/categories/{id}', 'CategoryController@destroy');// actualizar


	Route::get('/products/{id}/images', 'ImageController@index');// listado
	Route::post('/products/{id}/images', 'ImageController@store');// listado
	Route::delete('/products/{id}/images', 'ImageController@destroy');// listado
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select');// destacar
});
