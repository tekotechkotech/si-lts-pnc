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
        // dd($request->all());
        $request->validate([
            'jenis' => 'required',
            'berkas' => 'required | file | mimes:pdf',
            'keterangan' => 'required',
        ]);

        // dd($request);

        $alumni = DB::table('alumnis')
        ->where('nim', $request->nim)
        ->first();

        // dd($alumni);

        if ($request->file('berkas')) {
            $berkas = $validated['berkas'] = $request->file('berkas');
            
            
            if ($request->jenis == 'Legalisasi Ijazah') {
            
                // isi dengan nama berkas
                $nama_berkas = "Ijazah_". Auth::user()->name . "_" .$request->nim. "_" . uniqid() . ".pdf";
                // isi dengan nama folder tempat kemana file diupload
                $tempat ="assets/legal/ijazah";
                $berkas->move($tempat,$nama_berkas);

            }elseif ($request->jenis == 'Legalisasi Transkip Nilai') {

                // isi dengan nama berkas
                $nama_berkas = "Transkip_". Auth::user()->name . "_" .$request->nim. "_" . uniqid() . ".pdf";
                // isi dengan nama folder tempat kemana file diupload
                $tempat ="assets/legal/transkip";
                $berkas->move($tempat,$nama_berkas);

            }else {
                return redirect()->back()->with('error', 'Jenis Legalisasi tidak ditemukan');
            }

            Legal::create([
                'jenis_berkas' => $request->jenis,
                'alumni_id' => $alumni->alumni_id,
                'upload_berkas' => $nama_berkas,
                'keterangan' => $request->keterangan,
            ]);


            // Legal::where('legal_id', $legal->legal_id)->update([
            //     'upload_berkas' => $nama_berkas,
            // ]);

        }



        return redirect()->route('alumni.legalisir.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $legal = DB::table('legals')
        ->where('legal_id', $id)
        ->first();

        return view('_alumni.alumni_legal_edit', compact('legal'));
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

        // dd('Data Legalisasi berhasil dihapus');
        return redirect()->back();
    }
}
