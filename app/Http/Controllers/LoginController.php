<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use app\User;
use Auth;


class LoginController extends Controller
{
    
    public function showLogin()
    {
    	return view('backend.login');
    }

    public function signIn(Request $request)
    {
    	$this->validate($request,[
    		'email' =>'required|email',
    		'password'=>'required'
    	]);

    	if(Auth::attempt(['email' => $request['email'],'password' => $request['password']]))
    	{
    		return redirect()->route('home');
    	}

    	return redirect()->back()->with('message','Your Email Or Password Is Incorrect!');

    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('login_form');
    }
}
