<?php

namespace App\Http\Controllers;
use App\Models\Register;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'name.required' => 'please add name',
            'email.required'=>'please add valid email'
       ]);
   

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

           // return 'logged in';

        if (Auth::user()->type == 'user') {
            return view('user');
         } else if (Auth::user()->type=='owner') {
             return view('owner');
           }

           return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        }
}
public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}

}
//     public function login(Request $request){
//         $credentials = $request->validate([
//             'email' => ['required', 'email'],
//             'password' => ['required'],
//         ]);
        
//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();
            
//             return 'logged in';
//         }

//         return "not";
//     }

// }
