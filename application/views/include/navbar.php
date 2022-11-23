<?php
  $nama = $this->session->userdata('display_name');
?>

<header class="navbar navbar-primary sticky-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 text-white col-lg-2 me-0 px-3 fs-6" href="<?php echo site_url('dashboard'); ?>">
    <img src="<?php echo base_url('assets/images/logo.svg'); ?>" height="35">
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <span class="text-white fs-4">INVENTORY SYSTEM - PT BAHARI RAHARJA PERMAI</span>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <span class="nav-link px-3 text-white fs-6"><i data-feather="user"></i> Halo, <?php echo $nama; ?> | <a href="<?php echo site_url('login/logout'); ?>" class="text-decoration-none text-white">Logout <i data-feather="log-out"></i></a></span>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">