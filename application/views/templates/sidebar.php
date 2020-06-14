 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-graduation-cap"></i> -->
        </div>
        <div class="sidebar-brand-text mx-1">SIM RT/RW 028</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php $jabatan = $this->session->userdata('jabatan'); ?>
    <?php if($jabatan == 'RT') : ?>
    <!-- Heading -->
      <div class="sidebar-heading">
        Rukun Tetangga
      </div>

      <li class="nav-item mt-0">
        <a class="nav-link pb-0" href="<?php echo base_url('ketuart/surat_pengantar') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Kelola Surat Pengantar</span></a>
      </li>

      <li class="nav-item mt-0">
        <a class="nav-link pb-0" href="<?php echo base_url('ketuart') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Kelola Data Warga</span></a>
      </li>


      <!-- Divider -->
      <?php endif; ?>

      <?php $jabatan = $this->session->userdata('jabatan'); ?>
    <?php if($jabatan == 'RW') : ?>
    <!-- Heading -->
      <div class="sidebar-heading">
        Rukun Warga
      </div>

      <li class="nav-item mt-0">
        <a class="nav-link pb-0" href="<?php echo base_url('ketuarw') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Kelola User</span></a>
      </li>

      <li class="nav-item mt-0">
        <a class="nav-link pb-0" href="<?php echo base_url('ketuarw/data_surat_pengantar') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Kelola Data Warga</span></a>
      </li>


      <!-- Divider -->
      <?php endif; ?>


      <li class="nav-item mt-0">
        <a class="nav-link pb-0" href="<?php echo base_url('auth/logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>
    






      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->