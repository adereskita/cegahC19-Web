<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\userCovid;
use App\Models\Admin;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Post;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.adminlogin');
    }

    public function loging(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');

        $data = Admin::where('email',$email)->first();
        if($data != null){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                // Session::put('login',TRUE);
                session(['login' => TRUE]);
                return redirect('/admin');
            }
            else{
                return redirect()->back()->with('error','The password or email is wrong.');
            }
        }
        else{
            return redirect()->back()->with('error','There is no account with the email.');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function district(Request $request)
    {
        $villages = Province::where('id', $request->get('id'))
            ->pluck('name', 'id');
    
        return print_r($request);
    }

    public function search(Request $req)
    {
        $search = $req->search;
        
        //sortable is 3rd party method from columnsortable
        // foreach ($user as $key => $attribute) {
            $user = userCovid::sortable()->where('nama', 'like', '%'.$search.'%')
            ->orderby('created_at', 'desc')
            ->paginate();

            $posts = Post::all();
            $categories = Category::get();

            $provinces = Province::pluck('name', 'id');
            return view('admin.dashboard', [
                'provinces' => $provinces,
                'user' => $user,
                'posts' => $posts,
                'categories' => $categories
            ]);
    }

    public function deleteRow($id)
    {
        userCovid::where('id', $id)->delete();
        return redirect('/admin');
    }
}
