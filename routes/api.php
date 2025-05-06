<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth:sanctum']], function () {
//   Route::get('/forms', [FormController::class, 'getAll']);
    Route::get('/forms', [FormController::class, 'getFormData']);
    Route::get('/forms/{search}', [FormController::class, 'getFormData']);
    Route::get('/form/{id}', [FormController::class, 'getFormDataById']);
    Route::patch('/reject-form', [FormController::class, 'rejectForm']);
    Route::patch('/accept-form', [FormController::class, 'acceptForm']);
    Route::patch('/modify-form', [FormController::class, 'modifyForm']);
    Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/send-form', [FormController::class, 'createForm']);

Route::post('/verify-recaptcha', function (Request $request) {
    $token = $request->input('token');
    $secretKey = env('RECAPTCHA_SECRET_KEY');

    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => $secretKey,
        'response' => $token,
    ]);

    return response()->json($response->json());
});
