<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/vue', function (){
    return view('vue');
})->name('vue');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::match(['post','get'],'/profile', 'ProfileController@update')->name('updateProfile');
    Route::get('/change', 'ProfileController@change')->name('changeProfile');
    Route::post('/changing{item}', 'ProfileController@change')->name('changingProfile');
    Route::get('/news', 'NewsController@all')->name('News');
    Route::match(['post','get'],'/addNews', 'NewsController@add')->name('addNews');
    Route::get('/updateNews{news}', 'NewsController@update')->name('updateNews');
    Route::post('/saveNews{news}', 'NewsController@save')->name('saveNews');
    Route::get('/deleteNews{news}', 'NewsController@delete')->name('deleteNews');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');

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

