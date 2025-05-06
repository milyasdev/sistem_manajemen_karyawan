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
          <th>Nama Karyawan</th>
          <th>Nip Karyawan</th>
          <th>Email</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                @if ($item->status_blokir == 1)
                <td>{{ $item->name }}</td>
                @elseif ($item->status_blokir == 0)
                <td style="color: red">{{ $item->name }}</td>
                @endif

                <td>{{ $item->nip }}
                </td>
                <td>{{ $item->email }}</td>
                <td>Pegawai</td>
                  <td>
                      <button class="btn btn-sm btn-warning">Edit</button>
                      @if ($item->status_blokir == 1)
                        <button onclick="confirmBlokir('{{ route('prosesBlokir', ['id'=>$item->id]) }}')" class="btn btn-sm btn-danger">
                            Blokir
                        </button>
                      @elseif ($item->status_blokir == 0)
                        <button onclick="confirmOpen('{{ route('prosesOpen', ['id'=>$item->id]) }}')" class="btn btn-sm btn-success">
                            Open
                        </button>
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

@section('js')
<script>
    function confirmBlokir(href) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin akan blokir user ini?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ya Blokir',
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
    function confirmOpen(href) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin akan Open user ini?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ya Open',
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
