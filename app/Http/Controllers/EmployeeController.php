<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.employee');
    }

    public function signupForm(){
        return view('employee.employee-signup');
    }

    public function signup(Request $request){
        $request->validate([
            'firstName' => 'required|alpha',
            'patronymic' => 'required|alpha',
            'lastName' => 'required|alpha',
            'country' => 'required|alpha',
            'phone' => 'required|digits:12',
            'email' => 'required|email|unique:users',
            'agreement' => 'accepted',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'firstName' => $request->firstName,
            'patronymic' => $request->patronymic,
            'lastName' => $request->lastName,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        session()->flash('succes', 'Successful registration');
        Auth::login($user);
        return redirect('employee');
    }

    public function signinForm(){
        return view('employee.employee-signin');
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
            return redirect('employee');
        }
        return redirect()->back()->with('error', 'Incorrect login or password!');
    }

    public function profile(){
        return view('employee.employee-profile');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('employee.signin');
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
                'phone' => $request->phone
            ]);

        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
//            'country' => $request->country,
            'phone' => $request->phone,
        ]);
        return redirect()->back();
    }
}
