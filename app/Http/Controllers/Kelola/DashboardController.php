<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Pengiriman;
use App\Models\Supir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function __invoke() {
      if (Auth::user()->role != 'supir') {
        $pengiriman = Pengiriman::count();
      } else {
        $pengiriman = Pengiriman::whereIn('kendaraan_id', Auth::user()->supir->kendaraan->pluck('id'))->count();
      }
      return view('pages.kelola.dashboard.index',[
        'cPelanggan' => Pelanggan::count(),
        'cSupir' => Supir::count(),
        'cKendaraan' => Kendaraan::count(),
        'cPengguna' => User::count(),
        'cPengiriman' => $pengiriman,
        'cLayanan' => Layanan::count(),
      ]);
    }
}
