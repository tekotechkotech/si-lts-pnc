<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);
        // dd("Alumni");

        if (Auth::attempt(['username' => $request->Username, 'password' => $request->Password])) {
            $request->session()->regenerate();


            if (Auth::user()->role == "alumni") {
                return redirect(route('alumni.dashboard'));
            }elseif (Auth::user()->role == "admin") {
                return redirect(route('admin.dashboard'));
            } else {
                return back()->withErrors([
                    'password' => 'Username atau Password salah',
                ]);
            }
            
        }
        
        // dd("anda tidak punya akses");
        return back()->withErrors([
            'password' => 'Wrong Username or Password',
        ]);
    }
    
    public function cek()
    {
        if (Auth::check()) {
            
            if (Auth::user()->role == "alumni") {
                return redirect(route('alumni.dashboard'));
            }
            
            if (Auth::user()->role == "admin") {
                return redirect(route('admin.dashboard'));
            }
        }

                return redirect(route('login'));
                
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
