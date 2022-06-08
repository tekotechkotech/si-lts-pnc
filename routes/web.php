<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniUserController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\ProsesLegalController;
use App\Http\Controllers\TracerController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/alumni', function () {
    return view('alumni');
});
//PROFIL
Route::get('/alumni-profil', function () {
    return view('alumni_profil');
});

Route::get('/alumni-profil-datadiri', function () {
    return view('alumni_profil_datadiri');
});

Route::get('/alumni-profil-alamat', function () {
    return view('alumni_profil_alamat');
});

Route::get('/alumni-profil-password', function () {
    return view('alumni_profil_password');
});

//TRACER
Route::get('/alumni-tracer', function () {
    return view('alumni_tracer');
});

Route::get('/alumni-tracer-tambah', function () {
    return view('alumni_tracer');
});

Route::get('/alumni-tracer-edit', function () {
    return view('alumni_tracer');
});

//LEGALISASI
Route::get('/alumni-legalisasi', function () {
    return view('alumni_legal');
});

Route::get('/alumni-legal-tambah', function () {
    return view('alumni_legal_tambah');
});

// MIDDLEWARE LOGIN
Route::middleware(['auth'])->group(function () {
    
    // MIDDLEWARE ADMIN
    Route::prefix('admin')->middleware(['Admin'])->group(function () {

        Route::get('dashboard',[AdminUserController::class, 'index'])->name('dashboard');
        
        Route::get('tracer-study', [AdminUserController::class, 'tracer'])->name('data-tracer');
        
        Route::get('pengaturan', [AdminUserController::class, 'pengaturan'])->name('pengaturan');

        Route::get('data-admin', [AdminController::class, 'index'])->name('data-admin.index');
        Route::get('data-alumni', [AlumniController::class, 'index'])->name('data-alumni.index');
        
        Route::middleware(['SuperAdmin'])->group(function () {
            // Route::resource('data-admin', AdminController::class);
            Route::get('data-admin/create', [AdminController::class, 'create'])->name('data-admin.create');
            Route::post('data-admin', [AdminController::class, 'store'])->name('data-admin.store');
            Route::get('data-admin/{data_admin}/edit', [AdminController::class, 'edit'])->name('data-admin.edit');
            Route::put('data-admin/{data_admin}', [AdminController::class, 'update'])->name('data-admin.update');
            Route::delete('data-admin/{data_admin}', [AdminController::class, 'destroy'])->name('data-admin.destroy');
            
            // Route::resource('data-alumni', AlumniController::class);
            Route::get('data-alumni/create', [AlumniController::class, 'create'])->name('data-alumni.create');
            Route::post('data-alumni', [AlumniController::class, 'store'])->name('data-alumni.store');
            Route::get('data-alumni/{data_alumni}/edit', [AlumniController::class, 'edit'])->name('data-alumni.edit');
            Route::put('data-alumni/{data_alumni}', [AlumniController::class, 'update'])->name('data-alumni.update');
            Route::delete('data-alumni/{data_alumni}', [AlumniController::class, 'destroy'])->name('data-alumni.destroy');
        });



        // lihat pengajuan legalisir
        Route::get('legalisasi',[ProsesLegalController::class, 'index'])->name('data-legal');
        // level acc 1
        Route::put('verifikasi',[ProsesLegalController::class, 'verifikasi'])->name('verifikasi');
        // level acc 2
        Route::put('legalisasi',[ProsesLegalController::class, 'legalisasi'])->name('legalisasi');
        // level acc 3
        Route::put('print',[ProsesLegalController::class, 'print'])->name('print');
        // level acc 4
        Route::put('ambil',[ProsesLegalController::class, 'ambil'])->name('ambil');
        // level acc 5
        Route::put('tolak',[ProsesLegalController::class, 'tolak'])->name('tolak');


        
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

        //route data tracer study resource(index, create, store, edit, update, destroy)
        Route::resource('tracer', TracerController::class);

        //route data legalisir resource(index, create, store, edit, update, destroy)
        Route::resource('legalisir', LegalController::class);

        // Route::get('/wkw', function () {
        //     return view('_alumni.dashboard');
        // });

    });
});

require __DIR__.'/auth.php';
