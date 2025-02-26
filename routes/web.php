<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/verify-recaptcha', function (Request $request) {
    $token = $request->input('token');
    $secretKey = env('RECAPTCHA_SECRET_KEY');

    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => $secretKey,
        'response' => $token,
    ]);

    return response()->json($response->json());
});
