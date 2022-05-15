<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('user.user');
    }

    public function signupForm(){
        return view('user.user-signup');
    }

    public function signup(Request $request){
        $request->validate([
            'firstName' => 'required|alpha',
            'country' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'agreement' => 'accepted',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'firstName' => $request->firstName,
            'country' => $request->country,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);
        session()->flash('succes', 'Successful registration');
        Auth::login($user);
        return redirect('user');
    }
}
