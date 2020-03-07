<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/vue', function (){
    return view('vue');
})->name('vue');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/news', 'NewsController@all')->name('News');
    Route::match(['post','get'],'/addNews', 'NewsController@addNews')->name('addNews');
    Route::get('/updateNews{news}', 'NewsController@update')->name('updateNews');
    Route::post('/saveNews{news}', 'NewsController@save')->name('saveNews');
    Route::get('/deleteNews{news}', 'NewsController@delete')->name('deleteNews');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
    Route::match(['post','get'],'/addCategory', 'NewsController@addCategory')->name('addCategory');
    Route::post('/saveCategory{category}', 'NewsController@saveCategory')->name('saveCategory');
    Route::get('/categories', 'NewsController@categories')->name('editCategories');
    Route::get('/updateCategory{category}', 'NewsController@updateCategory')->name('updateCategory');
});

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/one/{news}', 'NewsController@newsOne')->name('One');
    Route::get('/categories', 'NewsController@categories')->name('categories');
    Route::get('/category/{id}', 'NewsController@categoryId')->name('categoryId');
}
);



Auth::routes();

