<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function index()
    {
        // dd('AdminController@index');
        
        $u = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('role', 'admin')->get();

        return view('_admin.admin', compact('u'));
    }

    public function create()
    {
        return view('_admin.admin_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip_npak' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'no_hp' => 'required|string|max:255|unique:users',
        ]);

        $id = Str::uuid()->toString();
        $user = User::create([
            'id'=> $id,
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'role' => 'admin',
        ]);
        // dd($user);
        
        if ($user) {
            Admin::create([
                'user_id' => $id,
                'nip_npak' => $request->nip_npak,
                'jabatan' => $request->jabatan,
        ]);
        }
// dd($user);
        Alert::success('Berhasil', 'Data Admin Berhasil Ditambahkan');
    return redirect()->route('admin.data-admin.index');
    }

    public function show($id)
    {
        $all = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('role', 'admin')
        ->where('users.id', $id)
        ->first();

        // dd($u);

        return view('_admin.admin_detail', compact('all'));
    }

    public function edit($id)
    {
        $u = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('role', 'admin')
        ->where('users.id', $id)
        ->first();

        return view('_admin.admin_edit', compact('u'));
    }

    public function update(Request $request, $id)
    {
        $u = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('role', 'admin')
        ->where('users.id', $id)
        ->first();

        $request->validate([
            'password' => 'nullable|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        User::where('id', $u->user_id)->update([
            'password' => bcrypt($request->password),
        ]);

        Admin::where('user_id', $u->user_id)->update([
            'jabatan' => $request->jabatan,
        ]);
        Alert::success('Berhasil','Data berhasil diubah');
        return redirect()->route('admin.data-admin.index');
    }

    public function destroy($id)
    {
        $u = DB::table('users')
        // ->join('users', 'admins.user_id', '=', 'users.id')
        ->where('role', 'admin')
        ->where('id', $id)
        ->first();

        // dd($u);

        Admin::where('user_id', $u->id)->delete();
        // destroy($u->admin_id);
        User::where('id', $u->id)->delete();

        Alert::success('Berhasil', 'Data Admin Berhasil Dihapus');
        return redirect()->back();
    }
}
    