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
    return redirect()->route('save_combinations');
});

Route::get('lotto-generator/', 'LottoController@index')->name('index'); 
Route::get('lotto-generator/list', 'LottoController@list_combinations')->name('list_combinations'); 
Route::match(['GET', 'POST'], 'lotto-generator/save', 'LottoController@save_combinations')->name('save_combinations'); 
