<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\KendaraanRequest;
use App\Models\Kendaraan;
use App\Models\Supir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->role === 'supir') {
        abort('403');
      }
      $kendaraan = Kendaraan::get();
      return view('pages.kelola.kendaraan.index', compact('kendaraan'));
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
      return view('pages.kelola.kendaraan.create', [
        'supirs' => Supir::get(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KendaraanRequest $request)
    {
      Kendaraan::create($request->all());
      return redirect(route('kendaraan.index'))->withInfo('Data Kendaraan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
      if (Auth::user()->role === 'supir') {
        abort('403');
      }
      $supirs = Supir::get();
      return view('pages.kelola.kendaraan.edit', compact('kendaraan', 'supirs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KendaraanRequest $request, Kendaraan $kendaraan)
    {
      $kendaraan->update($request->all());
      return redirect(route('kendaraan.index'))->withInfo('Data Kendaraan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
      $kendaraan->delete();
      return redirect(route('kendaraan.index'))->withInfo('Data Kendaraan berhasil dihapus!');
    }
}
