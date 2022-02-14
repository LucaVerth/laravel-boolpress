<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/posts', 'Api\PostsController@index');
// Route::get('posts/{slug}', 'Api\PostsController@show');

Route::namespace('Api')
    ->prefix('posts')
    ->group(function (){
        Route::get('/', 'PostsController@index');
        Route::get('/{slug}', 'PostsController@show');
        Route::get('postcategory/{slug}', 'PostsController@getCategoryPosts');
        Route::get('posttag/{slug}', 'PostsController@getTagPosts');
    });
