<?php
  $nama = $this->session->userdata('display_name');
?>




<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
     <a class="navbar-brand" href="#">
      <img src="<?php echo base_url('assets/images/logo.svg'); ?>" height="35">
     </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <span class="navbar-nav me-auto mb-2 mb-lg-0">
        INVENTORY SYSTEM - PT BAHARI RAHARJA PERMAI
      </span>
      <span class="navbar-text">
        Halo, <?= $nama; ?> | <a class="text-decoration-none" href="<?= site_url('login/logout'); ?>">Logout</a>
      </span>
    </div>
    </div>
  </div>
</nav>