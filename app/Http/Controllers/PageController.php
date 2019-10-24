<?php

namespace App\Http\Controllers;

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
        return view('pages.news.index');
    }

    public function showNews() 
    {
        return view('pages.news.show');
    }
}
