<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/feedback', 'FeedbackController@index')->name('feedback');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::match(['post','get'],'/addNews', 'IndexController@addNews')->name('addNews');
    Route::get('/addNews2', 'IndexController@addNews2')->name('addNews2');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
    Route::get('/test3', 'IndexController@test3')->name('test3');
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
}
);



Auth::routes();

