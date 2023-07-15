<?php

use App\Http\Controllers\Kelola\DashboardController;
use App\Http\Controllers\Kelola\KendaraanController;
use App\Http\Controllers\Kelola\LayananController;
use App\Http\Controllers\Kelola\PelangganController;
use App\Http\Controllers\Kelola\PenggunaController;
use App\Http\Controllers\Kelola\PerusahaanController;
use App\Http\Controllers\Kelola\SupirController;
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
    return redirect(route('kelola.dashboard.index'));
});


Route::get('/kelola/dashboard', DashboardController::class)->name('kelola.dashboard.index');
Route::resource('/kelola/tentangkami', PerusahaanController::class);
Route::resource('/kelola/layanan', LayananController::class);
Route::resource('/kelola/supir', SupirController::class);
Route::resource('/kelola/pelanggan', PelangganController::class);
Route::resource('/kelola/kendaraan', KendaraanController::class);
Route::resource('/kelola/pengguna', PenggunaController::class);
