<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\LayananRequest;
use App\Http\Requests\PelangganRequest;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
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
      $pelanggan = Pelanggan::get();
      return view('pages.kelola.pelanggan.index', compact('pelanggan'));
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
      return view('pages.kelola.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelangganRequest $request)
    {
      Pelanggan::create($request->all());
      return redirect(route('pelanggan.index'))->withInfo('Data Pelanggan: <b>' . $request->name . ' </b> berhasil ditambahkan!');
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
    public function edit(Pelanggan $pelanggan)
    {
      if (Auth::user()->role === 'supir') {
        abort('403');
      }
      return view('pages.kelola.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PelangganRequest $request, Pelanggan $pelanggan)
    {
      $pelanggan->update($request->all());
      return redirect(route('pelanggan.index'))->withInfo('Data Pelanggan: <b>' . $pelanggan->name . ' </b>berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
      $pelanggan->delete();
      return redirect(route('pelanggan.index'))->withInfo('Data Pelanggan: <b>' . $pelanggan->name . ' </b>berhasil dihapus!');
    }
}
