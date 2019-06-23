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

Route::prefix('')->group(function() {
    Route::get('/', 'HomeController@index');
    Route::get('/datlich', 'AppointmentController@index');
    Route::post('/datlich', 'AppointmentController@checkPost');

    Route::get('/post-article','PostArticleController@index');
    Route::post('/post-article','PostArticleController@store');
    Route::get('/show-article','PostArticleController@show');

    Route::get('/dang-nhap','LoginController@index');
    Route::get('/redirect','LoginController@show');
    Route::get('/logout','LoginController@logout_process');
    Route::get('/callback','LoginController@handleProviderCallback');

    Route::get('/user-detail','UserInformationController@index');

});
