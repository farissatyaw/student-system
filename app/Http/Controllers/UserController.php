<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function doLogin(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        if($user)
        {
            if(Hash::check($req->password, $user->password))
        {
            Auth::login($user);
            
            return redirect()->route('account', [$user->uuid]);
        }
        else{
            return redirect()->back()->with('error', 'Username/Password error, please check again!');
        }
        }
        else{
            return redirect()->back()->with('error', 'Username/Password error, please check again!');
        }
        
    }
    public function doLogout()
    {
        Auth::logout();

        return redirect('/');
    }
    public function show(User $user)
    {
        if($user->uuid != auth()->user()->uuid)
        {
            return redirect("/")->with("Error", "Insufficient Access");
        }
        return view('account', compact('user'));
    }
    public function update(User $user, Request $req)
    {
        
        $req->validate([
            'address' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phonenumber' =>'required'
        ]);
        $user->update([
            'address' => $req->address,
            'email' => $req->email,
            'phonenumber' => $req->phonenumber
        ]);
        return redirect()->route('account', [$user->uuid]);
    }
}
