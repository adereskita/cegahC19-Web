<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userCovid;
use Illuminate\Http\Request;
// use Laravolt\Indonesia\Models\City;
// use Laravolt\Indonesia\Models\Province;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

class UserApiController extends Controller
{
    public function signup(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|string|unique:users',
            'password'=>'required'

        ]);

        $user = new User([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);

        $user->save();

        return response()->json([
            'message' => 'User Berhasil ditambahkan.'
        ],201);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required'
        ]);

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Unauthorized.'
            ],401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at)->toDateString()
            ]);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'User Berhasil keluar.'
        ]);
    }

    public function user(Request $request){
        return response()->json([
            'status' => 'oke',
            'data' => [$request->user()]
        ]);
    }


    

    public function login_user(Request $request)
    {

        $user = User::where('email',$request->email)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                return response()->json([
                    'success' => '0',
                    'data' => $user
                ]);
            }

            return response()->json([
                'success' => '1',
                'message' => 'Password Salah.'
            ]);
        } else {
            return $this->error('Email tidak ada.');
        }
    }

    public function error($message){
        return response()->json([
            'success' => '0',
            'message' => $message
        ]);
    }
    

    public function users()
    {
        $users = User::all();
        return response()->json([
            'status' => 'oke',
            'data' => $users
        ]);
    }


    public function covData()
    {
        $covData = userCovid::all();
        return response()->json([
            'status' => 'oke',
            'data' => $covData
        ]);
    }
}
