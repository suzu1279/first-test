<?php

namespace App\Http\Controllers;


use App\Models\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('register');
    }

    public function register(AuthRequest $request)
    {
        $form =$request->all();
        return redirect('/index');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(AuthRequest $request)
    {
        $form= $request->all();
        return view('index');
    }

}