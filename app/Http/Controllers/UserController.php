<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\userCovid;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;





class UserController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $categories = Category::get();
        $user = userCovid::all();

        $provinces = Province::pluck('name', 'id');

        return view('user.user_dashboard', [
            'provinces' => $provinces,
            'user' => $user,
        ]);
    }

    public function city(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($cities);
    }

    public function district(Request $request)
    {
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

        // $value = $req->all();
        userCovid::create([
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

    // public function store(Request $request)
    // {
        // $attr = $request->all();
        // $images = request()->file('image')->store("images");
        // $attr['image'] = $images;
        // Post::create($attr);
        // return back();
    // }

    // public function destroy(Post $id)
    // {
    //     Storage::delete($id->image);
    //     $id->delete();
    //     return back();
    // }
}
