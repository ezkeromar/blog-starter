<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sectors', 'api\SectorsController@getSectors');
Route::get('/categories', 'api\CategoriesController@getCategories');
Route::get('/posts', 'api\PostsController@getPosts');
Route::get('/offers', 'api\OffersController@getOffers');

Route::group([

    'middleware' => 'api',
    'namespace' => '\App\Http\Controllers'

], function ($router) {
    Route::post('/login', 'AuthController@login');
    Route::post('/me', 'AuthController@me');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
});