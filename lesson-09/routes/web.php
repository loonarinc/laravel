<?php


Auth::routes();
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout','Auth\LoginController@logout')->name('logout');


Route::get('/', 'HomeController@index')->name('home');

Route::get('/auth/vk', 'LoginController@loginVK')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@responseVK')->name('vkResponse');

Route::get('/auth/github', 'LoginController@loginGH')->name('ghLogin');
Route::get('/auth/github/response', 'LoginController@responseGH')->name('ghResponse');

Route::get('/vue', function () {
    return view('vue');
})->name('vue');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::get('/users', 'UsersController@index')->name('updateUser');

    Route::get('/users/toggleAdmin/{user}', 'UsersController@toggleAdmin')->name('toggleAdmin');


    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::resource('/news', 'NewsController')->except('show');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
    Route::get('/test3', 'IndexController@test3')->name('test3');
});
Route::match(['post', 'get'], '/profile', 'ProfileController@update')->name('updateProfile');
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
