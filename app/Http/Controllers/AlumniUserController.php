<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumniUserController extends Controller
{
    public function index()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        if ($all->email == "" ||
        $all->tempat_lahir == "" ||
        $all->tanggal_lahir == "" ||
        $all->no_hp == "" || 
            $all->desa == "" || 
            $all->rt == "" ||
            $all->rw == "" ||
            $all->jalan == "") {
            $cek="belum";
        }else {
            $cek="sudah";
        }
        
// dd($cek);
        // dd($all);

        $tracer = DB::table('tracers')
        ->join('alumnis', 'tracers.alumni_id', '=', 'alumnis.alumni_id')
        ->where('alumnis.nim', $all->nim)
        // ->max('id')
        ->first();

        $legal = DB::table('legals')
        ->join('alumnis', 'legals.alumni_id', '=', 'alumnis.alumni_id')
        ->where('alumnis.alumni_id', $all->id)
        ->first();

        return view('_alumni.alumni', compact('all', 'tracer', 'legal', 'cek'));
    }

    public function profil()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_alumni.alumni_profil', compact('all'));
    }

    public function profil_datadiri()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_alumni.alumni_profil_datadiri', compact('all'));
    }

    public function profil_alamat()
    {

        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $provi= DB::table('wilayah')
            ->whereRaw('LENGTH(id_wilayah) < 3')
            ->get();

        return view('_alumni.alumni_profil_alamat', compact('all', 'provi'));
    }

    public function profil_password()
    {
        $all = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        return view('_alumni.alumni_profil_password', compact('all'));
    }

    public function proses_profil_datadiri(Request $request)
    {
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
            
        return redirect()->route('alumni.profil');
    }

    public function proses_profil_alamat(Request $request)
    {       
        // dd($request);
        $request->validate([
            
            'RT' => 'nullable|numeric',
            'RW' => 'nullable|numeric',
            // 'Jalan' => 'required',
        ]);
        $prov = DB::table('wilayah')
        ->where('id_wilayah',$request->provinsi)
        ->first();

        $id = Auth::user()->id;

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
            'rt' => $request->RT,
            'rw' => $request->RW,
            'jalan' => $request->Jalan,
        ]);
            
        return redirect()->route('alumni.profil');
    }

    public function proses_profil_password(Request $request)
    {

        $request->validate([
            'password' => 'required | confirmed',
            'password_confirmation' => 'required | same:password',
        ]);
        
        User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('alumni.profil');
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

        return redirect('/');
        
    }


}
