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

<<<<<<< HEAD

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
=======
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('index');
    });   
});
>>>>>>> bbde8f750aa33fa54704ed0bd39ed8f281723420
