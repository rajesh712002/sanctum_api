<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('index', [PostController::class, 'index']);
    Route::post('store', [PostController::class, 'store']);
    Route::get('show/{id}', [PostController::class, 'show']);
    Route::put('update/{id}', [PostController::class, 'update']);
    Route::delete('destroy/{id}',[PostController::class,'destroy']);

});
