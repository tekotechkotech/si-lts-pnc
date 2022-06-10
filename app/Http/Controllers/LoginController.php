<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->Username, 'password' => $request->Password])) {
            $request->session()->regenerate();


            if (Auth::user()->role == "alumni") {
                return redirect(route('alumni.dashboard'));
            }elseif (Auth::user()->role == "admin") {
                return redirect(route('admin.dashboard'));
            } else {
                return back()->withErrors([
                    'password' => 'Wrong Username or Password',
                ]);
            }

        }

        return back()->withErrors([
            'password' => 'Wrong Username or Password',
        ]);
    }
    
    public function cek()
    {
                if (Auth::user()->role == "alumni") {
                    return redirect(route('alumni.dashboard'));
                }

                if (Auth::user()->role == "admin") {
                    return redirect(route('admin.dashboard'));
                }

                return redirect(route('logins'));
                
    }
}
