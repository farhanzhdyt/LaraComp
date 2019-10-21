<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Pricing;
use App\User;

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
        $users = User::all()->count();
        return view('site.dashboard', compact('products', 'pricing', 'users'));
    }
}
