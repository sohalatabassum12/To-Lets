<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(){
        
        $UserProfile = UserProfile::all();
        return view('profile', compact('UserProfile'));
    }
    public function create(){;
        $userProfiles = Auth::user()->userProfiles;
            return view('create-userprofile');
        }

    public function store(Request $request) {

    //    if ($request->user()->cannot('create', UserProfile::class)) {
    //         abort(403);
    //     }
            //validation
            $request->validate([
                'address' => 'required',
                'nid' => 'required|numeric',
                'birthdate' => 'required',
                'number' => 'required'
            ],
             [
                'address.required' => 'please add address',
                'nid.required' => 'please add NID Number',
                'birthdate.required' => 'please add  birthdate',
                'number.required' => 'please add Your Contact Number'
            ]);
    
    if ($file = $request->file('image')) {
       
        $user_image = time() . $file->getClientOriginalName();

        $file->move('images', $user_image);
    }
    //auth()->user()->products()->create([
        UserProfile::create([

                'address'=> $request->address,
                'image'  =>$user_image,
                'nid'  => $request->nid,
                'birthdate'  => $request->birthdate, 
                'number'  => $request->number,
                'user_id'=>Auth::user()->id 
        ]);
            return redirect()->route('profile.list'); 
        }
    public function edit($id,UserProfile $UserProfile)
        {
            $UserProfile = UserProfile::findOrFail($id);

            return view('edit-profile', compact('UserProfile'));
        }


public function update($id, Request $request)
{
    $UserProfile = UserProfile::findOrFail($id);
    
    if ($file = $request->file('image')) {
       
        $user_image = time() . $file->getClientOriginalName();

        $file->move('images', $user_image);
    }

    $UserProfile->update([
        'address'=> $request->address,
        'image'  =>$user_image,
        'nid'  => $request->nid,
        'birthdate'  => $request->birthdate, 
        'number'  => $request->number,
        
    ]);

    return redirect()->route('profile.list');
}
public function delete(UserProfile $profile) {

     
    unlink(public_path(). '/images/' . $profile->image);
    $profile->delete();

    return to_route('profile.list');
}


}
