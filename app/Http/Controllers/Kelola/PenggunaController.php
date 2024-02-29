<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaRequest;
use App\Http\Requests\UpPenggunaRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PenggunaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if(Gate::allows('pimpinan')){
      $pengguna = User::get();
      return view('pages.kelola.pengguna.index', compact('pengguna'));
    } else {
      abort('403');
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if(Gate::allows('pimpinan')){
      return view('pages.kelola.pengguna.create');
    } else {
      abort('403');
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PenggunaRequest $request)
  {
    User::create($request->all());
    return redirect(route('pengguna.index'))->withInfo('Data Pengguna berhasil ditambahkan!');
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
  public function edit(User $pengguna)
  {
    if (Gate::allows('pimpinan')) {
      return view('pages.kelola.pengguna.edit', compact('pengguna'));
    } else {
      abort('403');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpPenggunaRequest $request, User $pengguna)
  {

    filled($request->password)
          ? $pengguna->update($request->all())
          : $pengguna->update($request->except('password'));

    return redirect(route('pengguna.index'))->withInfo('Data Pengguna berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $pengguna)
  {
    $pengguna->delete();
    return redirect(route('pengguna.index'))->withInfo('Data Pengguna berhasil dihapus!');
  }
}
