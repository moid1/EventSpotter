<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
        ];

        // dd($credentials);
       if( Auth::attempt($credentials)){
        return redirect()->intended('/');
       }else
       return redirect()->back();
           
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}

