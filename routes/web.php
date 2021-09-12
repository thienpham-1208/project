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

Route::get('/', function () {
    return view('admin.index');
});

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('category', 'CategoryController@index')->name('category.index');
        Route::post('category/create', 'CategoryController@store')->name('category.create');
        Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('category/{id}/update', 'CategoryController@update')->name('category.update');
        Route::post('category/{id}/delete', 'CategoryController@delete')->name('category.delete');
    });
