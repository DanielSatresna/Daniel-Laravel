<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RedirectifAuthenticated;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/');
        }else
        return view('pages.login');
    }

    public function aunthenticate(Request $request){
        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential)){
            return redirect()->intended('/');
        }else{
            return redirect('/login');
        }
    }
    
}
