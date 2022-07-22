<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Legal;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use PDF;

class ProsesLegalController extends Controller
{
    public function index($id)
    {
        // $legal = DB::table('users')
        // ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        // ->where('users.id', Auth::user()->id)
        // ->get();

        if ($id == 'legal') {
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

        }
        // elseif ($id == 'cetak') {
        //     $legal = DB::table('legals')
        //     ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        //     ->join('users', 'alumnis.user_id', '=', 'users.id')
        //     ->where('legals.level_acc', 2)
        //     ->get();

        //     $proses="proses-legal";
        //     $apa="cetak";

        // }elseif ($id == 'ambil') {
        //     $legal = DB::table('legals')
        //     ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        //     ->join('users', 'alumnis.user_id', '=', 'users.id')
        //     ->where('legals.level_acc',3)
        //     ->get();

        //     $proses="proses-legal";
        //     $apa="ambil";

        // }
        else {
            // $legal = DB::table('legals')
            // ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            // ->join('users', 'alumnis.user_id', '=', 'users.id')
            // ->where('legals.level_acc', '=', '0')
            // ->get();

        }
            
        return view('_admin.legal', compact('legal', 'proses', 'apa'));
    }

    public function detail($id,$apa)
    {
        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('legal_id', $id)
        ->first();

        if ($apa == 'legal') {
            $proses="";
            $apa="legal";

        }elseif ($apa == 'verifikasi') {
            $proses="proses-legal";
            $apa="verifikasi";

        }elseif ($apa == 'legalisir') {
            $proses="proses-legal";
            $apa="legalisir";

        }
        // elseif ($id == 'cetak') {
        //     $legal = DB::table('legals')
        //     ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        //     ->join('users', 'alumnis.user_id', '=', 'users.id')
        //     ->where('legals.level_acc', 2)
        //     ->get();

        //     $proses="proses-legal";
        //     $apa="cetak";

        // }elseif ($id == 'ambil') {
        //     $legal = DB::table('legals')
        //     ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        //     ->join('users', 'alumnis.user_id', '=', 'users.id')
        //     ->where('legals.level_acc',3)
        //     ->get();

        //     $proses="proses-legal";
        //     $apa="ambil";

        // }
        else {
            // $legal = DB::table('legals')
            // ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
            // ->join('users', 'alumnis.user_id', '=', 'users.id')
            // ->where('legals.level_acc', '=', '0')
            // ->get();

        }

        return view('_admin.legal_detail', compact('legal', 'proses', 'apa'));
    }


    public function verifikasi($id)
    {
        Legal::where('legal_id', $id)
        ->update([
            'level_acc' => '1'
        ]);
        Alert::success('Berhasil', 'Legalisir Berhasil Di Verifikasi');
        return redirect('/admin/legalisir/verifikasi');
    }
    
    public function legalisir($id)
    {
        $legal = Legal::where('legal_id', $id)
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->first();

        if ($legal->jenis_berkas =="legalisir Ijazah") {
            $pdf = PDF::loadView('template.legallisirIjazah', compact('legal'));
            $pdf->setPaper('A4', 'landscape');

            $path = public_path('assets/legal');
            $fileName =   $legal->name.'-'.$legal->nim.'-'.uniqid().'.pdf' ;
            $pdf->save($path . '/' . $fileName);
            
        }elseif ($legal->jenis_berkas =="legalisir Transkrip Nilai") {
            $pdf = PDF::loadView('template.legallisirTranskrip', compact('legal'));
            $pdf->setPaper('A4', 'potrait');

            

            $path = public_path('assets/legal');
            $fileName =   $legal->name.'-'.$legal->nim.'-'.uniqid().'.pdf' ;
            $pdf->save($path . '/' . $fileName);
        }
            $date = date('Y-m-d', strtotime('+2 month'));

            return $pdf->download('invoice.pdf');
        // Legal::where('legal_id', $id)
        // ->update([
        //     'file_legal'=> $fileName,
        //     'berlaku_sampai'=> $date,
        //     'level_acc' => '2',
        // ]);

        Alert::success('Berhasil', 'Legalisir Berhasil Di-ACC');
        return redirect('admin/legalisir/legalisir');
    }
    
    

    public function tolak(Request $request,$id)
    {
        $request->validate([
            'keterangan' => 'required',
        ]);
        
        Legal::where('legal_id', $id)
        ->update([
            'level_acc' => '3',
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/admin/legalisir/verifikasi');
    }
    
}