<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auths.login');
    }

    public function loginpost(Request $request)
    {
    	if(Auth::attempt($request->only('email', 'password'))){
            if(Auth::check() && auth()->user()->status == 1 || auth()->user()->status == 2 || auth()->user()->status == 3){
                return redirect()->route('dashboard');
            }
        }

        Auth::logout();
    	return redirect()->route('login');
    }

    public function logout()
    {
	   Auth::logout();
	   return redirect()->route('login');
    }
}
