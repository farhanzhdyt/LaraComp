<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index() 
    {
        return view('site.company.index');
    }

    public function create() 
    {
        return view('site.company.create');
    }
}
