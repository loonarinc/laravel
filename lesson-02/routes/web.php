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

Route::get('/', 'HomeController@index')->name('home');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/admin', 'IndexController@index')->name('admin');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});

//Route::get('/admin', 'Admin\IndexController@index')->name('admin');
//Route::get('/test1', 'Admin\IndexController@test1')->name('test1');
//Route::get('/test2', 'Admin\IndexController@test2')->name('test2');

Route::get('/news', 'NewsController@news')->name('news');
Route::get('/news/{id}', 'NewsController@newsOne')->name('newsOne');
Route::get('/newsCategories', 'NewsCategoriesController@newsCategories')->name('newsCategories');
Route::get('/newsCategories/{short}', 'NewsCategoriesController@newsOneCategory')->name('newsOneCategory');
Route::get('/newsCategories/{short}/{id}', 'NewsCategoriesController@newsOne2')->name('newsOne2');

/*
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);
*/
/*
Route::get('/', function () {
    return view('index');
});

Route::get('/news/', function () {
    return view('news');
});
Route::get('/about/', function () {
    return view('about');
});
*/
