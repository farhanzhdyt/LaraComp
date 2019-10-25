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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('site.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('site.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_category' => 'required|unique:categories,name_category|max:20'
        ]);

        $category = new Category;
        $category->name_category = $request->get('name_category');
        $category->created_by = auth()->user()->id;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_category' => 'required|unique:categories,name_category|max:20'
        ]);

        $category = Category::findOrFail($id);

        $category->name_category = $request->input('name_category');
        $category->updated_by = auth()->user()->id;
        $category->save();

        return redirect()->route('categories.index')->with('edit', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('delete', 'Category moved to trash');
    }

    public function getCategories(Request $request)
    {
        $keyword = $request->get('q');
        $categories = Category::where('name_category', 'LIKE', '%' . $keyword . '%')->get();
        return $categories;
    }

    public function categoryTrashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('site.category.trash.index', compact('categories'));
    }

    public function restoreCategory($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        if ($category->trashed()) {
            $category->restore();
        }

        return redirect()->route('categories.trashed')->with('restore', 'Category successfully restored');
    }

    public function deletePermanent($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        if ($category->trashed()) {
            $category->forceDelete();
        }

        return redirect()->route('categories.trashed')->with('delete', 'Category permanently deleted!');
    }
}
