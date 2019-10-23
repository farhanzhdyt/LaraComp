<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use File;

class ProductController extends Controller
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
        
        $products = Product::when($request->keyword, function($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->keyword}%");
        })->paginate();

        return view('site.product.index', compact('products'));
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

        return view('site.product.create');
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

        $this->validate($request, [
            'image' => 'image|max:2040',
            'name' => 'required',
            'description' => 'required',
        ]);

        // Upload Image
        if ($request->hasFile('image')) {
            // get image name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/products/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }

        $product = New Product;
        $product->image = $fileNameToStore;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        
        $product->save();

        return redirect()->back()->with('success', 'Data successfully created');
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
        
        $product = Product::findOrFail($id);
        return view('site.product.show', compact('product'));
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

        $product = Product::findOrFail($id);

        return view('site.product.edit', compact("product"));
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
        
        $this->validate($request, [
            'image' => 'image|max:2040',
            'name' => 'required',
            'description' => 'required',
        ]);

        // Upload Image
        if ($request->hasFile('image')) {
            // get image name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/products/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->image !== "noimage.png") {
                File::delete('images/products/' . $product->image);
            }
            $product->image = $fileNameToStore;
        }

        $product->image = $fileNameToStore;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        
        $product->save();

        return redirect()->back()->with('success', 'Data successfully updated');
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

        $product = Product::findOrFail($id);
        
        // Check image
        if ($product->image !== "noimage.png") {
            File::delete('images/products' . $product->image);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Data successfully deleted');

    }
}
