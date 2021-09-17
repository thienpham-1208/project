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

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('category', 'CategoryController@index')->name('category.index');
        Route::post('category/create', 'CategoryController@store')->name('category.create');
        Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('category/{id}/update', 'CategoryController@update')->name('category.update');
        Route::post('category/{id}/delete', 'CategoryController@delete')->name('category.delete');

        Route::get('dish', 'DishController@index')->name('dish.index');
        Route::get('dish/create', 'DishController@create')->name('dish.create');
        Route::post('dish/store', 'DishController@store')->name('dish.store');
        Route::get('dish/{id}/edit', 'DishController@edit')->name('dish.edit');
        Route::post('dish/{id}/update', 'DishController@update')->name('dish.update');
        Route::post('dish/{id}/delete', 'DishController@delete')->name('dish.delete');
        Route::post('dish/{id}/update-display', 'DishController@updateDisplay')->name('dish.update.display');

        Route::get('table', 'Tablecontroller@index')->name('table.index');
        Route::post('table/create', 'TableController@store')->name('table.create');
        Route::get('table/{id}/edit', 'TableController@edit')->name('table.edit');
        Route::post('table/{id}/update', 'TableController@update')->name('table.update');
        Route::post('table/{id}/delete', 'TableController@delete')->name('table.delete');
    });
