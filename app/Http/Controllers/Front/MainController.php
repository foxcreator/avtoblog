<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

//    public function homePage()
//    {
//        $posts = Article::all();
//        return view('front.main-page.home', compact('posts'));
//    }
}
