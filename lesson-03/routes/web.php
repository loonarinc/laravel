<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', 'UserController@index')->name('login');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/one/{id}', 'NewsController@newsOne')->name('One');
    Route::get('/categories', 'NewsController@categories')->name('categories');
    Route::get('/category/{id}', 'NewsController@categoryId')->name('categoryId');
    Route::get('/add', 'NewsController@add')->name('add');
}
);



//Auth::routes();

