<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->group(function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/search', [BookController::class, 'search']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    
    Route::get('/descriptions', [DescriptionController::class, 'index']);
    Route::get('/descriptions/{id}', [DescriptionController::class, 'show']);
    
    Route::get('/comments/search', [CommentController::class, 'search']);
    Route::post('/comments', [CommentController::class, 'store']);

    Route::get('/reading-groups', [ReadingGroupController::class, 'index']);
    Route::get('/reading-groups/{groupId}/users', [UsersHasReadingGroupsController::class, 'index']);
    Route::post('/reading-groups/{groupId}/users/{userId}', [UsersHasReadingGroupsController::class, 'store']);
    Route::delete('/reading-groups/{groupId}/users/{userId}', [UsersHasReadingGroupsController::class, 'destroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);