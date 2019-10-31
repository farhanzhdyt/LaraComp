<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Pricing;

class PageController extends Controller
{
    public function index() 
    {
        $pricing = Pricing::all();
        return view('pages.home', compact('pricing'));
    }

    public function news() 
    {
        $news = News::all();

        return view('pages.news.index', compact('news'));
    }

    public function showNews($slug) 
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('pages.news.show')->with('news', $news);
    }
}
