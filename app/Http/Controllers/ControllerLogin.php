<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class ControllerLogin extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(UserRequest $req)
    {
        $kredensial = $req->only('email', 'password');
        // Cek apakah user ada dan statusnya diblokir
        $user = User::where('email', $req->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Akun tidak ditemukan',
            ])->onlyInput('email');
        }

        if ($user->status_blokir == 0) {
            return back()->withErrors([
                'email' => 'Akun Anda telah diblokir, Hubungi HRD',
            ])->onlyInput('email');
        }

        //proses login dibawah ini
        // dd($kredensial);
        if (Auth::attempt($kredensial)) {
            $req->session()->regenerate();
            return redirect()->route('summaryExecutive');
        }

        return back()->withErrors([
            'email' => 'email atau password salah',
        ])->onlyInput('email');
    }
}
