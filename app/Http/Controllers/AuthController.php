<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validators;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \stdClass;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller{

    public function register(Request $request){

        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user, 'access_token'=>$token, 'token_type'=>'Bearer',]);

    }

    public function login(Request $request){

        $user = User::where('email', $request['email'])->firstOrFail();
        $token= $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'=> 'hi '.$user->name,
            'accessToken'=> $token,
            'token_type'=> 'Bearer',
            'user'=> $user,
        ]);

    }

    /*public function logout(Request $request) {
        $user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }*/

}