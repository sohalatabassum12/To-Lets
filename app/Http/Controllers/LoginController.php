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

    //public function loginCheck(Request $req)
     //{
    //     if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
          
    //         if (Auth::user()->enum == 'woner') {
                
    //             return view('woner-profile');
                
    //         } else if (Auth::user()->enum=='user') {
                
    //             return view('user-profile');
    //         }
    //     }else{
    //           return redirect()->back();
    //     }

         
    //}


public function loginCheck(Request $req)
{
    // Validate the request
    $req->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Attempt to authenticate the user
    if (!Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
        return (['login' => 'Invalid credentials']);
    }

    // Retrieve the authenticated user
    $user = Auth::user();

    if (!$user) {
        return redirect()->back()->withErrors(['login' => 'User not found']);
    }

    // Log user details for debugging
    Log::info('Authenticated User:', ['registers' => $user]);

    // Check the enum field
    if ($user->enum == 'woner') {
        return view('woner-profile');
    } else if ($user->enum == 'user') {
        return view('user-profile');
    } else {
        return redirect()->back()->withErrors(['login' => 'Invalid user type']);
    }
}

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return 'logged in';
        }

        return "not";
    }

}
