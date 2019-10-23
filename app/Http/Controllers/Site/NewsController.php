<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

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
        if  (auth()->user()->level !== "ADMIN") {
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
        if (auth()->user()->level !== "ADMIN") {
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
        if (auth()->user()->level !== "ADMIN") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        } elseif (auth()->user()->level !== "ADMIN_BERITA") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $this->validate($request, [
            'title' => 'required|max:50|unique:news,title',
            'description' => 'required|max:255',
            'content' => 'required' ,
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
        $news->title = $request->get('title');
        $news->slug = Str::slug($request->input('title'));
        $news->description = $request->get('description');
        $news->content = $request->get('content');
        $news->image = $fileNameToStore;
        $news->created_by = auth()->user()->id;
        $news->save();

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
        if (auth()->user()->level !== "ADMIN") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        } elseif (auth()->user()->level !== "ADMIN_BERITA") {
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
        if (auth()->user()->level !== "ADMIN") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        } elseif (auth()->user()->level !== "ADMIN_BERITA") {
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
        if (auth()->user()->level !== "ADMIN") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        } elseif (auth()->user()->level !== "ADMIN_BERITA") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $this->validate($request, [
            'title' => 'required|max:50|unique:news,title',
            'description' => 'required|max:255',
            'content' => 'required' ,
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

        $news = News::findOrFail($id);

        $news->title = $request->get('title');
        $news->slug = Str::slug($request->input('title'));
        $news->description = $request->get('description');
        $news->content = $request->get('content');
        $news->image = $fileNameToStore;
        $news->created_by = auth()->user()->id;
        $news->save();

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
        if (auth()->user()->level !== "ADMIN") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        } elseif (auth()->user()->level !== "ADMIN_BERITA") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $news = News::findOrFail($id);

        $news->delete();

        return redirect()->route('news.index')->with('delete', 'News Has Been Removed');
    }

    public function showClient($slug)
    {
        $news = News::findOrFail($slug);

        return view('', compact('news'));
    }
}
