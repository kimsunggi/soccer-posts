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

Route::get('/', 'WelcomeController@index');
Route::get('domestic', 'WelcomeController@domestic')->name('domestic.get');
Route::get('chart', 'ChartsController@index')->name('chart.get');
    


Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('article', 'ArticlesController@create')->name('article.create');
Route::post('article', 'ArticlesController@store')->name('article.store');
Route::group(['prefix' => 'articles/{id}'], function () {
    Route::delete('article', 'ArticlesController@destroy')->name('article.destroy');
    Route::get('article', 'ArticlesController@show')->name('article.show');
    
    Route::post('comment', 'CommentsController@store')->name('comment.store');
    Route::delete('comment', 'CommentsController@destroy')->name('comment.destroy');
    
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => [ 'show']]);
    //↑未使用
    Route::resource('charts', 'ChartsController', ['only' => ['store', 'destroy']]);
    Route::resource('charts', 'ChartsController', ['only' => ['create', 'show']]);
    Route::group(['prefix' => 'charts/{id}'], function () {
        Route::post('vote', 'ChartUserController@vote')->name('chart_user.want');
        Route::resource('users', 'UsersController', ['only' => ['index']]);
    });
    
});