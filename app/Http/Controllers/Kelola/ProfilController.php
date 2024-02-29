<?php

namespace App\Http\Controllers\Kelola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    public function index() {
      return view('pages.kelola.profil.index',[
        'user' => Auth::user(),
      ]);
    }

    public function upProfil(Request $request) {
      if (Auth::user()->role == 'supir') { //Jika Supir
        $request->validate([
          'name' => 'required',
          'username' => 'required|unique:users,username,' . Auth::user()->id,
          'alamat' => 'required',
          'telepon' => 'required',
        ]);

        if($request->filled('password')){
          Auth::user()->update($request->except('alamat', 'telepon'));
          Auth::user()->supir->update($request->except('name', 'username', 'password'));
        } else {
          Auth::user()->update($request->except('password', 'alamat', 'telepon'));
          Auth::user()->supir->update($request->except('name', 'username', 'password'));
        }

      } else { // Jika Bukan Supir
        $request->validate([
          'name' => 'required',
          'username' => 'required|unique:users,username,' . Auth::user()->id,
        ]);

        if($request->filled('password')){
          Auth::user()->update($request->all());
        } else {
          Auth::user()->update($request->except('password'));
        }
      }

      return back()->withInfo('Profil Anda berhasil diperbarui!');
    }

    public function upFoto(Request $request) {
      $request->validate([
        'files' => ['image', 'required'],
      ]);

      $files = $request->file('files');
      if ($request->hasFile('files')) {
        $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
        $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension                  = $files->getClientOriginalExtension();
        $filenamesimpan             = 'fotoprofil' . Str::random(3) . time() . Str::random(10) . '.' . $extension;

        $editdata = [
          'foto_profil' => $filenamesimpan,
        ];
        Auth::user()->update($editdata);

        $files->move('fotoprofil', $filenamesimpan);

      }

      if ($request->old_foto != 'profile.jpg'){
        $filegambar = public_path('/fotoprofil/' . $request->old_foto);
        File::delete($filegambar);
      }

      return back()->with([
        'info' => 'Foto profil berhasil diperbarui!',
      ]);
    }
}
