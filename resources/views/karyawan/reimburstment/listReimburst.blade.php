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
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Jenis Reimbursement</th>
                  <th>Nilai Reimbursement</th>
                  <th>Keterangan</th>
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
                            <td>{{ $item->jenis_reimbursement }}</td>
                            <td>{{ $item->nilai_reimbursement }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <span class="badge bg-warning">Menunggu disetujui</span>
                                @elseif ($item->status == 1)
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif ($item->status == 2)
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
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
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
