<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $token = $user->createToken("api_token")->plainTextToken;
        return response()->json(["status" => "success", "message" => "user created successfully", "data" => ["user_data" => $user, 'token_type' => "Bearer", "access_token" => $token]],201);
    }
    public function login(LoginRequest $request){
        $creds=$request->validated();
        if(!Auth::attempt($creds)){
        
        return response()->json(["status"=>"failed","message"=>"the email or password is wrong"],401);
        }
        $token=$request->user()->createToken("api_token")->plainTextToken;
        return response()->json(["status"=>"success","message"=>"user logged in successfully","access_token"=>$token],200);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(["status"=>"success","message"=>"User logged out successfully"],200);
    }
}
