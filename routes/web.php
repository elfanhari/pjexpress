<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Kelola\ProfilController;
use App\Http\Controllers\Kelola\DashboardController;
use App\Http\Controllers\Kelola\KendaraanController;
use App\Http\Controllers\Kelola\LaporanController;
use App\Http\Controllers\Kelola\LayananController;
use App\Http\Controllers\Kelola\PelangganController;
use App\Http\Controllers\Kelola\PenggunaController;
use App\Http\Controllers\Kelola\PengirimanController;
use App\Http\Controllers\Kelola\PerusahaanController;
use App\Http\Controllers\Kelola\SupirController;
use App\Http\Controllers\Pengunjung\BerandaController;
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
    return redirect(route('home'));
});

Route::get('/home', BerandaController::class)->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'cekLogin'])->name('login.check')->middleware('guest');

Route::group(['middleware' => ['auth']], function(){
  Route::post('/logout', LogoutController::class)->name('logout');

  Route::get('/kelola/dashboard', DashboardController::class)->name('kelola.dashboard.index');
  Route::resource('/kelola/tentangkami', PerusahaanController::class);
  Route::resource('/kelola/layanan', LayananController::class);
  Route::resource('/kelola/supir', SupirController::class);
  Route::resource('/kelola/pelanggan', PelangganController::class);
  Route::resource('/kelola/kendaraan', KendaraanController::class);
  Route::resource('/kelola/pengguna', PenggunaController::class);
  Route::resource('/kelola/pengiriman', PengirimanController::class);
  Route::get('/kelola/pengiriman/{pengiriman}/printresi', [PengirimanController::class, 'printResi'])->name('pengiriman.printresi');
  Route::get('/kelola/laporan', [LaporanController::class, 'index'])->name('laporan.index');
  Route::post('/kelola/laporan/print/', [LaporanController::class, 'print'])->name('laporan.print');
  Route::get('/kelola/profil', [ProfilController::class, 'index'])->name('profil.index');
  Route::put('/kelola/profil/updateuser', [ProfilController::class, 'upProfil'])->name('profil.updateuser');
  Route::put('/kelola/profil/{users:id}/updatefotoprofil', [ProfilController::class, 'upFoto'])->name('profil.updatefoto');
});
