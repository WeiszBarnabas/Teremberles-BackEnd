<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function Register(Request $request){

        $user = User::create([
            'name' => "alka ida",
            'email' => $request->email,
            'password' => Hash::make('jelszo1'),
        ]);

        $data = [
            'user' => $user,
            'token' => $user->createToken('API token')->plainTextToken,
        ];

        return response()->json(["error" => false, "user" => $data], 201);
    }

    // TODO VALIDATE REQUEST
    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => "jelszo1"])) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $data = [
            'user' => $user,
            'token' => $user->createToken('token')->plainTextToken
        ];

        return response()->json($data, 200);
    }



}
