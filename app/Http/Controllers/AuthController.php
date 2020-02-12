<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('pages.authentication.login');
    }
    
    public function login(LoginRequest $request)
    {
        $credentials = [
            getFieldUsername($request->username) => $request->username,
            'password' => $request->password
        ];
        
        $attempt = \Auth::attempt($credentials);

        return redirect()->to('/dashboard');
    }

    public function logout(Request $request)
    {

    }
}
