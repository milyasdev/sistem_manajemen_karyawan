@extends('master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Layanan Reimbursement</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Layanan Reimbursement</li>
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
                  <h3 class="card-title">Form Pengajuan Reimbursement</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('reimburst.save') }}" method="post" enctype="multipart/form-data" id="reimbustForm">
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
                            <label for="jenis_reimbursement">Jenis Reimbursement</label>
                            <select name="jenis_reimbursement" class="form-control">
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Transportasi">Transportasi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="">Jumlah Uang Reimbursement</label>
                        <input type="number" name="nilai_reimbursement" class="form-control" id="" placeholder=""></input>
                        </div>
                        <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea style="height: 150px" type="text" name="keterangan" class="form-control" id="" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bukti_reimbursement">Upload Bukti (JPG)</label>
                            <input type="file" name="bukti_reimbursement" class="form-control" accept=".jpg,.jpeg">
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
    document.getElementById("reimbustForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah submit otomatis
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin akan ajukan reimbursement ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form secara manual dengan ID yang benar
                document.getElementById("reimbustForm").submit();
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
