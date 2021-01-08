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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::group(['middleware' => ['jwt.auth']], function () {

    Route::get('profile', 'UserController@getAuthenticatedUser');
    Route::get('editUser/{id}','UserController@edit_user');
    // Route::post('/update-user/{id}','UserController@update_user');
    Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');

    Route::post('/conversation/send', 'ContactsController@send');
    Route::get('/contacts', 'ContactsController@get');
    Route::get('/postByUser','PostController@PostByUser');
    Route::post('/post/{id}','PostController@update_post');
Route::get('/post/{id}','PostController@edit_post');

});
//user
Route::post('/update-user/{id}','UserController@update_user');
//post
Route::post('/post','PostController@save_post');




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
