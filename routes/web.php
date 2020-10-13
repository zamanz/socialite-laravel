<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/facebook','SocialiteAuthController@redirectToProviderFacebook')->name('login.facebook');
Route::get('facebook/callback','SocialiteAuthController@handleProviderCallbackFacebook');

Route::get('login/github','SocialiteAuthController@redirectToProviderGithub')->name('login.github');
Route::get('github/callback','SocialiteAuthController@handleProviderCallbackGithub');

Route::get('login/google','SocialiteAuthController@redirectToProviderGoogle')->name('login.google');
Route::get('google/callback','SocialiteAuthController@handleProviderCallbackGoogle');

Route::resource('posts','PostController');
Route::get('posts/delete/{id}', 'PostController@destroy')->name('posts.delete');


