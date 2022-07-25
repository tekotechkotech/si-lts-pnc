<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use App\Models\Tracer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    function index(){
        $users = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('users.id', Auth::user()->id)
        ->get();

        $alumni = DB::table('alumnis')->count();
        $tracer = DB::table('tracers')->count();
        $legal = DB::table('legals')->count();
        
        if ($legal == null) {
            $prolegal = 0;
            $acclegal = 0;
        }else{
            $prolegal = Legal::
            where('level_acc','<',2)
            ->count();
            $acclegal = DB::table('legals')
            ->where('level_acc',2)
            ->count();
        }

        $tahun = DB::table('tracers')->select(DB::raw('tahun_masuk as tahun'))
        ->groupby('tahun_masuk')
        ->get();
        
        // CHART TRACER BUKA
        $cowo = DB::table('tracers')
        ->select(DB::raw('count(id) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('jenis_kelamin','Laki-Laki')
        ->groupby('tracers.created_at')
        ->get();

        $cewe = DB::table('tracers')
        ->select(DB::raw('count(id) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('jenis_kelamin','Perempuan')
        ->groupby('tracers.created_at')
        ->get();
        // CHART TRACER TUTUP

        // CHART RELEVANSI BUKA
        $relevancowo = DB::table('tracers')
        ->select(DB::raw('count(relevansi_kuliah) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('jenis_kelamin','Laki-Laki')
        ->where('relevansi_kuliah','Relevan')
        ->groupby('tracers.created_at')
        ->get();

        $relevancewe = DB::table('tracers')
        ->select(DB::raw('count(relevansi_kuliah) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('jenis_kelamin','Perempuan')
        ->where('relevansi_kuliah','Relevan')
        ->groupby('tracers.created_at')
        ->get();
        // CHART RELEVANSI TUTUP

        // CHART GAJI BUKA
        $gaji3 = DB::table('tracers')
        ->select(DB::raw('count(gaji_sekarang) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('gaji_sekarang','Dibawah 3.000.000')
        ->groupby('tracers.created_at')
        ->get();

        $gaji35 = DB::table('tracers')
        ->select(DB::raw('count(gaji_sekarang) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('gaji_sekarang','3.000.000 - 5.000.000')
        ->groupby('tracers.created_at')
        ->get();

        $gaji57 = DB::table('tracers')
        ->select(DB::raw('count(gaji_sekarang) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('gaji_sekarang','5.000.000 - 7.000.000')
        ->groupby('tracers.created_at')
        ->get();

        $gaji7 = DB::table('tracers')
        ->select(DB::raw('count(gaji_sekarang) as hitung'))
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('gaji_sekarang','Diatas 7.000.000')
        ->groupby('tracers.created_at')
        ->get();

        // CHART GAJI TUTUP


        return view('_admin.dashboard', compact('users', 'alumni', 'tracer', 'legal', 'prolegal', 'acclegal', 'tahun', 'cowo', 'cewe', 'relevancowo', 'relevancewe', 'gaji3', 'gaji35', 'gaji57', 'gaji7'));
    }


    public function tracer()
    {
        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        // ->where('tracers.user_id', Auth::user()->id)
        ->get();

        // dd($tracer);
        // dd($users);
        return view('_admin.tracer', compact('tracer'));
    }
    
    public function detail_tracer($id)
    {
        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        ->where('tracers.tracer_id', $id)
        ->first();

        // dd($tracer);

        return view('_admin.tracer_detail', compact('tracer'));
    }

    public function profil()
    {
        $all = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        
        $provi= DB::table('wilayah')
            ->whereRaw('LENGTH(id_wilayah) < 3')
            ->get();

        // dd($all);

        return view('_admin.profil', compact('all', 'provi'));
    }

    
    public function profil_datadiri()
    {
        $all = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_admin.admin_profil_datadiri', compact('all'));
    }

    public function proses_profil_datadiri(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required | unique:users,username,'.Auth::user()->id,
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required | email | unique:users,email,'.Auth::user()->id,
            'no_hp' => 'required',
        ]);
        
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);
        
        Alert::success('Berhasil', 'Data Diri Berhasil Diubah');
        return redirect()->route('admin.profil');
    }

    public function proses_profil_alamat(Request $request)
    {       
        // dd($request->all());
        $request->validate([
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'Jalan' => 'required',
        ]);

        $id = Auth::user()->id;
        $prov = DB::table('wilayah')
        ->where('id_wilayah',$request->provinsi)
        ->first();
        
        // dd($prov->nama_wilayah);

        if (isset($prov)) {
            User::where('id', $id)->
            update(['provinsi' => $prov->nama_wilayah]);
        }

        $kab = DB::table('wilayah')
        ->where('id_wilayah',$request->kabupaten)
        ->first();

        if (isset($kab)) {User::where('id', $id)->
            update(['kabupaten' => $kab->nama_wilayah]);
        }

        $kec = DB::table('wilayah')
        ->where('id_wilayah',$request->kecamatan)
        ->first();

        if (isset($kec)) {User::where('id', $id)->
            update(['kecamatan' => $kec->nama_wilayah]);
        }

        $desa = DB::table('wilayah')
        ->where('id_wilayah',$request->desa)
        ->first();

        if (isset($desa)) {User::where('id', $id)->
            update(['desa' => $desa->nama_wilayah,
            'id_wilayah' => $request->desa]);
        }

        User::where('id', Auth::user()->id)->update([
            'rt' => $request->rt,
            'rw' => $request->rw,
            'jalan' => $request->Jalan,
        ]);
            
        Alert::success('Berhasil', 'Data Alamat Berhasil Diubah');
        return redirect()->route('admin.profil');
    }

    public function proses_profil_password(Request $request)
    {
// dd($request->all());
        $request->validate([
            'password' => 'required | confirmed',
            'password_confirmation' => 'required | same:password',
        ]);
        
        User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Berhasil', 'Data Password Berhasil Diubah');
        return redirect()->route('admin.profil');
    }

    public function proses_profil_foto(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'foto' => 'nullable | image | mimes:jpeg,png,jpg | max:2048',
        ]);

        if ($request->file('foto')) {
            $foto = $validated['foto'] = $request->file('foto');
		    $nama_foto = "Profil_". Auth::user()->name . "_" . ".jpg";
            // isi dengan nama folder tempat kemana file diupload
            $tempat ="assets/profile";
            $foto->move($tempat,$nama_foto);

		User::where('id', Auth::user()->id)->
        update([
			'foto' => $nama_foto,
		]);
        }

        Alert::success('Berhasil', 'Foto Berhasil Diubah');
        return redirect()->route('admin.profil');
    }


    
    public function profil_alamat()
    {

        $all = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $provi= DB::table('wilayah')
            ->whereRaw('LENGTH(id_wilayah) < 3')
            ->get();

        return view('_admin.profil_alamat', compact('all', 'provi'));
    }

    public function tracer_export()
    {
        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->join('users', 'alumnis.user_id', '=', 'users.id')
        // ->where('tracers.user_id', Auth::user()->id)
        ->get();
// dd($tracer);
        return view('_admin.tracer_export', compact('tracer'));
    }

}