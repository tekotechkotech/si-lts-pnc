<?php

namespace App\Http\Controllers;

use App\Mail\LupaPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PharIo\Manifest\Url;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    public function index()
    {
        $sa = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('jabatan', 'Wakil Direktur 1')->first();

        return view('login', compact('sa'));
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
                if (Auth::user()->status==1) {
                    return redirect(route('alumni.dashboard'));
                }else {
                    return back()->withErrors([
                        'password' => 'Akun NonAktif',
                    ]);
                }
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
            'password' => 'Username atau Password salah',
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

    public function lupa()
    {   
        return view('lupaEmail');
    }

    //KIRIM EMAIL LUPA PASSWORD
    public function lupaKirimEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        $sa = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('jabatan', 'Super Admin')->first();
        // dd(url('/resetPassword/'.$user->id));
        // dd($sa);
        
        // 'id'=>$user->id,

        $isi=[
            'name'=>$user->name,
            'username'=>$user->username,
            'email'=>$user->email,
            'url'=>url('/resetPassword/'.$user->id),
            'sa'=>$sa->name,
        ];

        Mail::to($request->email)->send(new LupaPassword($isi));
        Alert::success('Berhasil', 'Link reset password telah dikirim ke email anda');
        return redirect(route('login'));
    }
    //KIRIM EMAIL LUPA PASSWORD

    public function formPassword($id)
    {
        $user = User::where('id', $id)->first();
        return view('lupaPassword', compact('user'));
    }

    public function resetPasswordAction(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        if ($request->password == $request->password_confirmation) {
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password),
            ]);
            
            Alert::success('Berhasil', 'Password berhasil diubah');
            return redirect(route('login'));
        } else {
            Alert::error('Gagal', 'Password tidak sama');
        }

    }
}
