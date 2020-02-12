<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class LoginRequest extends FormRequest
{
    public function wantsJson()
    {
        return true;
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validateAuth = function ($attribute, $value, $fail){
            if(empty(request()->username)) return;

            $username = getFieldUsername(request()->username);
            $user = User::where($username, request()->username)->first();
            if(empty($user)){
                $fail($username . ' dengan nama ' . request()->username . ' tidak ditemukan');
            }elseif(\Hash::check(request()->password, $user->password) == false){
                $fail('Invalid credentials!');
            }
        };

        return [
            'username' => 'required',
            'password' => $validateAuth
        ];
    }
}
