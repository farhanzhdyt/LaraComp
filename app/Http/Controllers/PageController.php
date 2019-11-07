<?php

namespace App\Http\Controllers;

use App\News;
use App\Company;
use App\Pricing;
use App\Category;
use App\Testimonial;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {
        $pricing = Pricing::all();
        $testi = Testimonial::all();
        $services = Service::orderBy('id', 'desc')->get();
        return view('pages.home', compact('pricing', 'testi', 'services'));
    }

    public function news() 
    {
        $news = News::orderBy('id', 'desc')->paginate(8);

        return view('pages.news.index', compact('news'));
    }

    public function showNews($slug) 
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('pages.news.show')->with('news', $news);
    }

    public function about() 
    {
        $laracomp = Company::all();
        return view('pages.about', compact('laracomp'));
    }
}
