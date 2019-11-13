<?php

namespace App\Http\Controllers\Site;

use App\News;
use App\Team;
use App\User;
use App\Career;
use App\Pricing;
use App\Product;
use App\Service;
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
        if (auth()->user()->level !== "ADMIN" && 
            auth()->user()->level !== "ADMIN_PROFILE" && 
            auth()->user()->level !== "ADMIN_BERITA"
            )
        {
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
        $services = Service::all()->count();

        return view('site.dashboard', compact(
            'products', 
            'pricing', 
            'users',
            'testi',
            'team',
            'careers',
            'news',
            'categories',
            'services'
        ));
    }
}
