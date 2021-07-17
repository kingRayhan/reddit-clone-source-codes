<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        // save user to database
        $user = User::create([
           'username' => $request->username,
           'email' => $request->email,
           'password' => bcrypt($request->password)
        ]);

        // mass assignment

//        $user = new User();
//        $user->username = $request->username;
//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->save();


        // send a standard response to client

        return response()->json([
            'message' => 'You have been registered successfully',
            "data" => $user
        ]);
    }


    public function login()
    {
        return response()->json([
            'message' => 'login route'
        ]);
    }
}
