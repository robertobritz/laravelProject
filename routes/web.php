<?php

use Illuminate\Support\Facades\Route;

Route::any('produtos2/search', 'ProdutoController2@search')->name('produtos2.search');

route::resource('produtos2', 'ProdutoController2');

route::delete('produtos/{id}', 'ProductController@destroy')->name('produtos.destroy');

route::put('produtos/{id}', 'ProductController@update')->name('produtos.update');

route::get('produtos/{id}/edit', 'ProductController@edit')->name('produtos.edit');

route::get('produtos/create', 'ProductController@create')->name('produtos.create');

route::get('produtos/{id}', 'ProductController@show')->name('produtos.show');

route::get('produtos', 'ProductController@index')->name('produtos.index');

route::post('produtos', 'ProductController@store')->name('produtos.store');

route::get('/login', function () { // necessário criar para a função
    return 'Login';               // Middleware 'autch'
})->name('login');
/*
route::middleware([])->group(function () {

    route::prefix('admin')->group(function(){ // para logo depois do get
        
        route::namespace('Admin')->group(function(){ //para o controler

            route::name('admin.')->group(function(){ // para o nome

            route::get('/dashboard', 'TesteController@teste')->name('dashboard');
            route::get('/financeiro', 'TesteController@teste')->name('financeiro');
            route::get('/produtos', 'TesteController@teste')->name('produtos');

            route::get('/', function(){
                return redirect()->route('admin.dashboard'); //URL /admin -> direciona dashboard
            })->name('home');

                });
          });
     });
  });  
*/

route::group([
    'middleware' =>[],
    'prefix' => 'admin', //prefixo utilizado para a URL
    'namespace' => 'Admin', //prefixo utilizado para a pasta do Controller app/controller
    'name' => 'admin.' //prefixo para a definição padrão do ->name
], function(){
    route::get('/dashboard', 'TesteController@teste')->name('dashboard');
    route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    route::get('/produtos', 'TesteController@teste')->name('produtos');
    route::get('/', function(){
             return redirect()->route('admin.dashboard'); //URL /admin -> direciona dashboard
     })->name('home');
});


route::get('redirect3', function () {
    return redirect()->route('url.name');
});

route::get('/nome', function () {
    return 'Hey Hey';
})->name('url.name');

route::view('/view', 'welcome');

route::redirect('/redirect1', '/redirect2');

// route::get('redirect1', function() {
//      return redirect('/redirect2');
// });

route::get('redirect2', function () {
    return 'Redirect 2';
});

route::get('/produtos/{idProd?}', function ($idProd = '') {
    return "Produtos {$idProd}";
});

route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

route::match(['get', 'post'], '/match', function () {
    return 'match'; //pode ser uma view return view('welcome');
});


route::post('/register', function () {
    return '';
});

route::get('/contact', function () {
    return view('site.contact');
});

Route::get('/', function () {
   return view('welcome');
});
