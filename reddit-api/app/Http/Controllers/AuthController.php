<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        return response()->json([
            'message' => 'request validated'
        ]);
    }


    public function login()
    {
        return response()->json([
            'message' => 'login route'
        ]);
    }
}
