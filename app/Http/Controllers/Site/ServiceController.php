<?php

namespace App\Http\Controllers\Site;

use App\Service;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
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

        $service = Service::when($request->keyword, function($query) use ($request) {
            $query->where('title', 'LIKE', "%{$request->keyword}%");
        })->paginate();
        
        return view('site.service.index', compact('service'));
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

        return view('site.service.create');
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
            'image' => 'required|image|max:2040',
            'title' => 'required|max:50',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/service/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }

        $service = New Service;
        $service->image = $fileNameToStore;
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->save();

        return redirect()->route('service.index')->with('success', 'Data successfully created');
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

        $service = Service::findOrFail($id);

        return view('site.service.show', compact('service'));
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

        $service = Service::findOrFail($id);

        return view('site.service.edit', compact('service'));
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
            'image' => 'required|image|max:2040',
            'title' => 'required|max:50',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/service/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }

        $service = Service::findOrFail($id);

        if ($request->hasFile("image")) {
            if ($service->image !== "noimage.png") {
                File::delete('images/service' .$service->image);
            }

            $service->image = $fileNameToStore;
        }

        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->save();

        return redirect()->route('service.index')->with('success', 'Data successfully updated');
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

        $service = Service::findOrFail($id);

        if ($service->image !== "noimage.png") {
            File::delete('images/service' .$service->image);
        }

        $service->delete();

        return redirect()->back()->with('success', 'Data successfully deleted');
    }
}
