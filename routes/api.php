<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(
    function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::apiResource('missions', MissionController::class);
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('technologies', TechnologyController::class);


    }
);
