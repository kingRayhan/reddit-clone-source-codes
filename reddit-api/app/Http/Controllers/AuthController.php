<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->only('username', 'email', 'password'));
        return response()->json([
            'message' => 'You have been registered successfully',
            "data" => $user
        ]);
    }


    public function me()
    {
        return auth()->user();
    }

    public function login(LoginRequest $request)
    {

       if(!auth()->attempt($request->only('email', 'password'))){
            throw new AuthenticationException('invalid credential');
       }

        auth()->user()->update([
            'api_token' => Str::uuid() . '--' . time()
        ]);

        return response()->json([
            'message' => 'login route',
            "access_token" => auth()->user()->api_token
        ]);
    }

    public function logout()
    {
        auth()->user()->update([
            'api_token' => null
        ]);
        return response()->json([
            'message' => 'Logout successfully',
        ]);
    }
}
