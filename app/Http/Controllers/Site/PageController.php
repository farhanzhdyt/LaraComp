<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Pricing;

class PageController extends Controller
{
    public function index() 
    {
        $products = Product::all()->count();
        $pricing = Pricing::all()->count();
        return view('site.dashboard', compact('products', 'pricing'));
    }
}
