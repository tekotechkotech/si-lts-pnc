<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CekQRController extends Controller
{
    public function cek($id)
    {
        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('legals.legal_id', $id)
        ->first();

        // dd($legal);
        return view('cek', compact('legal'));
    }
}
