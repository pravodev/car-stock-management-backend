<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('pages.authentication.login');
    }
    
    public function login(LoginRequest $request)
    {
        // return response()->json('asdas', 422);
        $fieldUsername = getFieldUsername($request->username);
        $credentials = [
            $fieldUsername => $request->username,
            'password' => $request->password
        ];
        // return response()->json($credentials);
        
        $token = JWTAuth::attempt($credentials);

        // return response()->json($token);
        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $user = User::where($fieldUsername, $request->username)->first();

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {

    }
}
