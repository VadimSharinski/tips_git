<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.employee');
    }

    public function signupForm(){
        $countries = DB::table('countries')->get();
        return view('employee.employee-signup', compact('countries'));
    }

    public function signup(Request $request){
        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'country_id' => 'required|integer',
            'phone' => 'required|digits:12',
            'email' => 'required|email|unique:users',
            'agreement' => 'accepted',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country_id' => $request->country_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => 'employee',
            'password' => Hash::make($request->password),
        ]);
        session()->flash('succes', 'Successful registration');
        Auth::login($user);
        return redirect()->route('employee.profile');
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
            return redirect()->route('employee.profile');
        }

        return redirect()->back()->with('error', 'Incorrect login or password!');
    }

    public function profile(){
        $userCountry = User::find(auth()->user()->id)->country;
        $countries = Country::all();
        return view('employee.employee-profile', compact('userCountry', 'countries'));
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

        User::where("email", auth()->user()->email)->update([   'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'country_id' => $request->country_id,
                'phone' => $request->phone
            ]);

        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country_id' => $request->country_id,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    }

    public function balance(){
        $tipsArray = User::find(auth()->user()->id)->tips;

        $userMoney = User::find(auth()->user()->id)->money;

        $countUserCards = DB::table('cards')
            ->where('user_id', auth()->user()->id)
            ->count();

        $userMoneyPaid = DB::table('payments')
            ->where('user_id', auth()->user()->id)
            ->sum('amount');

        return view('employee.employee-balance', compact('tipsArray', 'userMoney', 'userMoneyPaid', 'countUserCards'));
    }


}
