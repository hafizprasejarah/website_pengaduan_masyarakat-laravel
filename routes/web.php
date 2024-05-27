<?php

use App\Http\Controllers\DaftarLaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMasyarakatController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SingleLaporan;
use GuzzleHttp\Middleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'view'])->name('login')->middleware('guest');
Route::post('/', [IndexController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// admin
Route::get('/administrasi/dashboard', [HomeController::class, 'adminhome'])->Middleware('auth', 'role:admin');
Route::get('/administrasi/daftarlaporan', [DaftarLaporanController::class, 'admindaftar'])->Middleware('auth', 'role:admin');
Route::get('/administrasi/daftarlaporan/{lapor:slug}', [SingleLaporan::class, 'single_report'])->Middleware('auth', 'role:admin');
Route::get('/administrasi/data-masyarakat', [DataMasyarakatController::class, 'masyarakatdata'])->Middleware('auth', 'role:admin');
Route::get('/administrasi/data-petugas', [DataMasyarakatController::class, 'petugasdata'])->Middleware('auth', 'role:admin');


//

//post lapor

Route::post('/administrasi/daftarlaporan/delete/{lapor:slug}', [DaftarLaporanController::class, 'destroy'])->middleware('auth', 'role:admin');
Route::get('/administrasi/dashboard/checkSlug', [HomeController::class, 'checkSlug'])->middleware('auth');
Route::get('/administrasi/daftarlaporan/{lapor:slug}/validasi', [SingleLaporan::class, 'validasi'])->middleware('auth', 'role:admin,petugas');
Route::post('/administrasi/daftarlaporan', [DaftarLaporanController::class, 'store_lapor'])->Middleware('auth', 'role:admin');
//post lapor

// komentar
Route::post('/administrasi/daftarlaporan/{lapor:slug}', [SingleLaporan::class, 'komentar'])->Middleware('auth', 'role:admin');
// komentar


//datamasyarakat
Route::get('/administrasi/data-masyarakat/{user:id}/edit', [DataMasyarakatController::class, 'edit'])->Middleware('auth', 'role:admin');
Route::post('/administrasi/data-masyarakat/{user:id}/delete', [DataMasyarakatController::class, 'destroyuser'])->Middleware('auth', 'role:admin');
Route::put('/administrasi/data-masyarakat/{user:id}', [DataMasyarakatController::class, 'update'])->Middleware('auth', 'role:admin');

//datamasyarakat

// admin

// user
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth', 'role:user');
Route::get('/daftarlaporan/single-laporan', [SingleLaporan::class, 'user_single_report'])->Middleware('auth', 'role:user');
Route::get('/daftarlaporan', [DaftarLaporanController::class, 'daftar'])->Middleware('auth', 'role:user');
Route::get('/daftarlaporan/{lapor:slug}', [SingleLaporan::class, 'user_single_report'])->Middleware('auth', 'role:user');


// lapor

Route::post('/daftarlaporan', [DaftarLaporanController::class, 'store_lapor_user'])->Middleware('auth', 'role:user');
Route::get('/dashboard/checkSlug', [HomeController::class, 'checkSlug'])->middleware('auth');
// lapor
// user

// petugas


//komentar
Route::post('/petugas/daftarlaporan/{lapor:slug}', [SingleLaporan::class, 'petugaskomentar'])->Middleware('auth', 'role:petugas');
//komentar

//petugas
Route::post('/petugas/daftarlaporan/delete/{lapor:slug}', [DaftarLaporanController::class, 'destroypetugas'])->middleware('auth', 'role:petugas');

Route::get('/petugas/daftarlaporan/{lapor:slug}/validasi', [SingleLaporan::class, 'petugasvalidasi'])->middleware('auth', 'role:petugas');
Route::get('/petugas/daftarlaporan/single-laporan', [SingleLaporan::class, 'petugas_single_report'])->Middleware('auth', 'role:petugas');
Route::get('/petugas/daftarlaporan', [DaftarLaporanController::class, 'petugasdaftar'])->Middleware('auth', 'role:petugas');
Route::get('/petugas/daftarlaporan/{lapor:slug}', [SingleLaporan::class, 'petugas_single_report'])->Middleware('auth', 'role:petugas');
//petugas
