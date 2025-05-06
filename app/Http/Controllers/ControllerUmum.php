<?php

namespace App\Http\Controllers;

use App\Models\LayananCutiModel;
use App\Models\ReimbursementModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerUmum extends Controller
{

    public function summaryExecutive()
    {
        $karyawan = User::where('status', 1)->get();
        $jumlahKaryawan = $karyawan->count();

        $cuti = LayananCutiModel::all();
        $totalCuti = $cuti->count();

        $reimb = ReimbursementModel::all();
        $totalReimb = $reimb->count();
        return view('summary', compact('jumlahKaryawan', 'totalCuti', 'totalReimb'));
    }

    public function prosesLogout()
    {
        // Logout Pengguna
        Auth::logout();

        //Regenerasi sesi untuk keamanan tambahan
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}