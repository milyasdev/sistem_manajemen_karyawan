@extends('master')

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">List Data Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Data Karyawan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Dibawah ini adalah data pegawai</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Pengajuan</th>
          <th>Nama Karyawan</th>
          <th>NIP</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <th>Durasi Cuti</th>
          <th>Alasan</th>
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
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->nama_karyawan }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->tanggal_mulai }}</td>
            <td>{{ $item->tanggal_selesai }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($item->tanggal_selesai)) + 1 }} hari</td>
            <td>{{ $item->alasan }}</td>
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
