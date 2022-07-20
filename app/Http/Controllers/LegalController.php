<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LegalController extends Controller
{
    public function index()
    {
        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->select('legals.*', 'alumnis.*', 'users.*', 'legals.created_at')
        ->where('users.id', Auth::user()->id)
        ->get();

        // dd($legal);

        return view('_alumni.alumni_legal', compact('legal'));
    }

    public function create()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_alumni.alumni_legal_tambah', compact('all'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'berkas' => 'required | image | mimes:jpeg,png,jpg | max:2048',
            'keterangan' => 'required',
        ]);

        $alumni = DB::table('alumnis')
        ->where('nim', $request->nim)
        ->first();

        if ($request->file('berkas')) {
            $berkas = $validated['berkas'] = $request->file('berkas');
                        
            if ($request->jenis == 'legalisir Ijazah') {
            
                // isi dengan nama berkas
                $nama_berkas = "Ijazah_". Auth::user()->name . "_" .$request->nim. "_" . uniqid() . ".jpg";
                // isi dengan nama folder tempat kemana file diupload
                $tempat ="assets/berkas/";
                $berkas->move($tempat,$nama_berkas);

            }elseif ($request->jenis == 'legalisir Transkrip Nilai') {

                // isi dengan nama berkas
                $nama_berkas = "Transkrip_". Auth::user()->name . "_" .$request->nim. "_" . uniqid() . ".jpg";
                // isi dengan nama folder tempat kemana file diupload
                $tempat ="assets/berkas/";
                $berkas->move($tempat,$nama_berkas);

            }else {
                return redirect()->back()->with('error', 'Jenis legalisir tidak ditemukan');
            }

            $id = uniqid();

            Legal::create([
                'legal_id' => $id,
                'jenis_berkas' => $request->jenis,
                'alumni_id' => $alumni->alumni_id,
                'upload_berkas' => $nama_berkas,
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect()->route('alumni.legalisirs.index');
    }

    public function show($id)
    {
        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('legal_id', $id)
        ->first();

        return view('_alumni.alumni_legal_detail', compact('legal'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        // dd($id);
        // Legal::where('legal_id', $id)->destroy();
        Legal::where('legal_id', $id)->delete();

        // dd('Data legalisir berhasil dihapus');
        return redirect()->back();
    }
}