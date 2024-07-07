<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{ 
    public function index(){
        return view('register');
    }

    public function store(Request $request) {
        //validation

       User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => $request->password,
            'type' => $request->type, 
        ]);
        
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $request->session()->regenerate();

            //return 'logged in';
            if (Auth::user()->type=='user') {
                return view('user');
             } else if (Auth::user()->type=='owner') {
                 return view('owner');
               }
        }


    }

}


