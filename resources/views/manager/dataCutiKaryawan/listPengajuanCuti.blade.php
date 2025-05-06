@extends('master')

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengajuan Cuti Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengajuan Cuti Karyawan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Dibawah ini adalah data Pengajuan Cuti Karyawan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Karyawan</th>
          <th>Nip</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <th>Alasan</th>
          <th>Lama Cuti</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($listCuti as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->nama_karyawan }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->tanggal_mulai }}</td>
            <td>{{ $item->tanggal_selesai }}</td>
            <td>{{ $item->alasan }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($item->tanggal_selesai)) + 1 }} hari</td>
            <td>
              <button onclick="confirmApprove('{{ route('approveCuti', ['id'=>$item->id]) }}')" class="btn btn-sm btn-success">
                  Setujui
              </button>
              <button onclick="confirmTolak('{{ route('tolakCuti', ['id'=>$item->id]) }}')" class="btn btn-sm btn-danger">
                  Tolak
              </button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

@section('js')
<script>
    function confirmApprove(href) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin akan setujui ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya setujui',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL penghapusan
                window.location.href = href;
            }
        });
    }
</script>
<script>
    function confirmTolak(href) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin akan menolak?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ya tolak',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL penghapusan
                window.location.href = href;
            }
        });
    }
</script>
@endsection
