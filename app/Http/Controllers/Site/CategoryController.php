<?php

namespace App\Http\Controllers\Site;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $categories = Category::all();

        return view('site.category.index', compact('categories'));
    }

    public function create()
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        return view('site.category.create');
    }

    public function store(Request $request)
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $this->validate($request, [
            'name_category' => 'required|unique:categories,name_category|max:20'
        ]);

        Category::create([
            'name_category' => $request->name_category,
            'created_by' => auth()->user()->id 
        ]);

        return redirect()->route('categories.index')->with('success', 'Category successfully created');
    }

    public function show($id)
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $category = Category::findOrFail($id);

        return view('site.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $category = Category::findOrFail($id);

        return view('site.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $this->validate($request, [
            'name_category' => 'required|unique:categories,name_category|max:20'
        ]);

        Category::where('id', $category->id)
            ->update([
                'name_category' => $request->name_category,
                'updated_by' => auth()->user()->id,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category moved to trash');
    }

    public function getCategories(Request $request)
    {
        $keyword = $request->get('q');
        $categories = Category::where('name_category', 'LIKE', '%' . $keyword . '%')->get();
        return $categories;
    }

    public function categoryTrashed()
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $categories = Category::onlyTrashed()->get();
        return view('site.category.trash.index', compact('categories'));
    }

    public function restoreCategory($id)
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $category = Category::withTrashed()->findOrFail($id);

        if ($category->trashed()) {
            $category->restore();
        }

        return redirect()->route('categories.trashed')->with('success', 'Category successfully restored');
    }

    public function deletePermanent($id)
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $category = Category::withTrashed()->findOrFail($id);

        if ($category->trashed()) {
            $category->forceDelete();
        }

        return redirect()->route('categories.trashed')->with('error', 'Category permanently deleted!');
    }
}
