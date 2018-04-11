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

// Route::get('/homepage', function () {
//     return view('index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homepage');
Route::get('/category/{id}', 'HomeController@getArticlesByCategorie');
Route::get('/shoppingcard', 'ShoppingCardController@show');
Route::get('/shoppingcard/add/{articleId}', 'ShoppingCardController@add');
Route::get('/shoppingcard/delete/{articleId}', 'ShoppingCardController@delete');

 Route::get('/link', 'ArticleController@index');
// Route::post('/createsave', 'ArticleController@createSave');