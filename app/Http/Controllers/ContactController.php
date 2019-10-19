<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function create() 
    {
        return view('pages.contact');
    }

    public function store(Request $request) 
    {
    	$msg = [
    		'required' => 'Form tidak boleh kosong',
    		'min' => 'Karakter terlalu pendek',
    		'email' => 'Format harus email (contoh: name@example.com)'
    	];

    	$data = request()->validate([
    		'name' => 'required|min:2',
    		'email' => 'required|email',
    		'subject' => 'required',
    		'message' => 'required'
    	], $msg);

    	Mail::to('exampl@laracomp.com')->send(new ContactFormMail($data));

    	return redirect()->route('contact.create')->with('success', 'Pesan anda berhasil dikirim!');
    }
}
