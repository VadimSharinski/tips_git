<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index(){
        return view('manager.manager');
    }

    public function signupForm(){
        return view('manager.manager-signup');
    }

    public function signup(Request $request){
        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
//            'country' => 'required|alpha',
            'phone' => 'required|digits:12',
            'email' => 'required|email|unique:users',
            'agreement' => 'accepted',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country_id' => 1,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        session()->flash('succes', 'Successful registration');
        Auth::login($user);
        return redirect('manager');
    }

    public function signinForm(){
        return view('manager.manager-signin');
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            session()->flash('success', 'You are logged');
            return redirect('manager');
        }
        return redirect()->back()->with('error', 'Incorrect login or password!');
    }

    public function profile(){
        return view('manager.manager-profile');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('manager.signin');
    }

    public function edit(Request $request){
        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
//            'country' => 'required|alpha',
            'phone' => 'required|digits:12',
        ]);

        User::where("email", auth()->user()->email)->update(
            [   'first_name' => $request->first_name,
                'last_name' => $request->last_name,
//                'country' => $request->country,
                'phone' => $request->phone,
            ]);

        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
//                'country' => $request->country,
            'phone' => $request->phone,
        ]);
        return redirect()->back();
    }


}
