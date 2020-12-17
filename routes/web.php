<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get("Products/{product},'ProductController@show");
Route::any('Products/Search','ProductController@search') -> name('Products.search');
//Crude inteleigente
Route::resource('Products','ProductController');

/*Crude Normal
Route::delete('Products/{id}','ProductController@destroy') ->name ('Products.destroy');
Route::put('Products/{id}','ProductController@update') ->name ('Products.update');
Route::get('Products/{id}/edit', 'ProductController@edit') ->name ('Products.edit');
Route::get('Products/create', 'ProductController@create') ->name ('Products.create');
Route::get('Products/{id}', 'ProductController@show') ->name ('Products.show');
Route::get('Products', 'ProductController@index') ->name ('Products.index');
Route::post('Products', 'ProductController@store') ->name ('Products.store');
*/
Route::get('/login', function(){
    return 'Login';
})-> name('login');

/*Route::middleware([])->group(function(){
  
    Route::prefix('admin')->group(function(){
        
        Route::namespace('Admin')->group(function(){

            Route::name('admin.') ->group(function(){

                Route::get('/dashboard', 'TestController@teste') -> name('dashboard');
            
                Route::get('/financeiro', 'TestController@teste') -> name('financeiro');;
                
                Route::get('/produtos', 'TestController@teste') -> name('products');;
    
                Route::get('/', function(){
                    return redirect() -> route('admin.dashboard');
                }) -> name('home');;
            });
           
        });
        
    });
});
*/

Route::group(['middleware' => [], 'prefix' => 'admin', 'namespace' => 'Admin', 'name' => 'admin.'], function(){
    
    Route::get('/dashboard', 'TestController@teste') -> name('dashboard');
            
    Route::get('/financeiro', 'TestController@teste') -> name('financeiro');;
    
    Route::get('/produtos', 'TestController@teste') -> name('products');;

    Route::get('/', function(){
        return redirect() -> route('admin.dashboard');
    }) -> name('home');
});

Route::get('redirect3', function(){
    return redirect()-> route('url.name');
});

//Route('url.name');

Route::get('/name-url', function(){
    return 'Hello';
}) -> name('url.name');


Route::view('/view', 'welcome',['id' => 'teste']);

Route::get('/view', function () {
    return view('welcome');
});

Route::redirect('/redirect1','/redirect2');

//Route::get('redirect1', function(){
  // return redirect('/redirect2');
//});

Route::get('redirect2', function(){
    return 'Redirect 02';
});

Route::get('/produtos/{idProduct?}', function($idProduct = ''){
    return "Produto(s) {$idProduct}";
});

/* Nesta routa temos o nome da rota cattegoia, valor dinamico flag e prefixo posts*/
Route::get('/categoria/{flag}/posts', function ($flag){
    return "Posts da Categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($prm1){
    return "Produtos da Categoria: {$prm1}";
});

Route:: match(['post', 'get'], '/match', function(){
    return 'match';
});

Route:: any('/any', function(){
    return 'Any';
});

Route:: post('/Register', function (){
    Return '';
});

Route::get('/empresa', function(){
    return "Sobre a Empresa";
});

Route::get('/contato', function(){
    return view('site.contato');
});

Route::get('/', function () {
    return view('welcome');
});
