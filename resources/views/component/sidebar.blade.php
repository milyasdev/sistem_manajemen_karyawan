<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        @if (Auth::user()->status == 1)
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Karyawan</span>
        @elseif (Auth::user()->status == 2)
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Management</span>
        @endif

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::check())
                    {{-- status 1 adalah karyawan --}}
                    @if (Auth::user()->status == 1)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Cuti
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('cuti.form') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Pengajuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cuti.list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Status Cuti</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Reimbursement
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('reimburst.form') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Pengajuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reimburst.list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Status Reimbursement</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- status 2 adalah manager     --}}
                    @elseif (Auth::user()->status == 2)
                        <li class="nav-item">
                            <a href="{{ route('summaryExecutive') }}" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Summary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data Karyawan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('formTambahKaryawan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Karyawan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listDataKaryawan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Karyawan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Cuti Karyawan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listPengajuanKaryawan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengajuan karyawan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('listCuti') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Cuti Karyawan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Reimbursement
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('reimburstPengajuan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengajuan Karyawan</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listReimburst') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Reimbursement</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <form action="{{ route('prosesLogout') }}" method="POST" style="display: inline"
                        id="logOut">
                        @csrf
                        <button type="submit" class="nav-link btn-danger">
                            <p style="color: white">Log Out</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    document.getElementById("logOut").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah submit otomatis
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin mau Log Out?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form secara manual dengan ID yang benar
                document.getElementById("logOut").submit();
            }
        });
    });
</script>
