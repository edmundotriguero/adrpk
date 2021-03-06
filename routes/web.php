<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('client','ClientController');
Route::resource('category','CategoryController');
Route::resource('location','LocationController');
Route::resource('product','ProductController');
Route::resource('video','VideoController');
Route::resource('contract','ContractController');

Route::get('sendMail/{message}','ContractController@sendEmail');


Auth::routes();
// Route::auth();

Route::get('/home', 'HomeController@index')->name('home');
