<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Alumni;
use App\Models\Tracer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TracerController extends Controller
{
    public function index()
    {           
        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('users.id', Auth::user()->id)
        ->get();

        // dd($tracer);

        return view('_alumni.alumni_tracer', compact('tracer'));
    }

    public function create()
    {
        
        $provi= DB::table('wilayah')
            ->whereRaw('LENGTH(id_wilayah) < 3')
            ->get();

        return view('_alumni.alumni_tracer_tambah', compact('provi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            
            'rt' => 'required',
            'rw' => 'required',
            'jalan' => 'required',
            
            'tahun_masuk' => 'required',
            'jabatan' => 'required',
            'gaji_awal' => 'required',
            'gaji_sekarang' => 'required',

            'kursus' => 'required',
            'saran' => 'required',
        ]);
        
        $alu = DB::table('alumnis')
        ->where('user_id', Auth::user()->id)
        ->first();

        $id = uniqid();
        // dd($id);

        $ids = Tracer::create([
            'tracer_id' => $id,
            'nama_perusahaan' => $request->name,

            'rt_perusahaan' => $request->rt,
            'rw_perusahaan' => $request->rw,
            'jalan_perusahaan' => $request->jalan,
            'tahun_masuk' => $request->tahun_masuk,
            'jabatan' => $request->jabatan,
            'gaji_awal' => $request->gaji_awal,
            'gaji_sekarang' => $request->gaji_sekarang,

            'alumni_id' => $alu->alumni_id,
        ]);

        
        $prov = DB::table('wilayah')
        ->where('id_wilayah',$request->provinsi)
        ->first();

        // $ids = Auth::user()->id;

        if (isset($prov)) {
            Tracer::where('tracer_id', $ids->tracer_id)->
            update(['provinsi_perusahaan' => $prov->nama_wilayah]);
        }

        $kab = DB::table('wilayah')
        ->where('id_wilayah',$request->kabupaten)
        ->first();

        if (isset($kab)) {Tracer::where('tracer_id', $ids->tracer_id)->
            update(['kabupaten_perusahaan' => $kab->nama_wilayah]);
        }

        $kec = DB::table('wilayah')
        ->where('id_wilayah',$request->kecamatan)
        ->first();

        if (isset($kec)) {Tracer::where('tracer_id', $ids->tracer_id)->
            update(['kecamatan_perusahaan' => $kec->nama_wilayah]);
        }

        $desa = DB::table('wilayah')
        ->where('id_wilayah',$request->desa)
        ->first();

        if (isset($desa)) {Tracer::where('tracer_id', $ids->tracer_id)->
            update(['desa_perusahaan' => $desa->nama_wilayah,
            'id_wilayah_perusahaan' => $request->desa]);
        }

        return redirect()->route('alumni.tracer.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
         
        $provi= DB::table('wilayah')
            ->whereRaw('LENGTH(id_wilayah) < 3')
            ->get();

        $tracer = DB::table('tracers')
        ->where('tracer_id', $id)
        ->first();
// dd($tracer);
        return view('_alumni.alumni_tracer_edit', compact('provi', 'tracer'));

        // return view('_alumni.alumni_tracer_edit');
    }

    public function update(Request $request, $id)
    {   
        // dd($request);   
        
        $request->validate([
            'name' => 'required',
            
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',

            'rt' => 'required',
            'rw' => 'required',
            'jalan' => 'required',

            'tahun_masuk' => 'required',
            'jabatan' => 'required',
            'gaji_awal' => 'required',
            'gaji_sekarang' => 'required',

            'kursus' => 'required',
            'saran' => 'required',
        ]);

        // dd($request);  

        $alu = DB::table('alumnis')
        ->where('user_id', Auth::user()->id)
        ->first();

        $ids = Tracer::where('tracer_id', $id)->update([
            'nama_perusahaan' => $request->name,

            'rt_perusahaan' => $request->rt,
            'rw_perusahaan' => $request->rw,
            'jalan_perusahaan' => $request->jalan,
            'tahun_masuk' => $request->tahun_masuk,
            'jabatan' => $request->jabatan,
            'gaji_awal' => $request->gaji_awal,
            'gaji_sekarang' => $request->gaji_sekarang,

            'alumni_id' => $alu->alumni_id,
        ]);

        
        $prov = DB::table('wilayah')
        ->where('id_wilayah',$request->provinsi)
        ->first();

        // $ids = Auth::user()->id;

        if (isset($prov)) {
            Tracer::where('tracer_id', $id)->
            update(['provinsi_perusahaan' => $prov->nama_wilayah]);
        }

        $kab = DB::table('wilayah')
        ->where('id_wilayah',$request->kabupaten)
        ->first();

        if (isset($kab)) {Tracer::where('tracer_id', $id)->
            update(['kabupaten_perusahaan' => $kab->nama_wilayah]);
        }

        $kec = DB::table('wilayah')
        ->where('id_wilayah',$request->kecamatan)
        ->first();

        if (isset($kec)) {Tracer::where('tracer_id', $id)->
            update(['kecamatan_perusahaan' => $kec->nama_wilayah]);
        }

        $desa = DB::table('wilayah')
        ->where('id_wilayah',$request->desa)
        ->first();

        if (isset($desa)) {Tracer::where('tracer_id', $id)->
            update(['desa_perusahaan' => $desa->nama_wilayah,
            'id_wilayah_perusahaan' => $request->desa]);
        }

        return redirect()->route('alumni.tracer.index')->with('success', 'Data berhasil ditambahkan');
        // return redirect()->back();
    }

    public function destroy($id)
    {
        Tracer::where('tracer_id', $id)->delete();

        return redirect()->back();

        // return redirect()->route('alumni.tracer.index')->with('success', 'Data berhasil dihapus');
    }
}
