<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();});

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[UserController::class,'create']);

Route::middleware('auth')->group(function()
{
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/refresh',[AuthController::class,'refresh']);

    Route::get('/users',[UserController::class,'list']);
    Route::get('/users/{id}',[UserController::class,'get']);
    Route::put('/users/{id}',[UserController::class,'update']);
    Route::delete('/users/{id}',[UserController::class,'delete']);

    Route::get('/users/{id}/posts',[PostController::class,'list']);

    Route::get('/users/{id}/friends',[FriendController::class,'list']);
    Route::delete('/users/{id}/friends/{fid}',[FriendController::class,'list']);

    Route::get('/users/{id}/friend-requests',[FriendRequestController::class,'list']);
    Route::post('/users/{id}/friend-requests',[FriendRequestController::class,'create']);
    Route::put('/users/{id}/friend-requests/{frid}',[FriendRequestController::class,'update']);
    Route::delete('/users/{id}/friend-requests/{frid}',[FriendRequestController::class,'delete']);

    Route::get('/posts/{id}',[PostController::class,'get']);
    Route::put('/posts/{id}',[PostController::class,'update']);
    Route::delete('/posts/{id}',[PostController::class,'delete']);

    Route::get('/posts/{id}/likes',[LikeController::class,'list']);
    Route::post('/posts/{id}/likes',[LikeController::class,'create']);
    Route::delete('/posts/{id}/likes',[LikeController::class,'delete']);

    Route::get('/posts/{id}/comments',[CommentController::class,'list']);
    Route::post('/posts/{id}/comments',[CommentController::class,'create']);
    Route::put('/posts/{id}/comments',[CommentController::class,'update']);
    Route::delete('/posts/{id}/comments',[CommentController::class,'delete']);


});



