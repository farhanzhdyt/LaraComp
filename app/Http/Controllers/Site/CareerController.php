<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Career;

class CareerController extends Controller
{
    public function __construct() 
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $careers = Career::when($request->keyword, function ($query) use ($request) {
            $query->where('job_title', 'LIKE', "%{$request->keyword}%");
        })->paginate();
        return view('site.career.index', compact("careers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        return view('site.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $this->validate($request, [
            'job_title' => 'required',
            'job_description' => 'required',
        ]);

        Career::create($request->all());

        return redirect()->route('career.index')->with('success', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $career = Career::findOrFail($id);

        return view('site.career.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $career = Career::findOrFail($id);

        return view('site.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }

        $this->validate($request, [
            'job_title' => 'required',
            'job_description' => 'required',
        ]);

        $career = Career::findOrFail($id);
        $career->job_title = $request->input('job_title');
        $career->job_description = $request->input('job_description');
        $career->save();

        return redirect()->route('career.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level === "ADMIN_BERITA" && auth()->user()->level !== "ADMIN") {
            return abort(403, "Unauthorized Page");
        }
        
        $c = Career::findOrFail($id);
        $c->delete();

        return redirect()->back()->with('success', 'Data successfully deleted');
    }
}
