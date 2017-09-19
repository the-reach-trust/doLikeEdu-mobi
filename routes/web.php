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

Route::get('/help',[
    'as' => 'help.index',
    function () {
        return view('help.index');
    }
]);
Route::get('/terms',[
    'as' => 'help.terms',
    function () {
        return view('help.terms');
    }
]);
Route::get('/thebasics', [
    'as' => 'help.about',
    function () {
        return view('help.basics');
    }
]);
Route::get('/userAccounts', [
    'as' => 'help.accounts',
    function () {
        return view('help.accounts');
    }
]);
Route::get('/reportProblem', [
    'as' => 'help.report',
    function () {
        return view('help.report');
    }
]);

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
Route::post('profile', [
    'as' => 'profile.update',
    'uses' => 'ProfileController@update',
]);
Route::get('profile/password', [
    'as' => 'profile.password',
    'uses' => 'ProfileController@password',
]);
Route::post('profile/password', [
    'as' => 'profile.password',
    'uses' => 'ProfileController@password_update',
]);
Route::get('profile/complete', [
    'as' => 'profile.complete',
    'uses' => 'ProfileController@complete',
]);

Route::get('quizzes', [
    'as' => 'quizzes.index',
    'uses' => 'QuizzesController@index',
]);

Route::get('quizzes/category/{id}/{offset?}', [
    'as' => 'quizzes.category',
    'uses' => 'QuizzesController@category',
]);

Route::get('quizzes/topic/{category}/{topic}/{offset?}', [
    'as' => 'quizzes.topic',
    'uses' => 'QuizzesController@topic',
]);

Route::get('quizzes/quiz/{id}', [
    'as' => 'quizzes.quiz',
    'uses' => 'QuizzesController@quiz',
]);

Route::post('quizzes/quiz/{id}', [
    'as' => 'quizzes.quiz',
    'uses' => 'QuizzesController@quiz_post',
]);

Route::get('quizzes/result/{id}/{result}', [
    'as' => 'quizzes.result',
    'uses' => 'QuizzesController@quiz_result',
]);
Route::get('quizzes/page/{id}', [
    'as' => 'quizzes.page',
    'uses' => 'QuizzesController@page',
]);

Route::get('progress', [
    'as' => 'progress.index',
    'uses' => 'ProgressController@index',
]);

Route::get('pages/', [
    'as' => 'pages.index',
    'uses' => 'PagesController@page',
]);

Route::get('pages/page/{id}', [
    'as' => 'pages.page',
    'uses' => 'PagesController@page',
]);