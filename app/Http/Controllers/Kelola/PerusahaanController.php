<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerusahaanRequest;
use App\Models\Layanan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
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

      $perusahaan = Perusahaan::get();
      return view('pages.kelola.tentangkami.index', compact('perusahaan'));
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

        $perusahaan = Perusahaan::get();
        return ($perusahaan->count() < 1)
               ? view('pages.kelola.tentangkami.create')
               : redirect(route('tentangkami.index'))->withInfo('Data Perusahaan sudah ada!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerusahaanRequest $request)
    {
        Perusahaan::create($request->all());
        return redirect(route('tentangkami.index'))->withInfo('Data Perusahaan berhasil ditambahkan!');
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
    public function edit(Perusahaan $tentangkami)
    {
      if (Auth::user()->role === 'supir') {
        abort('403');
      }
      return view('pages.kelola.tentangkami.edit', compact('tentangkami'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerusahaanRequest $request, Perusahaan $tentangkami)
    {
      $tentangkami->update($request->all());
      return redirect(route('tentangkami.index'))->withInfo('Data Perusahaan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
