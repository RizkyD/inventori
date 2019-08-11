<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within xa group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/', function () {
    return view('index');
});

Route::post('/AddUser','UserController@AddUser');
Route::get('/users','UserController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('inventories', 'InventoryController');
// Route::resources([
//     'inventory' => 'InventoryController',
//     'Borrow' => 'BorrowController'
// ]);
