<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
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

    public function index()
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $users = User::all();

        return view('site.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        return view('site.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $users = new User;
        $users->name = $request->get('name');
        $users->level = json_encode($request->get('level'));
        $users->email = $request->get('email');
        $users->address = $request->get('address');
        $users->phone = $request->get('phone');
        $users->password = \Has::make($request->get('password'));

        if( $request->file('image') ) {
            $file = $request->file('image')->store('avatars', 'public');

            $users->image = $file;
        }
        $users->save();
        return redirect('users.index')->with('success', 'User successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        return view('site.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        return view('site.users.edit');
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
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->with('success', 'Delete user successfully');
    }
}
