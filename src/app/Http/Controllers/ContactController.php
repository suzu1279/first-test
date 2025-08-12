<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showConfirm()
    {
        return view('confirm');
    }

    public function confirm(Request $request)
    {
        $lastName = $request->input('last_name');
        $firstName = $request->input('first_name');
        $fullName = $firstName.  '  '  . $lastName;
        $tel1 = $request->input('tel1');
        $tel2 = $request->input('tel2');
        $tel3 = $request->input('tel3');
        $tel = $tel1.$tel2.$tel3;
        $contact =[
            'full_name' =>$fullName,
            'gender' =>$request->input('gender'),
            'email' =>$request->input('email'),
            'tel' =>$tel,
            'address' =>$request->input('address'),
            'building' =>$request->input('building'),
            'content' => $request->input('content'),
            'detail' => $request->input('detail'),
        ];
        return view('confirm' , compact('contact'));
    }

    public function store(Request $request)
    {
        $lastName = $request->input('last_name');
        $firstName = $request->input('first_name');
        $fullName = $firstName.  '  '  . $lastName;
        $tel1 = $request->input('tel1');
        $tel2 = $request->input('tel2');
        $tel3 = $request->input('tel3');
        $tel = $tel1.$tel2.$tel3;
        $contact =[
            'full_name' =>$fullName,
            'gender' =>$request->input('gender'),
            'email' =>$request->input('email'),
            'tel' =>$tel,
            'address' =>$request->input('address'),
            'building' =>$request->input('building'),
            'content' => $request->input('content'),
            'detail' => $request->input('detail'),
        ];
        if($request->input('correction')=='correction'){
            return redirect('/')->withInput();
        }
        return view('thanks');
        }

        public function register()
    {
        return view('register');
    }
}
