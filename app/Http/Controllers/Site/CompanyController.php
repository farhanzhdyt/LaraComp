<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
{
	public function __construct() 
	{
		return $this->middleware('auth');
	}

    public function index() 
    {
		if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
		}

        return view('site.company.index');
    }

    public function create() 
    {
		if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
		}

        return view('site.company.create');
    }

    public function store(Request $request) 
    {
		if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
		}

    	$this->validate($request, [
    		'company_name' => 'required',
    		'company_history' => 'required',
    		'vission' => 'required',
    		'mission' => 'required',
    		'type_of_products' => 'required',
    		'owner' => 'required',
    		'country' => 'required',
    		'launched' => 'required',
    		'company_address' => 'required'
    	]);

    	$company = Company::create($request->all());

    	return redirect()->back()->with('success', 'Data successfully created');

    }
}
