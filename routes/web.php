<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Guest
Route::prefix('/')->group(function(){
    Route::get('', 'BlogController@check')->name('guest.home');
    Route::get('posts/{slug}', 'Guest\PostController@show')->name('guest.posts.show');
});

