<?php

namespace App\Http\Controllers\Site;

use App\Pricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $pricing = Pricing::when($request->keyword, function ($query) use ($request) {
            $query->where('title', 'LIKE', "%{$request->keyword}%");
        })->paginate();

        return view('site.pricing.index', compact('pricing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        return view('site.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $msg = [
            "required" => "form tidak boleh kosong!",
            "numeric" => "form harus berisi nomor"
        ];

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ], $msg);

        $pricing = new Pricing;
        $pricing->title = $request->input('title');
        $pricing->optional_description = $request->input('optional_description');
        $pricing->price = $request->input('price');
        $pricing->description = $request->input('description');

        $pricing->save();

        return redirect()->back()->with('success', 'Data harga berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $pricing = Pricing::findOrFail($id);

        return view('site.pricing.show', compact("pricing"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $pricing = Pricing::findOrFail($id);

        return view('site.pricing.edit', compact("pricing"));
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
        if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $msg = [
            "required" => "form tidak boleh kosong!",
            "numeric" => "form harus berisi nomor"
        ];

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ], $msg);

        $pricing = Pricing::findOrFail($id);

        $pricing->update($request->all());

        $pricing->save();

        return redirect()->back()->with('success', 'Data harga berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if (auth()->user()->level !== "ADMIN") {
			return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
