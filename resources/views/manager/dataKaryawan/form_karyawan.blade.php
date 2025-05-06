@extends('master')


@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form Tambah Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Form</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Masukkan identitas karyawan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('prosesTambahKaryawan') }}" method="post" enctype="multipart/form-data" id="tambahKaryawan">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="">Nama Karyawan</label>
            <input type="text" name="name" class="form-control" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="">NIP</label>
            <input type="text" name="nip" class="form-control" id="" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Alamat Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="" placeholder="">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection

@section('js')
<script>
    document.getElementById("tambahKaryawan").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah submit otomatis
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin akan tambah karyawan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form secara manual dengan ID yang benar
                document.getElementById("tambahKaryawan").submit();
            }
        });
    });
</script>
@endsection
