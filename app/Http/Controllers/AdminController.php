<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'role' => 'admin',
        ]);

        if ($user) {
            Admin::create([
                'user_id' => $user->id,
                'nip_npak' => $request->nip_npak,
                'jabatan' => $request->jabatan,
        ]);
        }

    return redirect()->route('data-admin.index');
    }

    public function show($id)
    {
        $u = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->where('role', 'admin')
        ->where('users.id', $id)
        ->first();

        return view('_admin.admin', compact('u'));
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
            'password' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        User::where('id', $u->user_id)->update([
            'password' => bcrypt($request->password),
        ]);

        Admin::where('user_id', $u->user_id)->update([
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('data-admin.index');
    }

    public function destroy($id)
    {
        $u = DB::table('admins')
        ->join('users', 'admins.user_id', '=', 'users.id')
        ->where('role', 'admin')
        ->where('admins.user_id', $id)
        ->first();

        Admin::destroy($u->id);
        User::destroy($u->user_id);

        return redirect()->back();
    }
}
    