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
    if(!empty(Session::get('levelup_authentication'))){return Redirect::to('home');}
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

Route::get('auth/logout', [
    'as' => 'auth.logout',
    'uses' => 'AuthController@logout',
    'logout' => true
]);

Route::get('home', [
    'as' => 'home.index',
    'uses' => 'HomeController@index',
]);

Route::get('profile', [
    'as' => 'profile.index',
    'uses' => 'ProfileController@index',
]);

Route::get('quizzes', [
    'as' => 'quizzes.index',
    'uses' => 'QuizzesController@index',
]);

Route::get('quizzes/category/{id}', [
    'as' => 'quizzes.category',
    'uses' => 'QuizzesController@category',
]);

Route::get('quizzes/topic/{$category}/{$topic}', [
    'as' => 'quizzes.topic',
    'uses' => 'QuizzesController@topic',
]);

Route::get('progress', [
    'as' => 'progress.index',
    'uses' => 'ProgressController@index',
]);
