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
Route::resource('inventories', 'InventoryController');
route::resource('borrows', 'BorrowController');
route::post('/borrow/{id}', [
    'as' => 'borrow',
    'uses' => 'BorrowController@borrow'
]);
Route::get('/profile', 'ProfileController@Index');
Route::get('/profile/edit','ProfileController@edit');
Route::put('/profile', [
    'as'=> 'ProfileController.update',
    'uses'=> 'ProfileController@update'
    ]);

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('index');
    });   
});
