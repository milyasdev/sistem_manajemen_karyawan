<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LayananCutiModel;
use App\Models\ReimbursementModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{

    //FUNCTION CUTI DIBAWAH INI ====================================================================================================================

    public function cuti_form(){
        $userId = Auth::id();
        $data = User::find($userId);
        // dd($data);
        return view('karyawan.cuti.formPengajuan', compact('data', 'userId'));
    }

    public function cuti_list(){
        $userId = Auth::id();
        $data = LayananCutiModel::where('id_user', $userId)->get();
        // dd($data);
        return view('karyawan.cuti.listCuti', compact('data'));
    }

    public function cuti_save(Request $req){
        $req->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'alasan' => 'required'
        ]);

        $statusPengajuanCuti = 0;
        $cuti = new LayananCutiModel;
        $cuti->id_user              = $req->user_id;
        $cuti->nama_karyawan        = $req->input('nama_karyawan');
        $cuti->nip                  = $req->input('nip');
        $cuti->tanggal_mulai        = $req->input('tanggal_mulai');
        $cuti->tanggal_selesai      = $req->input('tanggal_selesai');
        $cuti->alasan               = $req->input('alasan');
        $cuti->status               = $statusPengajuanCuti;
        $cuti->save();

        return redirect()->route('cuti.list');
    }

    //FUNCTION REIMBURSEMENT DIBAWAH INI ==========================================================

    public function reimburst_form(){
        $userId = Auth::id();
        $data = User::find($userId);
        // dd($data);
        return view('karyawan.reimburstment.formPengajuan', compact('userId', 'data'));
    }

    public function reimburst_list(){
        $userId = Auth::id();
        $data = ReimbursementModel::where('id_user', $userId)->get();
        return view('karyawan.reimburstment.listReimburst', compact('data'));
    }

    public function reimburst_save(Request $req){
        $req->validate([
            'jenis_reimbursement' => 'required',
            'nilai_reimbursement' => 'required',
            'keterangan' => 'required',
            'bukti_reimbursement' => 'required'
        ]);

        $statusPengajuanReimb = 0;
        $reimb = new ReimbursementModel();
        $reimb->id_user                     = $req->user_id;
        $reimb->nama_karyawan               = $req->input('nama_karyawan');
        $reimb->nip                         = $req->input('nip');
        $reimb->jenis_reimbursement         = $req->input('jenis_reimbursement');
        $reimb->nilai_reimbursement         = $req->input('nilai_reimbursement');
        $reimb->keterangan                  = $req->input('keterangan');

        if($req->hasFile('bukti_reimbursement')){

            //upload gambar baru
            $picture    = $req->file('bukti_reimbursement');
            $hashName   = $picture->hashName();

            Storage::disk('public')->put("photos/{$hashName}", file_get_contents($picture));
            $reimb->bukti_reimbursement = $hashName;
        }

        $reimb->status                  = $statusPengajuanReimb;
        $reimb->save();

        return redirect()->route('reimburst.list')->with('success', 'berhasil diajukan');
    }

}