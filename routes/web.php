<?php

use Illuminate\Support\Facades\Route;

// FRONTEND
Route::get('/', 'Frontend\BlogController@index');
Route::get('blog/{blog:slug}', 'Frontend\BlogController@show')->middleware('views');
Route::get('blog/like/{blog_id}', 'Frontend\BlogController@like');
Route::get('blog/hits', 'Frontend\BlogController@hits');
Route::post('blog/store', 'Frontend\BlogKomentarController@store')->middleware('auth');
Route::get('category/{category:slug}', 'Frontend\CategoryController@index');
Route::get('author/{author:username}', 'Frontend\AuthorController@index');
Route::get('download', 'Frontend\DownloadController@index');
Route::get('/downloads/{id}', 'Frontend\DownloadController@download')->name('downloads.download');
// END FRONTEND
// LOGIN DAN REGISTER
Route::get('auth/login', 'Auth\LoginController@index')->name('login')->middleware('guest');
Route::post('auth/login', 'Auth\LoginController@auth');
Route::post('auth/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('auth/daftar', 'Auth\RegisterController@index')->middleware('guest');
Route::post('auth/daftar', 'Auth\RegisterController@store');
// END LOGIN DAN REGISTER
// DASHBOARD
Route::get('dashboard/blog/chekSlug', 'Dashboard\DashboardBlogController@chekSlug')->middleware('auth');
Route::prefix('dashboard')->group(function () {
    Route::get('home/index', 'Dashboard\DashboardController@index')->middleware('auth');
    Route::resource('blog', 'Dashboard\DashboardBlogController')->middleware('admin');
    Route::resource('category', 'Dashboard\DashboardCategoryContoller')->middleware('admin');
    Route::resource('download', 'Dashboard\DownloadController')->middleware('admin');
    Route::resource('support', 'Dashboard\SupportController')->middleware('admin');
});
// s
// END DASHBOARD

// FORUM
// Route::prefix('dashboard/forums')->group(function () {
//     Route::resource('forum', 'Forum\StoreController')->middleware('auth');
//     Route::resource('user/{diskus}', 'Forum\StoreUserController')->middleware('auth');
//     Route::post('delete', 'Forum\StoreUserController@deleteComment')->middleware('auth');    
// });
//  END FORUM


