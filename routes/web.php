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



Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    // pagina di atterraggio dopo il login (con il prefisso, l'url è '/admin')
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/categories', 'HomeController@category')->name('category_page');
    Route::get('/tags', 'HomeController@tags')->name('tags_page');



    Route::resource('/posts', 'PostController');
});


Route::get('/{any?}', 'HomeController@index')->where('any', '.*');