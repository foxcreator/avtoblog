<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $toSliderArticles = Article::where('to_slider', true)->orderBy('created_at', 'desc')->get();
        $articles = Article::orderBy('created_at', 'desc')->get();
        $randomArticles = Article::get()->take(6);
//        $randomCategories = Category::get()->random(6);
        $randomCategories = Category::all();
        return view('front.main-page.home', compact(
            'articles',
            'toSliderArticles',
            'randomArticles',
            'randomCategories'
        ));
    }

    public function showPost($id)
    {
        $article = Article::find($id);
        return view('front.show-post', compact('article'));
    }

    public function articlesInCategory($categoryId)
    {

        $category = Category::find($categoryId);
        $articles = $category->articles()->paginate(10);
        return view('front.categories.category', compact('category', 'articles'));
    }

    public function categories()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('front.categories.categories', compact('categories'));
    }

    public function sitemap()
    {
        $path = public_path('sitemap.xml');
        if (file_exists($path)) {
            unlink($path);
        }
        SitemapGenerator::create('https://youravto.com.ua/')->writeToFile($path);
        return redirect()->back()->with('success', 'Sitemap file has been update');
    }
}
