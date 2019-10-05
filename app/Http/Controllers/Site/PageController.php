<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class PageController extends Controller
{
    public function index() 
    {
        $products = Product::all()->count();
        return view('site.dashboard', compact('products'));
    }
}
