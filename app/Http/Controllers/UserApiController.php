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
            'nik'=>'required|unique:users',
            'name'=>'required',
            'email'=>'required|string|unique:users',
            'password'=>'required'

        ]);

        $user = new User([
            'nik'=>$request->nik,
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

    public function inputCovData(Request $request){
        $request->validate([
            'id_user'=> 'required',
            'nama'=> 'required',
            'umur'=> 'required',
            'gender'=> 'required',
            'nik'=> 'required|unique:users',
            'telepon'=> 'required',
            'provinsi'=> 'required',
            'kota'=> 'required',
            'alamat'=> 'required',
            'gejala'=> 'required'
        ]);

        $user = new User([
            'id_user'=> $request->id_user,
            'nama'=> $request->name,
            'umur'=> $request->umur,
            'gender'=> $request->gender,
            'nik'=> $request->nik,
            'telepon'=> $request->telpon,
            'provinsi'=> $request->provinsi,
            'kota'=> $request->kota,
            'alamat'=> $request->alamat,
            'gejala'=> $request->gejala
        ]);

        $user->save();

        return response()->json([
            'message' => 'User Berhasil ditambahkan.'
        ],201);
    }

    public function getCovDataUser(Request $request)
    {
        $id = $request->id;
        // $covData = userCovid::all();
        $covData = userCovid::where('id_user', $id);
        return response()->json([
            'status' => 'oke',
            'data' => $covData
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



    //NOT USED ON API just for reference
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
}
