<?php

use Illuminate\Support\Facades\Route;

Route::resource('products', 'ProductController'); //->middleware('auth');

// Route::get('products/create', 'ProductController@create')->name('products.create');
// Route::get('products/{id}', 'ProductController@show')->name('products.show');
// Route::get('products', 'ProductController@index')->name('products.index');
// Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
// Route::post('products/', 'ProductController@store')->name('products.store');
// Route::put('products/{id}', 'ProductController@update')->name('products.update');
// Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

Route::any('/login', function () {
    return 'login';
})->name('login');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
    'namespace' => 'Admin'
    ], function () {

        Route::name('admin.')->group(function() {

            Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

            Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
            
            Route::get('/produtos', 'TesteController@teste')->name('produtos');

            Route::get('/', function () {
                return redirect()->route('admin.dashboard');
            })->name('home');

        });
});



Route::get('/', function () {
    return view('welcome');
});

// Aceita os verbos http que estão citados no array
Route::match(['get', 'post'], '/match', function () {
    return 'Match';
});

// Aceita todos os tipos de verbo http
Route::any('/any', function () {
    return 'Any';
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produtos {$idProduct}";
});

Route::get('/nasdsadurl', function () {
    return 'Hey hey hey';
})->name('url.name');

Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});