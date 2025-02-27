<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/forms', [FormController::class, 'getAll']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/send-form', [FormController::class, 'createForm']);
