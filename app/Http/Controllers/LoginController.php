<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function index(Request $request)
   {
    $this->validate($request, [
        'email'=> 'required|email',
        'password'=> 'required'
    ]);

    $credentials = request(['email', 'password']);
    if (!Auth::attempt($credentials)) {
       return  response([
                'message' => "These credentials do not match our records"
                ], 500);
    }

    $user = User::where('email', $request->email)->first();

    $token = $user->createToken('auth-token')->plainTextToken;
   $response = [
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer',
                'message' => 'welcome back, you\'re now logged in'
                ];
      return response($response, 200);
   }
}
