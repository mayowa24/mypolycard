<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        // dd($request->all());
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user = User::where('email',$request->email)->first();
            if($user->is_admin()){
                return redirect()->route('home');
            }
            return redirect()->route('admin');
        }
        return redirect()->back();
    }
    //
}
