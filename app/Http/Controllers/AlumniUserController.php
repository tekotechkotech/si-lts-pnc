<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumniUserController extends Controller
{
    public function index()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        // ->join('tracers', 'alumnis.id', '=', 'tracers.alumni_id')
        // ->join('legals', 'alumnis.id', '=', 'legals.alumni_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        // dd($all);

        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.id')
        ->where('alumnis.id', $all->id)
        ->first();

        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.id')
        ->where('alumnis.id', $all->id)
        ->first();

        return view('_alumni.alumni', compact('all', 'tracer', 'legal'));
    }

    public function profil()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();


        return view('_alumni.alumni_profil', compact('all'));
    }

    public function profil_datadiri()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_alumni.alumni_profil_datadiri', compact('all'));
    }

    public function profil_alamat()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_alumni.alumni_profil_alamat', compact('all'));
    }

    public function profil_password()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_alumni.alumni_profil_password', compact('all'));
    }

}
