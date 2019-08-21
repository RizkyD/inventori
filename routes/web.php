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

Route::get('/inventories','InventoryController@index');
Route::post('/inventories','InventoryController@store');
Route::put('/inventories','InventoryController@update');
Route::delete('/inventories','InventoryController@destroy');


Route::post('/AddUser','UserController@AddUser');
Route::get('/users','UserController@index');
route::resource('borrows', 'BorrowController');
route::post('/borrow/{id}', [
    'as' => 'borrow',
    'uses' => 'BorrowController@borrow'
]);

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('index');
    });   
});
