<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $seseorang = $this->validate($request, [
            'email'=> 'require',
            'password'=> 'require',
        ]);
        if(Auth::attempt($seseorang)){
            $request->session()->regenerate();
            
            return redirect()->intended('home');
        }

        return back()->with('err', 'Login gagal haha');
    } 


    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('login');
    }
}
