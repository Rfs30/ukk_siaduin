<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <!-- <i class="fas fa-laugh-wink"></i> -->
      </div>
      <div class="sidebar-brand-text mx-3">Siaduin</div>
    </a>
    <?php if ($this->session->userdata('level') == 'admin' or $this->session->userdata('level') == 'petugas') : ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin/Dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      User
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <?php if ($this->session->userdata('username') && $this->session->userdata('level') == NULL) : ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Masyarakat/PengaduanController/dashboard_masyarakat') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    <?php endif; ?>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('User/ProfileController') ?>">
        <i class="fas fa-user"></i>
        <span>Profile</span>
      </a>
      <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Profile:</h6>
          <a class="collapse-item" href="<?= base_url('User/ProfileController'); ?>">Profile Saya</a>
          <a class="collapse-item" href="<?= base_url('Auth/ChangePasswordController');  ?>">Ganti Password</a>
        </div>
      </div> -->
    </li>


    <?php // form pengaduan diakses oleh masyarakat 
    ?>
    <?php if ($this->session->userdata('username') && $this->session->userdata('level') == NULL) : ?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengaduan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengaduan:</h6>
            <a class="collapse-item" href="<?= base_url('Masyarakat/PengaduanController'); ?>">Tulis Pengaduan</a>
          </div>
        </div>
      </li>
    <?php endif; ?>
    <?php // end form pengaduan diakses oleh masyarakat 
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php // dropdown admin hanya oleh akun admin dan petugas 
    ?>
    <?php if ($this->session->userdata('level') == 'admin' or $this->session->userdata('level') == 'petugas') : ?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-user-cog"></i>
          <span>Admin</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tanggapan:</h6>
            <a class="collapse-item" href="<?= base_url('Admin/Tanggapan'); ?>">Pengaduan Masuk</a>
            <a class="collapse-item" href="<?= base_url('Admin/Tanggapan/tanggapan_proses'); ?>">Pengaduan Proses</a>
            <a class="collapse-item" href="<?= base_url('Admin/Tanggapan/tanggapan_tolak'); ?>">Pengaduan Ditolak</a>
            <a class="collapse-item" href="<?= base_url('Admin/Tanggapan/tanggapan_selesai'); ?>">Pengaduan Selesai</a>
            <div class="collapse-divider"></div>

            <?php // tambah petugas admin akses 
            ?>
            <?php if ($this->session->userdata('level') == 'admin') : ?>
              <h6 class="collapse-header">Registrasi:</h6>
              <a class="collapse-item" href="<?= base_url('Admin/Petugas'); ?>">Tambah Petugas</a>
            <?php endif; ?>
            <?php // end tambah petugas admin akses 
            ?>

          </div>
        </div>
      </li>
    <?php endif; ?>
    <?php // end dropdown admin hanya oleh akun admin dan petugas 
    ?>


    <?php // generate laporan akses admin 
    ?>
    <?php if ($this->session->userdata('level') == 'admin') : ?>
      <<li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Masyarakat') ?>">
          <svg class="svg-icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
          <span>Data Masyarakat</span>
        </a>
        </li>
        <!-- Nav Item - Generate Laporan -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Admin/Laporan'); ?>">
            <i class="fas fa-file-pdf"></i>
            <span>Generate Laporan</span></a>
        </li>
      <?php endif; ?>
      <?php // end generate laporan akses admin 
      ?>

      <!-- Nav Item - Logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Auth/LogoutController'); ?>">
          <i class="fas fa-sign-out-alt"></i>
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