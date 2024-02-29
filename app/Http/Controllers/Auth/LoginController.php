<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('pages.auth.login');
  }

  public function cekLogin(Request $request)
  {
    $input = $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($input)) {
      $role = auth()->user()->role;
      return redirect(route('kelola.dashboard.index'))->withInfo($role);
    } else {
      return back()->withInfo('Username atau password salah!');
    }
  }
}
