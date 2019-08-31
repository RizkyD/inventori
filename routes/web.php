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

Route::get('/types','TypeController@index');
Route::post('/types','TypeController@store');
Route::put('/types','TypeController@update');
Route::delete('/types','TypeController@destroy');

Route::get('/rooms','RoomController@index');
Route::post('/rooms','RoomController@store');
Route::put('/rooms','RoomController@update');
Route::delete('/rooms','RoomController@destroy');

Route::get('/users','UserController@index');
Route::post('/users','UserController@store');
Route::put('/users','UserController@update');
Route::delete('/users','UserController@destroy');


Route::post('/AddUser','UserController@AddUser');
Route::get('/users','UserController@index');
route::get('/borrows', 'BorrowController@indexBorrow');
route::get('/returns', 'BorrowController@indexReturn');
route::post('/borrow/{id}', [
    'as' => 'borrow',
    'uses' => 'BorrowController@fBorrow'
]);
route::post('/return/{id}', [
    'as' => 'return',
    'uses' => 'BorrowController@freturn'
]);
Route::get('/profile', 'ProfileController@Index');
Route::get('/profile/edit','ProfileController@edit');
Route::put('/profile', [
    'as'=> 'ProfileController.update',
    'uses'=> 'ProfileController@update'
    ]);
    Route::get('/inventory/export_excel', 'InventoryController@export_excel');
    Route::get('/borrow/export_excel', 'BorrowController@export_excel');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('index');
    });   
});
