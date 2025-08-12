<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use livewire\Modal;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);
        return view('index',['contacts' => $contacts]);
    }

    public function find()
    {
        return view('index', ['input' => '']);
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
        return view('index', $param);
    }


    public function modal()
    {
        return view('modal');
    }
}
