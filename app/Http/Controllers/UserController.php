<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUsers()
    {
        return response()->json(["data"=>User::all()]) ;
    }
}
