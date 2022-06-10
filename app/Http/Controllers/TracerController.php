<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TracerController extends Controller
{
    public function index()
    {   
        // $all = DB::table('alumnis')
        // ->get();
        
        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('alumnis.id', Auth::user()->id)
        ->first();

        // dd($tracer);

        return view('_alumni.alumni_tracer', compact('tracer'));
    }

    public function create()
    {
        return view('_alumni.alumni_tracer_tambah');
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
        return view('alumni_tracer_edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
