@extends('master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Layanan Cuti</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Layanan Cuti</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Pengajuan Cuti</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('cuti.save') }}" method="post" enctype="multipart/form-data" id="cutiForm">
                    @csrf
                    <div class="card-body">
                        <input type="text" name="user_id" value="{{ $userId }}" hidden>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control" placeholder="{{ $data->name }}" value="{{ $data->name }}" readonly>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">NIP</label>
                        <input type="text" name="nip" class="form-control" placeholder="{{ $data->nip }}" value="{{ $data->nip }}" readonly>
                        </div>
                        <div class="form-group">
                        <label for="">Tanggal Mulai Cuti</label>
                        <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="">Tanggal Selesai Cuti</label>
                        <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="">Keperluan Cuti</label>
                        <textarea type="text" name="alasan" class="form-control" id="" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                </form>
              </div>
        </div>
@endsection

@section('js')
<script>
document.getElementById("cutiForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah submit otomatis
    Swal.fire({
        title: 'Perhatian!',
        text: 'Apakah anda yakin akan setujui data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya Benar',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form secara manual
            document.getElementById("cutiForm").submit();
        }
    });
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let tanggalMulai = document.getElementById("tanggal_mulai");
        let tanggalSelesai = document.getElementById("tanggal_selesai");

        // Set min date untuk tanggal mulai (besok)
        let today = new Date();
        today.setDate(today.getDate() + 1); // Besok
        let minDateMulai = today.toISOString().split("T")[0];
        tanggalMulai.setAttribute("min", minDateMulai);

        // Event ketika tanggal mulai dipilih
        tanggalMulai.addEventListener("change", function () {
            let selectedMulai = new Date(this.value);
            selectedMulai.setDate(selectedMulai.getDate() + 1); // Min. tanggal selesai = setelah mulai
            let minDateSelesai = selectedMulai.toISOString().split("T")[0];
            tanggalSelesai.setAttribute("min", minDateSelesai);
        });
    });
</script>
@endsection
