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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('auth/register', [
    'as' => 'auth.register',
    'uses' => 'AuthController@register',
]);
Route::post('auth/register', [
    'as' => 'auth.register',
    'uses' => 'AuthController@register_post'
]);

Route::get('auth/login', [
    'as' => 'auth.login',
    'uses' => 'AuthController@login',
]);
Route::post('auth/login', [
    'as' => 'auth.login',
    'uses' => 'AuthController@login_post',
]);

Route::get('home', [
    'as' => 'home.index',
    'uses' => 'HomeController@index',
]);

Route::get('profile', [
    'as' => 'profile.index',
    'uses' => 'ProfileController@index',
]);