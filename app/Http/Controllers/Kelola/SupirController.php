<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupirRequest;
use App\Http\Requests\UpSupirRequest;
use App\Models\Supir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupirController extends Controller
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
    $supir = Supir::get();
    return view('pages.kelola.supir.index', compact('supir'));
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
    return view('pages.kelola.supir.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(SupirRequest $request)
  {
    $cUser = User::create($request->except(['telepon', 'alamat']));
    $cUser;

    Supir::create([
      'user_id' => $cUser->id,
      'alamat' => $request->alamat,
      'telepon' => $request->telepon,
    ]);

    return redirect(route('supir.index'))->withInfo('Data Supir berhasil ditambahkan!');
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
  public function edit(Supir $supir)
  {
    if (Auth::user()->role === 'supir') {
      abort('403');
    }
    return view('pages.kelola.supir.edit', compact('supir'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpSupirRequest $request, Supir $supir)
  {
    $supir->update($request->all());
    $supir->user->update(['name' => $request->name]);
    return redirect(route('supir.index'))->withInfo('Data Supir berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Supir $supir)
  {
    User::where('id', $supir->user_id)->delete();
    $supir->delete();
    return redirect(route('supir.index'))->withInfo('Data Supir berhasil dihapus!');
  }
}
