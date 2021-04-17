<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\userCovid;
use Illuminate\Support\Facades\Http;

class LendingController extends Controller
{
    public function index()
    {

        $covids = Http::get('https://api.kawalcorona.com/indonesia')->json();

        foreach ($covids as $covid) {
            $splitt = str_split($covid['positif']);
        }
        
        if (session()->get('email') == null) {
            $posts = Post::offset(0)->limit(3)->get();
            $date = Carbon::now()->translatedFormat('l, d F Y');

            return view('user.lending', compact('posts','date','covids','splitt'));
        }
        // jika user ada, maka kode dibawah akan jalan
        $usermail = session()->get('email');
        $id_user =  User::where('email',$usermail)->get('id');
        foreach ($id_user as $key => $attribute) {
            $id = $attribute->id; //get the user id
        }
        //get gejala id
        $dataGejala = userCovid::where('id_user', $id)->get('gejala')->first();
        if ($dataGejala == null) {
            $posts = Post::offset(0)->limit(3)->get();
            $date = Carbon::now()->translatedFormat('l, d F Y');

        } else {
            $gejala = userCovid::where('id_user', $id)->get('gejala');
            foreach ($gejala as $key => $attribute) {
                $gejala_nama = $attribute->gejala; //get the category id
                $gejalas[] = $gejala_nama;
            }
    
            $vals = implode(',',$gejalas); // set as comma separated value
            $valArrs = explode(',',$vals); // set as array from separated value
            $category = Category::whereIn('title', $valArrs)->get('id');
            foreach ($category as $key => $attribute) {
                $cat_id = $attribute->id; //get the category id
                $ids[] = $cat_id;
            }
    
            $posts = Post::whereIn('category_id', $ids)->limit(3)->get();
            $date = Carbon::now()->translatedFormat('l, d F Y');    
        }
        return view('user.lending', compact('posts','date','covids'));
    }

    public function show(Post $posts)
    {
        return view('user.show_article', compact('posts'));
    }

    public function showAll(Post $posts)
    {
        $posts = Post::paginate(6);
        return view('user.artikel', compact('posts'));
    }
}
