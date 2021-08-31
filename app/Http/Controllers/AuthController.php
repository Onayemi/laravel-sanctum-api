<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        //Check Password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad Credential'
            ], 401);
        }

        $token = $user->createToken('myAppToken')->plainTextToken; //myAppToken could be anything

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken; //myAppToken could be anything
        $data = [
            'name' => $user->name,
            'token' => $token
        ];
        Mail::to('onayemi18@gmail.com')->send(new SignupEmail($data));
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }
}
