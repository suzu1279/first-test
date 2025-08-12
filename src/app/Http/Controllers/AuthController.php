<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;
use App\Models\Contact;
use App\Http\Requests\AuthRequest;
use livewire\Modal;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(AuthRequest $request)
    {
        $form =$request->all();
        return redirect('/admin');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(AuthRequest $request)
    {
        $form= $request->all();
        return view('admin');
    }

    public function admin()
    {
        $contacts:: Contact::all();
        $contacts = Contact::Paginate(7);
        return view('admin',['contacts' => $contact]);
    }

    public function find()
    {
        return view('admin', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Contact::where('name','LIKE',"%{$request->contacts}%")->first();
        $item = Contact::where('email','LIKE',"%{$request->contacts}%")->first();
        $item = Contact::where('gender','LIKE',"%{$request->contacts}%")->first();
        $item = Contact::where('detail','LIKE',"%{$request->contacts}%")->first();
        $item = Contact::where('date','LIKE',"%{$request->contacts}%")->first();
        $param = [
            'contacts' =>$request->contact,
            'item' => $item
        ];
        return view('admin', $param);
    }


    public function modal()
    {
        return view('modal');
    }
}
