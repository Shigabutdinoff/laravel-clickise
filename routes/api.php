<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/users/', [UserController::class, 'create']);
Route::get('/users/{user}', [UserController::class, 'read']);
Route::get('/users/', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'delete']);

Route::post('/companies/', [CompanyController::class, 'create']);
Route::get('/companies/{company}', [CompanyController::class, 'read']);
Route::get('/companies/', [CompanyController::class, 'show']);
Route::put('/companies/{company}', [CompanyController::class, 'update']);
Route::delete('/companies/{company}', [CompanyController::class, 'delete']);

Route::post('/notices/', [NoticeController::class, 'create']);
Route::get('/notices/{notice}', [NoticeController::class, 'read']);
Route::get('/notices/', [NoticeController::class, 'show']);
Route::put('/notices/{notice}', [NoticeController::class, 'update']);
Route::delete('/notices/{notice}', [NoticeController::class, 'delete']);
