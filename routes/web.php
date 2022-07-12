<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniUserController;
use App\Http\Controllers\CekQRController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProsesLegalController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// wilayah
Route::controller(WilayahController::class)->group(function () {
    Route::post('/getkabupaten',  'getkabupaten')->name('getkabupaten');
    Route::post('/getkecamatan',  'getkecamatan')->name('getkecamatan');
    Route::post('/getdesa',  'getdesa')->name('getdesa');
});

// LOGIN
Route::get('/',[LoginController::class, 'cek'])->name('cek');
Route::get('login',[LoginController::class, 'index'])->name('login');
Route::post('login',[LoginController::class, 'login_action'])->name('login.action');
Route::get('logout',[LoginController::class, 'logout'])->middleware('auth')->name('logout');

// CEK QR CODE
Route::get('/legalisir//{id}',[CekQRController::class, 'cek'])->name('cek_qrcode');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ALUMNI
    // Route::get('/alumni', function () {
    //     return view('alumni');
    // });

    // //PROFIL
    // Route::get('/alumni-profil', function () {
    //     return view('alumni_profil');
    // });

    // Route::get('/alumni-profil-datadiri', function () {
    //     return view('alumni_profil_datadiri');
    // });

    // Route::get('/alumni-profil-alamat', function () {
    //     return view('alumni_profil_alamat');
    // });

    // Route::get('/alumni-profil-password', function () {
    //     return view('alumni_profil_password');
    // });

    // //TRACER
    // Route::get('/alumni-tracer', function () {
    //     return view('alumni_tracer');
    // });

    // Route::get('/alumni-tracer-tambah', function () {
    //     return view('alumni_tracer_tambah');
    // });

    // Route::get('/alumni-tracer-edit', function () {
    //     return view('alumni_tracer_edit');
    // });

    // //legalisir
    // Route::get('/alumni-legalisir', function () {
    //     return view('alumni_legal');
    // });

    // Route::get('/alumni-legal-tambah', function () {
    //     return view('alumni_legal_tambah');
    // });

    // Route::get('/alumni-legal-edit', function () {
    //     return view('alumni_legal_edit');
    // });
// alumni

// MIDDLEWARE LOGIN
Route::middleware(['auth'])->group(function () {
    
    // MIDDLEWARE ADMIN
    Route::prefix('admin')->name('admin.')->middleware(['Admin'])->group(function () {

        Route::get('dashboard', [AdminUserController::class, 'index'])->name('dashboard');
        
        Route::get('tracer-study', [AdminUserController::class, 'tracer'])->name('data-tracer');
        
        // PROFIL
        Route::get('profil', [AdminUserController::class, 'profil'])->name('profil');
        Route::get('profil_alamat', [AdminUserController::class, 'profil_alamat'])->name('alamats');
        Route::put('data-diri', [AdminUserController::class, 'proses_profil_datadiri'])->name('data-diri');
        Route::put('alamat', [AdminUserController::class, 'proses_profil_alamat'])->name('alamat');
        Route::put('password', [AdminUserController::class, 'proses_profil_password'])->name('password');
        Route::put('foto', [AdminUserController::class, 'proses_profil_foto'])->name('foto');

        // Route::resource('data-admin', AdminController::class);
        Route::get('data-admin', [AdminController::class, 'index'])->name('data-admin.index');
        Route::get('data-admin/{data_admin}/detail', [AdminController::class, 'show'])->name('data-admin.show');
        Route::get('data-admin/create', [AdminController::class, 'create'])->name('data-admin.create');
        Route::post('data-admin', [AdminController::class, 'store'])->name('data-admin.store');
        Route::get('data-admin/{data_admin}/edit', [AdminController::class, 'edit'])->name('data-admin.edit');
        Route::put('data-admin/{data_admin}', [AdminController::class, 'update'])->name('data-admin.update');
        Route::delete('data-admin/{data_admin}', [AdminController::class, 'destroy'])->name('data-admin.destroy');
        
        // Route::resource('data-alumni', AlumniController::class);
        Route::get('data-alumni', [AlumniController::class, 'index'])->name('data-alumni.index');
        Route::get('data-alumni/create', [AlumniController::class, 'create'])->name('data-alumni.create');
        Route::post('data-alumni', [AlumniController::class, 'store'])->name('data-alumni.store');
        Route::get('data-alumni/{data_alumni}/edit', [AlumniController::class, 'edit'])->name('data-alumni.edit');
        Route::put('data-alumni/{data_alumni}', [AlumniController::class, 'update'])->name('data-alumni.update');
        Route::delete('data-alumni/{data_alumni}', [AlumniController::class, 'destroy'])->name('data-alumni.destroy');
        
        // lihat pengajuan legalisirs
        Route::get('legalisir/{apa}',[ProsesLegalController::class, 'index'])->name('data-legal');
        
        Route::get('legalisir/{id}/{apa}/detail',[ProsesLegalController::class, 'detail'])->name('data-legal-detail');
        
        // level acc 1
        Route::get('legalisir/{id}/verifikasi',[ProsesLegalController::class, 'verifikasi'])->name('verifikasi');
        // level acc 2
        Route::get('legalisir/{id}/legalisirs',[ProsesLegalController::class, 'legalisir'])->name('legalisir');

            // level acc 3
            // Route::get('legalisir/{id}/print',[ProsesLegalController::class, 'cetak'])->name('cetak');
            // level acc 4
            // Route::get('legalisir/{id}/ambil',[ProsesLegalController::class, 'ambil'])->name('ambil');
        
        // level acc 3
        Route::get('legalisir/{id}/tolak',[ProsesLegalController::class, 'tolak'])->name('tolak');


        
        // Route::get('/wkw', function () {
        //     return view('_admin.dashboard');
        // });

    });
    
// ATAS ADMIN
// BATAS
// BAWAH ALUMNI

    // MIDDLEWARE ALUMNI
    Route::prefix('alumni')->name('alumni.')->group(function () {
        
        Route::get('dashboard',[AlumniUserController::class, 'index'])->name('dashboard');

        Route::get('profil',[AlumniUserController::class, 'profil'])->name('profil');

    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('data-diri',[AlumniUserController::class, 'profil_datadiri'])->name('data-diri');
        Route::get('alamat',[AlumniUserController::class, 'profil_alamat'])->name('alamat');
        Route::get('password',[AlumniUserController::class, 'profil_password'])->name('password');
        
        Route::put('data-diri',[AlumniUserController::class, 'proses_profil_datadiri'])->name('data-diri.proses');
        Route::put('alamat',[AlumniUserController::class, 'proses_profil_alamat'])->name('alamat.proses');
        Route::put('password',[AlumniUserController::class, 'proses_profil_password'])->name('password.proses');
        
        Route::put('foto',[AlumniUserController::class, 'proses_profil_foto'])->name('foto.proses');
    });
        
        //route data tracer study resource(index, create, store, edit, update, destroy)
        Route::resource('tracer', TracerController::class);

        //route data legalisirs resource(index, create, store, edit, update, destroy)
        Route::resource('legalisirs', LegalController::class);

        // Route::get('/wkw', function () {
        //     return view('_alumni.dashboard');
        // });

    });
});
