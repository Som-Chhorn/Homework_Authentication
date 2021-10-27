<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\Controllers\PostController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public route

// User
Route::post('/users',[UserController::class, 'register']);
Route::post('/users',[UserController::class, 'login']);
// Post
Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{id}',[PostController::class, 'show']);


// Private route
Route::group(["middleware"=>["auth:sanctum"]], function (){
    
    // User
    Route::post('/users',[UserController::class, 'logout']);

    // Post
    Route::post('/posts',[PostController::class, 'store']);
    Route::put("posts/{id}",[PostController::class,"update"]);
    Route::delete('/posts/{id}',[PostController::class, 'destroy']);
 
});
