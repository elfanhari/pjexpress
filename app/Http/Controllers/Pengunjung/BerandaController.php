<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Pengiriman;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    function __invoke(Request $request)
    {
      if (request('track')) {
        $pengiriman = Pengiriman::where('no_pengiriman', $request->track)->get();
        return view('pages.pengunjung.beranda.index', [
          'perusahaan' => Perusahaan::get(),
          'layanan' => Layanan::get(),
          'pengiriman' => $pengiriman
        ]);
      } else{
        return view('pages.pengunjung.beranda.index', [
          'perusahaan' => Perusahaan::get(),
          'layanan' => Layanan::get(),
        ]);
      }

    }
}
