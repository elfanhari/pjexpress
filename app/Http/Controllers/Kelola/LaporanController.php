<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use App\Models\Perusahaan;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
  public function index(Request $request){
    if (Auth::user()->role === 'supir' || Auth::user()->role === 'admin') {
      abort('403');
    }
    $pengiriman = Pengiriman::latest();

    if (request()) {
      if ($request->status == 'Semua Status Pengiriman') {
        $pengiriman = Pengiriman::whereBetween('tgl_pengiriman', [$request->dari_tanggal, $request->sampai_tanggal ])->get();
      } else {
        $pengiriman = Pengiriman::where('status', $request->status)->whereBetween('tgl_pengiriman', [$request->dari_tanggal, $request->sampai_tanggal ])->get();
      }
    }

    return view('pages.kelola.laporan.index', [
      'pengiriman' => $pengiriman
    ]);
  }

  public function print(Request $request){
    if ($request->status == 'Semua Status Pengiriman') {
      $pengiriman = Pengiriman::whereBetween('tgl_pengiriman', [$request->dari_tanggal, $request->sampai_tanggal ])->orderBy('tgl_pengiriman', 'ASC')->get();
    } else {
      $pengiriman = Pengiriman::where('status', $request->status)->whereBetween('tgl_pengiriman', [$request->dari_tanggal, $request->sampai_tanggal ])->orderBy('tgl_pengiriman', 'ASC')->get();
    }

    $pdf = PDF::loadview('pages.kelola.laporan.print', [
      'pengiriman' => $pengiriman,
      'perusahaan' => Perusahaan::get(),

      'status' => $request->status,
      'dari_tanggal' => $request->dari_tanggal,
      'sampai_tanggal' => $request->sampai_tanggal,

    ])->setPaper('A4', 'Landscape');
    return $pdf->stream('LAPORAN PENGIRIMAN');
  }
}
