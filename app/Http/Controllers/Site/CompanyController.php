<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use File;

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

        $comp = Company::all();

        return view('site.company.index', compact("comp"));
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

        // File Handle
        if ($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' .$ext;

            $path = $request->file('image')->move('images/company/', $fileNameToStore);

        } else {
            $fileNameToStore = "noimage.png";
        }

        $comp = New Company;
        $comp->image = $fileNameToStore;
        $comp->company_name = $request->input('company_name');
        $comp->company_history = $request->input('company_history');
        $comp->vission = $request->input('vission');
        $comp->mission = $request->input('mission');
        $comp->type_of_products = $request->input('type_of_products');
        $comp->owner = $request->input('owner');
        $comp->country = $request->input('country');
        $comp->launched = $request->input('launched');
        $comp->company_address = $request->input('company_address');

        $comp->save();

    	return redirect()->route('company.index')->with('success', 'Data successfully created');

    }

    public function edit($id) 
    {
        if (auth()->user()->level !== "ADMIN") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $comp = Company::findOrFail($id);
        return view('site.company.edit', compact("comp"));
    }

    public function update(Request $request, $id) {
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

        // File Handle
        if ($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' .$ext;

            $path = $request->file('image')->move('images/company/', $fileNameToStore);

        } else {
            $fileNameToStore = "noimage.png";
        }

        $comp = Company::findOrFail($id);

        if($request->hasFile('image')) {
            if($comp->image !== "noimage.png") {
                File::delete('images/company/'. $comp->image);
            }

            $comp->image = $fileNameToStore;
        }

        $comp->company_name = $request->input('company_name');
        $comp->company_history = $request->input('company_history');
        $comp->vission = $request->input('vission');
        $comp->mission = $request->input('mission');
        $comp->type_of_products = $request->input('type_of_products');
        $comp->owner = $request->input('owner');
        $comp->country = $request->input('country');
        $comp->launched = $request->input('launched');
        $comp->company_address = $request->input('company_address');

        $comp->save();

    	return redirect()->back()->with('success', 'Data successfully updated');
    }

    public function destroy($id) {
        $comp = Company::findOrFail($id);
        $comp->delete();

        return redirect()->back()->with('success', 'Data successfully deleted');
    }
}
