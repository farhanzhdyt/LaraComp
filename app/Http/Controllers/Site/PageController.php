<?php

namespace App\Http\Controllers\Site;

use App\News;
use App\Team;
use App\User;
use App\Career;
use App\Pricing;
use App\Product;
use App\Category;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index() 
    {
        if (auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        // Get all data
        $users = User::all()->count();
        $products = Product::all()->count();
        $pricing = Pricing::all()->count();
        $team = Team::all()->count();
        $testi = Testimonial::all()->count();
        $careers = Career::all()->count();
        $news = News::all()->count();
        $categories = Category::all()->count();

        return view('site.dashboard', compact(
            'products', 
            'pricing', 
            'users',
            'company',
            'testi',
            'team',
            'careers',
            'news',
            'categories'
        ));
    }
}
