<?php

namespace App\Http\Controllers;

use App\News;
use App\Team;
use App\Career;
use App\Company;
use App\Pricing;
use App\Product;
use App\Service;
use App\Category;
use Carbon\Carbon;
use App\Testimonial;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {
        $pricing = Pricing::all();
        $testi = Testimonial::orderBy('created_at', 'desc')->paginate(6);
        $services = Service::orderBy('id', 'desc')->get();
        return view('pages.home', compact('pricing', 'testi', 'services'));
    }

    public function news(Request $request) 
    {
        Carbon::setLocale('id');

        $news = News::when($request->keyword, function ($query) use ($request) {
            $query->where('title', 'LIKE', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate(6);

        return view('pages.news.index', compact('news'));
    }

    public function showNews($slug) 
    {
        Carbon::setLocale('id');
        
        $news = News::where('slug', $slug)->firstOrFail();

        return view('pages.news.show')->with('news', $news);
    }

    public function about() 
    {
        $laracomp = Company::all();
        return view('pages.about', compact('laracomp'));
    }

    public function career() 
    {
        $career = Career::all();
        return view('pages.career', compact('career'));
    }

    public function product() 
    {
        $product = Product::all();
        return view('pages.product', compact('product'));
    }

    public function team() 
    {
        $team = Team::all();
        return view('pages.team', compact('team'));
    }
}
