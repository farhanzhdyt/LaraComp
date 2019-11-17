<?php

namespace App\Http\Controllers\Site;

use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
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

        $testimonials = Testimonial::when($request->keyword, function($query) use ($request) {
            $query->where('client_name', 'LIKE', "%{$request->keyword}%");
        })->paginate(10);

        return view('site.testimonial.index', compact('testimonials'));
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

        return view('site.testimonial.create');
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
            'client_name' => 'required',
            'review' => 'required'
        ]);

        $testi = New Testimonial;
        $testi->client_name = $request->input('client_name');
        $testi->review = $request->input('review');
        $testi->save();

        return redirect()->route('testmonial.index')->with('success', 'Data successfully created');
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

        $testimonial = Testimonial::findOrFail($id);
        return view('site.testimonial.show', compact('testimonial'));
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

        $testimonial = Testimonial::findOrFail($id);
        return view('site.testimonial.edit', compact('testimonial'));
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
            'client_name' => 'required',
            'review' => 'required'
        ]);

        $testi = Testimonial::findOrFail($id);
        $testi->client_name = $request->input('client_name');
        $testi->review = $request->input('review');
        $testi->save();

        return redirect()->route('testimonial.index')->with('success', 'Data successfully updated');
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
        
        $testi = Testimonial::findOrFail($id);
        $testi->delete();

        return redirect()->back()->with('success', 'Data succesffuly deleted');
    }
}
