<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            $check = \App\Models\User::where('id', Auth::user()->id)
                ->firstOrFail();

            if ($check->roles != "admin") {
                return redirect('/403');
            } else {
                FacadesSession::flash('berhasil','Login Berhasil');
                return redirect('/admin/dashboard');
            }
        } else {
            FacadesSession::flash('gagal','Pastikan Untuk Memasukkan Email dan Password Yang Valid');
		    return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
