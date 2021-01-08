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

// use Symfony\Component\Routing\Route;

use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('public/index');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');



//Route::get('/{anypath}','HomeController@index')->where('path','.*');

Route::group(['middleware' => ['auth']], function () {
    // Category

    Route::post('/add-category', 'CategoryController@add_category');
    // Route::get('category','CategoryController@all_category');

    Route::get('category/{id}', 'CategoryController@delete_category');
    Route::get('editcategory/{id}', 'CategoryController@edit_category');
    Route::post('category/{id}', 'CategoryController@update_category');
    Route::get('/deletecategory/{id}', 'CategoryController@selected_category');

    //Post
    Route::get('/post', 'PostController@all_Post');
    Route::get('/delete/{id}', 'PostController@delete_post');
    Route::post('/acceptpost/{id}', 'PostController@accept_post');
    //user
    Route::get('/user', 'UserController@index');
    Route::get('/uservip', 'UserController@getUserVip');
    Route::get('/uservip/{id}', 'UserController@deleteRoleVip');
    Route::post('uservip/{id}', 'UserController@update_RoleVip');
    Route::get('user/{id}', 'UserController@delete_user');

    //thống kê
    Route::get('/getCountPostByCat', 'PostController@getCountPostByCat');
    Route::get('/getdataStatistics', 'PostController@getdataStatistics');
    Route::get('/getCountSex', 'UserController@getCountSex');

});
Route::get('category', 'CategoryController@all_category');


//BlogController

Route::get('/blogpost', 'BlogController@get_all_blog_post');
Route::get('/blogpost/{id}', 'BlogController@getpost_by_id');
Route::get('/categories', 'BlogController@get_all_category');
Route::get('/cities', 'BlogController@get_all_city');
Route::get('/category/{id}/post', 'BlogController@get_all_post_by_cat_id');
Route::get('/search/{s}/post', 'BlogController@search_post');
Route::get('/searchPrice/{price}/post', 'BlogController@getpost_by_price');
Route::get('/searchCity/{city}/post', 'BlogController@getpost_by_city');
Route::get('/searchDate/{date}/post', 'BlogController@getpost_by_date');
Route::get('/latestpost', 'BlogController@latest_post');

Route::post('/saverating/{id}', 'RatingController@saveRating');
Route::get('getratingBlog/{id}', 'BlogController@get_rating_blog_byID');
//
Route::post('/RequestUpdateVip', 'UserController@RequestUpdateVip');

Route::get('/test','BlogController@test');