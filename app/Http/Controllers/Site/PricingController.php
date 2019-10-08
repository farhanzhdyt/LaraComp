<?php

namespace App\Http\Controllers\Site;

use App\Pricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricing = Pricing::paginate();
        return view('site.pricing.index', compact('pricing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $msg = [
            "required" => "form tidak boleh kosong!",
            "numeric" => "form harus berisi nomor"
        ];

        $this->validate($request, [
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ], $msg);

        $pricing = new Pricing;
        $pricing->title = $request->input('title');
        $pricing->optional_description = $request->input('optional_description');
        $pricing->price = $request->input('price');
        $pricing->description = $request->input('description');

        $pricing->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
