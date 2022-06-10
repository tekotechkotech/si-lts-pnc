<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LegalController extends Controller
{
    public function index()
    {
        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('users.id', Auth::user()->id)
        ->get();

        // dd($legal);
        return view('_alumni.alumni_legal', compact('legal'));
    }

    public function create()
    {
        return view('_alumni.alumni_legal_tambah');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('alumni_legal_edit');
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
