<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

// Home routes
Route::get(
            '/',
            [App\Http\Controllers\HomeController::class, 'index'])
            ->name('home');
Route::get(
            '/home',
            [App\Http\Controllers\HomeController::class, 'index'])
            ->name('home');


Route::group(['prefix'=>'shows'],function (){

// EveryShow Single page
Route::get(
    '/anime-details/{id}',
    [App\Http\Controllers\Anime\AnimeController::class, 'animeDetails'])
    ->name('anime-details');

// Comments route
Route::post(
    '/anime-details/{id}',
    [App\Http\Controllers\Anime\CommentController::class, 'storeComment'])
    ->name('comment');

// Follownig Shows
Route::post(
    '/show-follow/{id}',
    [App\Http\Controllers\Anime\AnimeController::class, 'followExc'])
    ->name('follow');

// Episodes route
Route::get(
    '/anime-watching/{show_id}/{episode_id}',
    [App\Http\Controllers\Anime\AnimeController::class, 'animeWatching'])
    ->name('episode');


// Categories route
Route::get(
'/categories/{category_title}',
[App\Http\Controllers\Anime\AnimeController::class, 'category'])
->name('category');


// Following shows route
Route::get(
'/users/followed-shows',
[App\Http\Controllers\Users\UsersController::class, 'followedShows'])
->name('followed')->middleware('auth:web');

// Categories route
Route::post(
'/search',
[App\Http\Controllers\Anime\AnimeController::class, 'searchShows'])
->name('search');


});
