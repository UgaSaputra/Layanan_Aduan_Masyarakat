<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard.show') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if(auth()->user()->role == 'superadmin')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Menajeman Petugas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('petugas.create') }}">
                    <i class="bi bi-circle"></i><span>Tambah Petugas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('petugas.lihat') }}">
                    <i class="bi bi-circle"></i><span>Data Petugas</span>
                </a>
            </li>
        </ul>
    </li>
    @endif


    <!-- Menampilkan Menu untuk Admin -->
    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Manajemen Admin</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('admin.show') }}">
                    <i class="bi bi-circle"></i><span>Tambah Admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.data') }}">
                    <i class="bi bi-circle"></i><span>Data Admin</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Laporan Pengaduan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('aduanAdmin.show') }}">
                    <i class="bi bi-circle"></i><span>Daftar Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('aduanAdmin.detail') }}">
                    <i class="bi bi-circle"></i><span>Detail Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('aduanAdmin.aksi') }}">
                    <i class="bi bi-circle"></i><span>Aksi Laporan</span>
                </a>
            </li>
        </ul>
    </li>
    @endif

    <!-- Menampilkan Menu untuk Superadmin -->
    @if(auth()->user()->role == 'superadmin')
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Laporan Pengaduan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('aduanSuperAdmin.show') }}">
                    <i class="bi bi-circle"></i><span>Daftar Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('aduanSuperAdmin.detail') }}">
                    <i class="bi bi-circle"></i><span>Detail Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('aduanSuperAdmin.rekap') }}">
                    <i class="bi bi-circle"></i><span>Rekap Laporan</span>
                </a>
            </li>
        </ul>
    </li>
    @endif

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('login.form') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside>
