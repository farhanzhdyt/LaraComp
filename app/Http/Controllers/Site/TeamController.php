<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;

class TeamController extends Controller
{
    public function index() 
    {
    	$teams = Team::paginate(15);
    	return view('site.team.index', compact("teams"));
    }

    public function show($id) 
    {
    	$teams = Team::findOrFail($id);
    	return view('site.team.show', compact("teams"));
    }

    public function create() 
    {
    	return view('site.team.create');
    }

    public function store(Request $request) 
    {
    	$msg = [
    		"required" => "Form tidak boleh kosong",
    		"max" => "Karakter maksimal 12"
    	];

    	$this->validate($request, [
    		'nik' => 'required|max:9',
    		'name' => 'required',
    		'address' => 'required',
    		'phone_num' => 'required|max:12',
    		'email' => 'required|email',
    		'position' => 'required'
    	], $msg);

    	$team = new Team;
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
        $team = Team::findOrFail($id);
        return view('site.team.edit', compact("team"));
    }

    public function update(Request $request, $id) 
    {
        $msg = [
            "required" => "Form tidak boleh kosong",
            "max" => "Karakter maksimal 12"
        ];

        $this->validate($request, [
            'nik' => 'required|max:9',
            'name' => 'required',
            'address' => 'required',
            'phone_num' => 'required|max:12',
            'email' => 'required|email',
            'position' => 'required'
        ], $msg);

        $team = Team::findOrFail($id);
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
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }
}
