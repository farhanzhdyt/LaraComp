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
}
