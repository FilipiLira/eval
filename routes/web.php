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

Route::get('/', 'PageIndexController@index')->name('/');

Route::prefix('home')->name('home.')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/authSocialite', 'AuthController@verifyAuth')->name('authSocialite');
    Route::get('/login/do', 'AuthController@login')->name('authSocialite.do');
    
    Route::get('/newProduct', 'ProductController@productForm')->name('newProduct');
    Route::post('/createProduct', 'ProductController@create')->name('createProduct');
    Route::get('/productImg/{imgName}', 'ProductController@imgReq')->name('productImg'); // rota que retorna imagens de produtos cadastrados
});

// Rotas das avaliações
Route::get('/evaluationProduct/{productId}', 'ProductController@evaluationProductForm')->name('evaluationProduct');
Route::post('/evaluationProduct/create', 'Evaluation_ProductController@evaluationProductCreate')->name('evaluationProduct.create');
//Cara, não recomendo que você compre. Não é nem pelo sal, mas porque é ruim mesmo.
//Vai por mim, vai ser dinheiro jogado fora.
// Rotas das discursões do forum
Route::get('/newDiscussion/{productId}', 'DiscussionController@discussionForm')->name('newDiscussion');
Route::post('/createDiscussion', 'DiscussionController@createDiscussion')->name('createDiscussion');
Route::get('/dicussions/{productId}', 'DiscussionController@discussionsPage')->name('discussions');
Route::get('/discussionPage/{discussionId}', 'DiscussionController@discusionPage')->name('discussionPage');

Route::post('/discussion/createPost', 'PostController@createPost')->name('createPost');

Route::get('/notificationsUser/{userId}', 'NotificationController@notificationsUserAjax')->name('notificationsUser');
Route::post('/notificationsUpdate', 'NotificationController@notificationsUpdateAjax')->name('notificationsUpdate');
