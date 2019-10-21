<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use File;

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

    public function index(Request $request)
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $keyword = $request->get('keyword');
        $users = User::all();
        
        if($keyword) {
            $users = User::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('name', 'asc')->paginate(10);
        }

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

        $this->validate($request, [
            'image' => 'nullable|image|max:2040',
            'name' => 'required|max:50|unique:users,name',
            'address' => 'required|max:255',
            'email' => 'required|email|unique:users,email' ,
            'phone' => 'required|numeric|digits_between:1,13|unique:users,phone',
            'password' => 'required|min:8|max:20',
            'password_confirmation' => 'required|same:password',
            'level' => 'required',
            'status' => 'required'
        ]);


        if($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/users_images/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }
        
        $user = new User;
        $user->image = $fileNameToStore;
        $user->name = $request->get('name');
        $user->level = strtoupper($request->input('level'));
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->password = \Hash::make($request->input('password'));
        $user->status = $request->input('status');

        $user->save();
        return redirect()->route('users.index')->with('success', 'User successfully created');
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

        $user = User::findOrFail($id);

        return view('site.users.show', compact('user'));
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

        $user = User::findOrFail($id);

        return view('site.users.edit', compact('user'));
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

        $this->validate($request, [
            'image' => 'nullable|image|max:2040',
            'name' => 'required|unique:users,name,' . $id,
            'address' => 'required',
            'email' => 'required|email|unique:users,email,'. $id,
            'phone' => 'required|numeric|digits_between:1,13|unique:users,phone,' . $id,
            'level' => 'required',
            'status' => 'required'
        ]);


        if($request->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '-' . rand() . '.' . $ext;

            $path = $request->file('image')->move('images/users_images/', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.png";
        }

        $user = User::findOrFail($id);

        if ( $request->hasFile("image") ) {
            if ( $user->image !== "noimage.png" ) {
                File::delete('images/users_images/' . $user->image);
            }
                $user->image = $fileNameToStore;
        }

        $user->name = $request->input('name');
        $user->status = $request->input('status');
        $user->level = strtoupper($request->input('level'));
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        
        $user->save();
        return redirect()->route('users.index')->with('edit', 'User successfully updated');
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
        $user = User::findOrFail($id);
        // Check For Image

        if($user->image !== "noimage.png") {
            File::delete('images/users_images/' . $user->image);
        }

        $user->delete();

        return redirect()->route('users.index')->with('delete', 'User Has Been Removed');
    }
}
