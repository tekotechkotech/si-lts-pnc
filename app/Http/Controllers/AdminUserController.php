<?php

namespace App\Http\Controllers;

use App\Models\Tracer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    function index(){
        $users = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->get();

        // dd($users);

        return view('_admin.dashboard', compact('users'));
    }


    public function tracer()
    {
        // $users = DB::table('users')
        // ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        // ->where('users.id', Auth::user()->id)
        // ->get();

        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        // ->where('tracers.user_id', Auth::user()->id)
        ->get();

        // dd($tracer);
        // dd($users);
        return view('_admin.tracer', compact('tracer'));
    }
}
