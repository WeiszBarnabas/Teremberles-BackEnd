<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UniOffersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;



Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

//   Route::get('/forms', [FormController::class, 'getAll']);
    Route::get('/forms', [FormController::class, 'getFormData']);
    Route::get('/forms/{search}', [FormController::class, 'getFormData']);
    Route::get('/form/{id}', [FormController::class, 'getFormDataById']);
    Route::patch('/reject-form', [FormController::class, 'rejectForm']);
    Route::patch('/accept-form', [FormController::class, 'acceptForm']);
    Route::patch('/modify-form', [FormController::class, 'modifyForm']);
    Route::post('/accept-famulus-offer', [FormController::class, 'famulus_offer']);
    Route::post('/university-accept', [FormController::class, 'accept_famulus_by_uni']);



    Route::get('/get-prices', [PriceController::class, 'getPrices']);
    Route::get('/get-uni-prices', [PriceController::class, 'getUniPrices']);



    Route::post('/create-price', [PriceController::class, 'createPrice']);
    Route::post('/update-price', [PriceController::class, 'updatePrice']);
    Route::post('/alluser', [UserController::class, 'getUsers']);


    Route::post('/send-uni-prices', [UniOffersController::class, 'create']);
    Route::post('/show-uni-offer', [UniOffersController::class, 'show_offer']);

    Route::post('/accept-event', [FormController::class, 'accept_event']);
    Route::post('/modify-request-event', [FormController::class, 'mod_req']);

    Route::post('/add-doc-event', [FormController::class, 'set_document']);
    Route::post('/del-doc', [FormController::class, 'cancel_doc']);
    Route::post('/update-docs', [FormController::class, 'update_doc']);

    Route::get('/get-documents', [FormController::class, 'get_docs']);

    Route::post('/send-to-law', [FormController::class, 'to_law']);
    Route::post('/accept-by-law', [FormController::class, 'accept_law']);
    Route::post('/accept-by-client', [FormController::class, 'accept_client']);
    Route::post('/accept-by-univerzity', [FormController::class, 'accept_uni']);
    Route::post('/alairvaMinden', [FormController::class, 'accept_evr']);



});

Route::get('/generate-docx/{event}/{type}', [FormController::class, 'generateDocx']);

Route::post('/register', [AuthController::class, 'register']);

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

Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
