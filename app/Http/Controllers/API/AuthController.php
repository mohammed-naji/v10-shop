<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->where('type', 'admin')->first();

        if($user) {

            if(Hash::check($request->password, $user->password)) {

                $token = $user->createToken('login');

                return ['token' => $token->plainTextToken];

                return $user;
            }else {
                return [
                    'message' => 'Password does not match'
                ];
            }


        }else {
            return [
                'message' => 'User not found'
            ];
        }


    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
