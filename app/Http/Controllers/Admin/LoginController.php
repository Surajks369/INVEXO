<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
   {
    return view('login');
  }

  public function doLogin()
  {
   $input=['email'=>request('email'),'password'=>request('password'),];
   if(auth('admin')->attempt($input,true)){
       return redirect()->route('home');
   }
   else{
     return redirect()->route('login')->with('message','login Invalid');
   }
  }

  public function logout(){
   auth('admin')->logout();
   return redirect()->route('login');
  }
}
