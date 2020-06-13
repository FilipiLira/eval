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

Route::get('eval', 'LoginController@index');

Route::get('eval/facebook', 'LoginController@redirectToProvider');
Route::get('eval/facebook/callback', 'LoginController@handleProviderCallback');

Route::get('eval/google', 'LoginController@redirectToProviderGoogle');
Route::get('eval/google/callback', 'LoginController@handleProviderCallbackGoogle');

Auth::routes();

Route::prefix('home')->name('home.')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/authSocialite', 'AuthController@verifyAuth')->name('authSocialite');
    Route::get('/login/do', 'AuthController@login')->name('authSocialite.do');
    
    Route::get('/newProduct', 'ProductController@productForm')->name('newProduct');
    Route::post('/createProduct', 'ProductController@create')->name('createProduct');
    Route::get('/productImg/{imgName}', 'ProductController@imgReq')->name('productImg');
});

