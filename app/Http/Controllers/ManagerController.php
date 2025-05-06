<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LayananCutiModel;
use App\Models\ReimbursementModel;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    // public function summary(){
    //     return view('manager.summary.summary');
    // }

    public function formTambahKaryawan()
    {
        return view('manager.dataKaryawan.form_karyawan');
    }

    public function prosesTambahKaryawan(Request $req)
    {
        //validasi
        $req->validate([
            'name' => 'required',
            'nip'  => 'required',
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        $statusKaryawan = 1;

        $user = new User();
        $user->name = $req->name;
        $user->nip = $req->nip;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->status = $statusKaryawan;
        $user->save();

        return redirect()->route('listDataKaryawan');
    }

    public function prosesBlokirKaryawan($id)
    {
        $data = User::find($id);
        $statusBlokir = 0;
        $data->status_blokir = $statusBlokir;
        $data->save();
        return redirect()->route('listDataKaryawan');
    }

    public function prosesOpenKaryawan($id)
    {
        $data = User::find($id);
        $statusOpen = 1;
        $data->status_blokir = $statusOpen;
        $data->save();
        return redirect()->route('listDataKaryawan');
    }

    //cuti dibawah ini

    public function listDataKaryawan()
    {
        $data = User::where('status', 1)->get();
        return view('manager.dataKaryawan.listDataKaryawan', compact('data'));
    }

    public function listPengajuanCutiKaryawan()
    {
        $listCuti = LayananCutiModel::where('status', 0)->get();
        // dd($listCuti);
        return view('manager.dataCutiKaryawan.listPengajuanCuti', compact('listCuti'));
    }

    public function listCuti()
    {
        $data = LayananCutiModel::all();
        return view('manager.dataCutiKaryawan.listCuti', compact('data'));
    }

    public function approveCuti($id)
    {
        $data = LayananCutiModel::find($id);
        $statusApproveCuti = 1;
        $data->status = $statusApproveCuti;
        $data->save();
        return redirect()->route('listPengajuanKaryawan');
    }

    public function tolakCuti($id)
    {
        $data = LayananCutiModel::find($id);
        $statusTolakCuti = 2;
        $data->status = $statusTolakCuti;
        $data->save();
        return redirect()->route('listPengajuanKaryawan');
    }

    //proses terkait reimbursement dibawah ini =============================================================
    //proses terkait reimbursement dibawah ini =============================================================

    public function reimburstPengajuan()
    {
        $data = ReimbursementModel::all();

        return view('manager.dataReimburst.listPengajuanReimburst', compact('data'));
    }

    public function listReimburst()
    {
        $data = ReimbursementModel::all();
        return view('manager.dataReimburst.listReimburst', compact('data'));
    }

    public function approveReimbursement($id)
    {
        $data = ReimbursementModel::find($id);
        $statusApprove      = 1;
        $data->status       = $statusApprove;
        $data->save();
        return redirect()->route('reimburstPengajuan');
    }

    public function tolakReimbursement($id)
    {
        $data = ReimbursementModel::find($id);
        $statusTolak        = 2;
        $data->status       = $statusTolak;
        $data->save();
        return redirect()->route('reimburstPengajuan');
    }
}