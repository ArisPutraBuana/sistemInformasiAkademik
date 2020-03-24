<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-1">SISFO-AKADEMIK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('administrator/dashboard');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
  
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-university"></i>
          <span>Akademik</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub-Menu Akademik</h6>
            <a class="collapse-item" href="<?= base_url('administrator/jurusan'); ?>">Jurusan</a>
            <a class="collapse-item" href="<?= base_url('administrator/prodi'); ?>">Program Studi</a>
            <a class="collapse-item" href="<?= base_url('administrator/matakuliah'); ?>">Mata Kuliah</a>
            <a class="collapse-item" href="<?= base_url('administrator/mahasiswa'); ?>">Mahasiswa</a>
            <a class="collapse-item" href="<?= base_url('administrator/tahun_akademik'); ?>">Tahun Akademik</a>
            <a class="collapse-item" href="<?= base_url('administrator/krs'); ?>">KRS</a>
            <a class="collapse-item" href="<?= base_url('administrator/nilai/input_nilai'); ?>">Input Nilai</a>
            <a class="collapse-item" href="<?= base_url('administrator/nilai'); ?>">KHS</a>
            <a class="collapse-item" href="<?= base_url('administrator/transkrip_nilai'); ?>">Cetak Transkrip</a>
            <a class="collapse-item" href="<?= base_url('administrator/dosen'); ?>">Dosen</a>

          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengaturan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub-Menu Pengaturan</h6>
            <a class="collapse-item" href="<?= base_url('administrator/users'); ?>">User</a>
            <a class="collapse-item" href="#">Menu</a>
          </div>
        </div>
      </li>
    
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Info Kampus</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub-Menu Info Kampus</h6>
            <a class="collapse-item" href="<?= base_url('administrator/identitas'); ?>">Identitas</a>
            <a class="collapse-item" href="<?= base_url('administrator/hubungi_kami'); ?>">Pesan Users</a>
            <a class="collapse-item" href="<?= base_url('administrator/informasi'); ?>">Informasi Kampus</a>
            <a class="collapse-item" href="<?= base_url('administrator/tentang_kampus'); ?>">Tentang Kampus</a>
            <a class="collapse-item" href="#">Fasilitas</a>
            <a class="collapse-item" href="#">Materi Perkuliahan</a>
            <a class="collapse-item" href="#">Gallery</a>
            <a class="collapse-item" href="#">Kontak</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('administrator/auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        </nav>