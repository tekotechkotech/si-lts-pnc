<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProsesLegalController extends Controller
{
    public function index($id)
    {
        // $legal = DB::table('users')
        // ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        // ->where('users.id', Auth::user()->id)
        // ->get();

        if ($id == 'data') {
            $legal = DB::table('legals')
            ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            ->join('users', 'alumnis.user_id', '=', 'users.id')
            ->get();

            $proses="";
            $apa="legal";

        }elseif ($id == 'verifikasi') {
            $legal = DB::table('legals')
            ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            ->join('users', 'alumnis.user_id', '=', 'users.id')
            ->where('legals.level_acc',  0)
            ->get();

            $proses="proses-legal";
            $apa="verifikasi";

        }elseif ($id == 'legalisir') {
            $legal = DB::table('legals')
            ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            ->join('users', 'alumnis.user_id', '=', 'users.id')
            ->where('legals.level_acc', 1)
            ->get();

            $proses="proses-legal";
            $apa="legalisir";

        }elseif ($id == 'cetak') {
            $legal = DB::table('legals')
            ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            ->join('users', 'alumnis.user_id', '=', 'users.id')
            ->where('legals.level_acc', 2)
            ->get();

            $proses="proses-legal";
            $apa="cetak";

        }elseif ($id == 'ambil') {
            $legal = DB::table('legals')
            ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            ->join('users', 'alumnis.user_id', '=', 'users.id')
            ->where('legals.level_acc',3)
            ->get();

            $proses="proses-legal";
            $apa="ambil";

        }else {
            // $legal = DB::table('legals')
            // ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            // ->join('users', 'alumnis.user_id', '=', 'users.id')
            // ->where('legals.level_acc', '=', '0')
            // ->get();

        }
            
        return view('_admin.legal', compact('legal', 'proses', 'apa'));
    }

    public function detail($id)
    {
        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('legal_id', $id)
        ->first();

        return view('_alumni.alumni_legal_detail', compact('legal'));
    }


    public function verifikasi($id)
    {
        Legal::where('legal_id', $id)
        ->update([
            'level_acc' => '1'
        ]);

        return redirect()->back();
    }
    
    public function legalisir($id)
    {
        Legal::where('legal_id', $id)
        ->update([
            'level_acc' => '2'
        ]);

        return redirect()->back();
    }
    
    public function cetak($id)
    {
        Legal::where('legal_id', $id)
        ->update([
            'level_acc' => '3'
        ]);

        return redirect()->back();
    }
    
    public function ambil($id)
    {
        Legal::where('legal_id', $id)
        ->update([
            'level_acc' => '4'
        ]);

        return redirect()->back();
    }

    public function tolak($id)
    {
        Legal::where('legal_id', $id)
        ->update([
            'level_acc' => '5'
        ]);

        return redirect()->back();
    }
    
}
