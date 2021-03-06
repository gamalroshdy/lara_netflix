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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.')->prefix('admincp')->middleware(['role:super_admin'])->namespace('Admin')->group( function () {
    Route::get('/', 'AdminController@index')->name('home');
    Route::resource('categories','CategoryController')->except('show');
    Route::resource('roles','RoleController')->except('show');
});
