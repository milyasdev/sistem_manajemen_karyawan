@extends('master')

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengajuan Reimburst</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengajuan Reimburst</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Dibawah ini adalah data Pengajuan Reimburst</h3>
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
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
            $filteredData = $data->where('status', 0); // Ambil hanya yang statusnya 0
        @endphp
        @if ($filteredData->isNotEmpty())
            @foreach ($filteredData as $item)
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
                        <button onclick="confirmApprove('{{ route('approveReimbursement', ['id'=>$item->id]) }}')" class="btn btn-sm btn-success">
                            Setujui
                        </button>
                        <button onclick="confirmTolak('{{ route('tolakReimbursement', ['id'=>$item->id]) }}')" class="btn btn-sm btn-danger">
                            Tolak
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="text-center">Tidak ada data reimbursement</td>
            </tr>
        @endif
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
