<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengirimanRequest;
use App\Http\Requests\UpPengirimanRequest;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Pengiriman;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use PDF;


class PengirimanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (Auth::user()->role == 'supir') {
      $pengiriman = Pengiriman::whereIn('kendaraan_id', Auth::user()->supir->kendaraan->pluck('id'))->get();
    } else {
      $pengiriman = Pengiriman::get();
    }
    return view('pages.kelola.pengiriman.index', compact('pengiriman'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if (Auth::user()->role === 'supir') {
      abort('403');
    }
    return view('pages.kelola.pengiriman.create', [
      'pengirims' => Pelanggan::get(),
      'kendaraans' => Kendaraan::get(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PengirimanRequest $request)
  {
    Pengiriman::create($request->all());
    return redirect(route('pengiriman.index'))->withInfo('Data Pengiriman berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Pengiriman $pengiriman)
  {
      if (Auth::user()->role === 'supir') {
        if ($pengiriman->kendaraan->supir_id != Auth::user()->supir->id) {
          abort('403');
        }
      }
      return view('pages.kelola.pengiriman.show', compact('pengiriman'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Pengiriman $pengiriman)
  {
    if (Auth::user()->role === 'supir') {
      if ($pengiriman->kendaraan->supir_id != Auth::user()->supir->id) {
        abort('403');
      }
    }

    return view('pages.kelola.pengiriman.edit', [
      'pengirims' => Pelanggan::get(),
      'kendaraans' => Kendaraan::get(),
      'pengiriman' => $pengiriman
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpPengirimanRequest $request, Pengiriman $pengiriman)
  {
    if (filled($request->foto)) {

      $request->validate([
        'foto' => ['image'],
      ]);

      $files = $request->file('foto');
      if ($request->hasFile('foto')) {
        $filenameWithExtension      = $request->file('foto')->getClientOriginalExtension();
        $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension                  = $files->getClientOriginalExtension();
        $filenamesimpan             = 'fotopengiriman' . time() . Str::random(10) . '.' . $extension;

        $editData = [
          'pelanggan_id' => $request->pelanggan_id,
          'kendaraan_id' => $request->kendaraan_id,
          'no_pengiriman' => $request->no_pengiriman,
          'tgl_pengiriman' => $request->tgl_pengiriman,
          'nama_penerima' => $request->nama_penerima,
          'alamat_penerima' => $request->alamat_penerima,
          'nama_barang' => $request->nama_barang,
          'jumlah_barang' => $request->jumlah_barang,
          'biaya_kirim' => $request->biaya_kirim,
          'status' => $request->status,
          'foto' => $filenamesimpan
        ];

        if (isset($request->old_foto)) {
          File::delete(public_path('/fotopengiriman/' . $request->old_foto));
        }

        $pengiriman->update($editData);
        $files->move('fotopengiriman', $filenamesimpan);
      }

    } else {
      $pengiriman->update($request->all());
    }

    return redirect(route('pengiriman.index'))->withInfo('Data Pengiriman berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pengiriman $pengiriman)
  {
    if ($pengiriman->foto) {
      File::delete(public_path('/fotopengiriman/' . $pengiriman->foto));
    }
    $pengiriman->delete();
    return redirect(route('pengiriman.index'))->withInfo('Data Pengiriman berhasil dihapus!');
  }

  public function printResi(Pengiriman $pengiriman){

    $pdf = PDF::loadview('pages.kelola.pengiriman.print', [
      'pengiriman' => $pengiriman,
      'perusahaan' => Perusahaan::get(),
    ])->setPaper('A4', 'Potrait');
    return $pdf->stream('CETAK RESI');
  }
}
