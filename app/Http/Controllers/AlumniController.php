<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('AlumniController@index');
        
        $u = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('role', 'alumni')->get();

        return view('_admin.alumni', compact('u'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.alumni_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:255| unique:alumnis',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:255',
            // 'jenis_kelamin' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'no_hp' => 'required|string|max:255|unique:users',
        ]);
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'role' => 'alumni',
        ]);
        
        if ($user) {
            Alumni::create([
                'user_id' => $user->id,
                'prodi' => $request->prodi,
                'nim' => $request->nim,
        ]);
        }

        return redirect()->route('admin.data-alumni.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('role', 'alumni')
        ->where('users.id', $id)
        ->first();

        return view('_admin.alumni', compact('u'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);

        $u = DB::table('users')
        ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
        ->where('role', 'alumni')
        ->where('alumnis.user_id', $id)
        ->first();
        // dd($u);

        return view('_admin.alumni_edit', compact('u'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|max:255',
        ]);
// dd($request);

        User::where('id', $id)->update([
            'password' => bcrypt($request->password),
        ]);

        Alumni::where('user_id', $id)->update([
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('data-alumni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $u = DB::table('alumni')
        // ->join('users', 'alumni.user_id', '=', 'users.id')
        // ->where('role', 'admin')
        // ->where('alumni.user_id', $id)
        // ->first();


        // Alumni::destroy($u->id);
        User::destroy($id);

        return redirect()->back();
    }
}
