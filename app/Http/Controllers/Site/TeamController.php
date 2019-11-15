<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use File;

class TeamController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(Request $request) 
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $teams = Team::when($request->keyword, function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->keyword}%");
        })->paginate();

    	return view('site.team.index', compact("teams"));
    }

    public function show($id) 
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

    	$teams = Team::findOrFail($id);
    	return view('site.team.show', compact("teams"));
    }

    public function create() 
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

    	return view('site.team.create');
    }

    public function store(Request $request) 
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

    	$msg = [
    		"required" => "Form tidak boleh kosong",
    		"max" => "Karakter maksimal 12"
    	];

    	$this->validate($request, [
            'image' => 'image|max:2040',
    		'nik' => 'required|max:9',
    		'name' => 'required',
    		'address' => 'required',
    		'phone_num' => 'required|max:12',
    		'email' => 'required|email',
    		'position' => 'required'
        ], $msg);
        
        // File Handler
        if ($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' .$ext;

            $path = $request->file('image')->move('images/teams/', $fileNameToStore);

        } else {
            $fileNameToStore = "man.png";
        }

        $team = new Team;
        $team->image = $fileNameToStore;
    	$team->nik = $request->input('nik');
    	$team->name = $request->input('name');
    	$team->address = $request->input('address');
    	$team->phone_num = $request->input('phone_num');
    	$team->email = $request->input('email');
    	$team->position = $request->input('position');

    	$team->save();

    	return redirect()->back()->with('success', 'Data successfully created');
    }

    public function edit($id) 
    {   
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $team = Team::findOrFail($id);
        return view('site.team.edit', compact("team"));
    }

    public function update(Request $request, $id) 
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $msg = [
            "required" => "Form tidak boleh kosong",
            "max" => "Karakter maksimal 12"
        ];

        $this->validate($request, [
            'image' => 'image|max:2040',
            'nik' => 'required|max:9',
            'name' => 'required',
            'address' => 'required',
            'phone_num' => 'required|max:12',
            'email' => 'required|email',
            'position' => 'required'
        ], $msg);

        // File Handler
        if ($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' .$ext;

            $path = $request->file('image')->move('images/teams/', $fileNameToStore);

        } else {
            $fileNameToStore = "man.png";
        }

        $team = Team::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($team->image !== "man.png") {
                File::delete('images/teams/' . $team->image);
            }

            $team->image = $fileNameToStore;

        }

        $team->nik = $request->input('nik');
        $team->name = $request->input('name');
        $team->address = $request->input('address');
        $team->phone_num = $request->input('phone_num');
        $team->email = $request->input('email');
        $team->position = $request->input('position');

        $team->save();

        return redirect()->back()->with('success', 'Data successfully updated');
    }

    public function destroy($id) 
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $team = Team::findOrFail($id);

        // Check image
        if ($team->image !== "man.png") {
            File::delete('images/teams/' . $team->image);
        }

        $team->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }
}
