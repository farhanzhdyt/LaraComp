<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Str;
use File;

class NewsController extends Controller
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
    public function index()
    {
        if  (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $news = News::all();

        return view('site.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        return view('site.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $this->validate($request, [
            'title' => 'required|max:255|unique:news,title',
            'description' => 'required',
            'image' => 'nullable|image|max:2040',
        ]);

        if($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/news_images/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }

        $news = new News;
        $news->image = $fileNameToStore;
        $news->title = $request->get('title');
        $news->slug = Str::slug($request->get('title'));
        $news->description = $request->get('description');
        $news->created_by = auth()->user()->id;
        $news->save();
        $news->category_news()->attach($request->input('categories'));

        return redirect()->route('news.index')->with('success', ' News successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $news = News::findOrFail($id);

        return view('site.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $news = News::findOrFail($id);

        return view('site.news.edit', compact('news'));
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
        if (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $this->validate($request, [
            'title' => 'required|unique:news,title,' . $id,
            'description' => 'required|max:255',
            'image' => 'nullable|image|max:2040',
        ]);

        if ($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/news_images/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($news->image !== "noimage.png") {

                File::delete('images/news_images/' . $news->image);
            }

            $news->image = $fileNameToStore;
        }

        $news->title = $request->get('title');
        $news->slug = Str::slug($request->input('title'));
        $news->description = $request->get('description');
        $news->created_by = auth()->user()->id;
        $news->save();
        $news->category_news()->sync($request->input('categories'));

        return redirect()->route('news.index')->with('edit', 'News successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level == "ADMIN_PROFILE") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $news = News::findOrFail($id);

        $news->delete();

        return redirect()->route('news.index')->with('delete', 'News moved to trash');
    }

    public function newsTrashed()
    {
        $news = News::onlyTrashed()->get();
        return view('site.news.trash.index', compact('news'));
    }

    public function restoreNews($id)
    {
        $news = News::withTrashed()->findOrFail($id);

        if ($news->trashed()) {
            $news->restore();
        }

        return redirect()->route('news.trashed')->with('restore', 'News successfully restored');
    }

    public function deletePermanent($id)
    {
        $news = News::withTrashed()->findOrFail($id);

        if ($news->image !== "noimage.png") {
            File::delete('images/news_images/' .$news->image);
        }
        
        if ($news->trashed()) {
            $news->forceDelete();
        }

        return redirect()->route('news.trashed')->with('delete', 'News permanently deleted!');
    }

    public function showClient($slug)
    {
        $news = News::findOrFail($slug);

        return view('', compact('news'));
    }
}
