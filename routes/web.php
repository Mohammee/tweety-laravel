<?php

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
//\Illuminate\Support\Facades\DB::listen(function ($query){
//    var_dump($query->sql,$query->bindings);
//});
//auth()->logout();
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [\App\Http\Controllers\TweetsController::class, 'index'])->name('home');
    Route::post('/tweets', [\App\Http\Controllers\TweetsController::class, 'store']);
     Route::post('/tweet/{tweet}/like' , [\App\Http\Controllers\TweetLikesController::class , 'store']);
     Route::delete('/tweet/{tweet}/dislike' , [\App\Http\Controllers\TweetLikesController::class , 'destroy']);
     Route::delete('/tweet/{tweet}/delete' , [\App\Http\Controllers\TweetsController::class , 'destroy']);
    Route::get('/profile/{user:username}/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->middleware('can:edit,user');
    Route::post('/profile/{user:username}/follow', [\App\Http\Controllers\FollowController::class, 'store'])->name('follow');
    Route::patch('/profile/{user:username}/update', [\App\Http\Controllers\ProfileController::class, 'update'])->middleware('can:edit,user');
    Route::get('/explore', \App\Http\Controllers\ExploreController::class)->name('explore');
    Route::get('/notifications' , \App\Http\Controllers\NotificationController::class);
});

Route::get('/profile/{user:username}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');



