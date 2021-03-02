<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

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

// Account
// Route::get('/account', 'AccountsController@index');
// Route::get('/account/create', 'AccountsController@create');
// Route::get('/account/{account}', 'AccountsController@show');
// Route::post('/account', 'AccountsController@store');
// Route::delete('/account/{account}', 'AccountsController@destroy');
// Route::delete('/{account}', 'AccountsController@destroy');
// Route::get('/account/{account}/edit', 'AccountsController@edit');
// Route::patch('/account/{account}', 'AccountsController@update');
Route::get('/', function(){
    return redirect('/home');
});
Route::resource('account', 'AccountsController');
// Product
Route::get('/product', 'ProductsController@index');
Route::get('/product/create', 'ProductsController@create');
Route::post('/product', 'ProductsController@store');
Route::delete('/product/{product}', 'ProductsController@destroy');
Route::get('/edit/{product}', 'ProductsController@edit');
Route::patch('/edit/{product}', 'ProductsController@update');

//Transaction
Route::get('/transaction', 'TransactionController@index');
Route::get('/transaction/create', 'TransactionController@create');
Route::post('/transaction', 'TransactionController@store');
Route::delete('/transaction/{transaction}', 'TransactionController@delete');

//Detail
Route::get('/detail/{detail}', 'DetailController@show');
Route::middleware(['auth:sanctum', 'verified'])->get('/detail/cetak/{detail}', 'DetailController@cetak');

Route::middleware(['auth:sanctum', 'verified'])->get('/home','HomeController@index');

//

Route::get('/tes',function(){
    return view('detail.cetak');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

