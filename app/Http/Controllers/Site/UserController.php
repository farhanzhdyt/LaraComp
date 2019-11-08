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

    public function index()
    {
        if (auth()->user()->level !== "ADMIN") {
            return redirect()->back()->with('error', 'Unauthorized Page');
        }
        
        $users = User::all();

        return view('site.users.index', compact('users'));
    }

    public function create()
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        return view('site.users.create');
    }

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

    public function show($id)
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $user = User::findOrFail($id);

        return view('site.users.show', compact('user'));
    }

    public function edit($id)
    {
        if(auth()->user()->level !== "ADMIN"){
            return redirect()->back()->with('error', 'Unauthorized Page');
        }

        $user = User::findOrFail($id);

        return view('site.users.edit', compact('user'));
    }

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
        return redirect()->route('users.index')->with('success', 'User successfully updated');
    }

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

        return redirect()->route('users.index')->with('error', 'User Has Been Removed');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->level !== "ADMIN") {
            if(auth()->user()->id !== $user->id) {
                return redirect()->back()->with('error', 'You Cant Access This Page');
            }
        }
        
        return view('site.users.profile.my_profile', compact('user'));
    }

    public function changeProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->level !== "ADMIN") {
            if(auth()->user()->id !== $user->id) {
                return redirect()->back()->with('error', 'You Cant Access This Page');
            }
        }

        $this->validate($request, [
            "name" => "nullable|unique:users,name," . $id,
            "email" => "required|email|unique:users,email," . $id,
            'address' => "nullable|max:200",
            'phone' => "nullable|numeric|digits_between:10,13",
            'image' => 'nullable|image|max:2040',
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

        if ( $request->hasFile("image") ) {
            if ( $user->image !== "noimage.png" ) {
                File::delete('images/users_images/' . $user->image);
            }
                $user->image = $fileNameToStore;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->save();

        return back()->with('success', 'Your Change profile');
    }

    public function profilePassword($id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->level !== "ADMIN") {
            if(auth()->user()->id !== $user->id) {
                return redirect()->back()->with('error', 'You Cant Access This Page');
            }
        }

        return view('site.users.profile.change_password', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:8|max:20',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::findOrFail($id);
        
        if(auth()->user()->level !== "ADMIN") {
            if(auth()->user()->id !== $user->id) {
                return redirect()->back()->with('error', 'You Cant Access This Page');
            }
        }

        $user->password = \Hash::make($request->input('password'));

        if($user->save()) {
            return redirect()->back()->with('success', 'Your Password Has Been Changed');
        } else {
            return redirect()->back()->with('error', 'Failed To Change Password');
        }
    }
}
