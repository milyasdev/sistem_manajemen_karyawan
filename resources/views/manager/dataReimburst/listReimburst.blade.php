@extends('master')

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Reimburst Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Reimburst Karyawan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Dibawah ini adalah data reimburst pegawai</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>NIP</th>
            <th>Judul Pengajuan</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Bukti</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_karyawan }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->jenis_reimbursement }}</td>
                    <td>{{ number_format($item->nilai_reimbursement, 0, ',', '.') }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ asset('storage/photos/' . $item->bukti_reimbursement) }}"
                        class="btn btn-sm btn-primary"
                        download>
                            Download
                        </a>
                    </td>
                    <td>
                        @if ($item->status == 1)
                            <span class="badge badge-success">Disetujui</span>
                        @elseif ($item->status == 2)
                        <span class="badge badge-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
