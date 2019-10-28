<?php

namespace App\Http\Controllers\Site;

use App\Team;
use App\User;
use App\Company;
use App\Pricing;
use App\Product;
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
        $products = Product::all()->count();
        $pricing = Pricing::all()->count();
        $company = Company::all()->count();
        $team = Team::all()->count();
        $testi = Testimonial::all()->count();
        return view('site.dashboard', compact(
            'products', 
            'pricing', 
            'users',
            'company',
            'testi',
            'team'
        ));
    }
}
