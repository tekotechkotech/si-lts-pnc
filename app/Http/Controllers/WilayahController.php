<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function getkabupaten(request $request)
    {
        $id_prov = $request->id_prov;

        $kab = DB::table('wilayah')
        ->whereRaw('LENGTH(id_wilayah) > 2')->whereRaw('LENGTH(id_wilayah) < 6')
        ->where('id_wilayah','LIKE', $id_prov.'%')
        ->get();

        $kabu = old('rt', Auth::user()->kabupaten);

        $id_kabu = DB::table('wilayah')
        ->where('nama_wilayah', $kabu)
        ->first();

        if ( empty(Auth::User()->provinsi)) {
            echo "<option>Pilih Kabupaten/Kota</option>";
        }else {
            echo "<option value='$id_kabu->id_wilayah'>$kabu</option>";
        }

            
        foreach ($kab as $kab ) {
            echo "<option value='$kab->id_wilayah'>$kab->nama_wilayah</option>";
        }
    }

    public function getkecamatan(request $request)
    {
        $id_kab = $request->id_kab;

        $kec = DB::table('wilayah')
        ->whereRaw('LENGTH(id_wilayah) > 6')->whereRaw('LENGTH(id_wilayah) < 9')
        ->where('id_wilayah','LIKE', $id_kab.'%')
        ->get();

        $keca = old('rt', Auth::user()->kecamatan);

        $id_keca = DB::table('wilayah')
        ->where('nama_wilayah', $keca)
        ->first();

        if ( Auth::User()->provinsi==null) {
            echo "<option>Pilih Kecamatan</option>";
        }else {
            echo "<option value='$id_keca->id_wilayah'>$keca</option>";
        }

        foreach ($kec as $kec ) {
            echo "<option value='$kec->id_wilayah'>$kec->nama_wilayah</option>";
        }
    }

    public function getdesa(request $request)
    {
        $id_kec = $request->id_kec;

        $desa = DB::table('wilayah')
        ->whereRaw('LENGTH(id_wilayah) > 9')->whereRaw('LENGTH(id_wilayah) < 15')
        ->where('id_wilayah','LIKE', $id_kec.'%')
        ->get();

        $desaa = old('rt', Auth::user()->desa);

        $id_desa = DB::table('wilayah')
        ->where('nama_wilayah', $desaa)
        ->first();
        echo (Auth::User()->provinsi);

        if ( empty(Auth::User()->provinsi)) {
            echo "<option>Pilih Kelurahan/Desa</option>";
        }else {
            echo "<option value='$id_desa->id_wilayah'>$desaa</option>";
        }

        foreach ($desa as $desa ) {
            echo "<option value='$desa->id_wilayah'>$desa->nama_wilayah</option>";
        }
    }
}
