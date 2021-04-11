<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\userCovid;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $usermail = $req->session()->get('email');
        $id_user =  User::where('email',$usermail)->get('id');
        foreach ($id_user as $key => $attribute) {
            $id = $attribute->id; //get the user id
        }
        $user = userCovid::where('id_user', $id)->paginate(5);

        $provinces = Province::pluck('name', 'id');
        return view('user.user_dashboard', [
            'provinces' => $provinces,
            'user' => $user,
        ]);
    }

    public function register()
    {
        return view('user.register');
    }

    public function registering(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|min:3|email',
            'password' => 'required|min:6',
        ]);

        $name = $request->input('name');
        $regist = new User;
        $regist->name = $request->input('name');
        $regist->email = $request->input('email');
        $regist->password = Hash::make($request->input('password'));
        $regist->save();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loging(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');

        $data = User::where('email',$email)->first();
        if($data != null){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                // Session::put('login',TRUE);
                session(['login' => TRUE]);
                return redirect('/user');
            }
            else{
                return redirect()->back()->with('error','The password or email is wrong.');
            }
        }
        else{
            return redirect()->back()->with('error','There is no account with the email.');
        }
    }

    public function city(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($cities);
    }

    public function district(Request $request)
    {
        // not used function
        $villages = Province::where('id', $request->get('id'))
            ->pluck('name', 'id');
    
        return print_r($request);
    }

    public function input(Request $req)
    {
        $provinsi = Province::where('id', $req->input('provinsi'))->value('name');
        $kota = City::where('id', $req->input('kota'))->value('name');

        $checkbox=$req->input('gejala');  
        $chk="";  
        foreach($checkbox as $chk1)  
        {  
            $chk .= $chk1.",";
        } 

        $usermail = $req->session()->get('email');
        $id_user =  User::where('email',$usermail)->get('id');
        foreach ($id_user as $key => $attribute) {
            $id = $attribute->id; //get the user id
        }
        userCovid::create([
            'id_user'=> $id,
            'nama'=> request('nama'),
            'umur'=> request('umur'),
            'gender'=> request('gender'),
            'nik'=> request('nik'),
            'telepon'=> request('telepon'),
            'provinsi'=> $provinsi,
            'kota'=> $kota,
            'alamat'=> request('alamat'),
            'gejala'=> $chk
        ]);
        return redirect('/user');
    }

    public function deleteRow($id)
    {
        userCovid::where('id', $id)->delete();
        return redirect('/user');
    }

    public function updateRow($id)
    {
        userCovid::where('id', $id)
        ->update([
            '' => '',
        ]);
        return redirect('/user');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
