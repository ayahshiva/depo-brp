
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Berita Acara</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('berita_acara'); ?>" >Berita Acara</a></li>  
    						<li class="breadcrumb-item">Form Berita Acara Penerimaan</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      </div>

     	
      <!-- Content -->
      <div class="container-fluid">
      	<div class="row">
      		<form class="needs-validation" method="post" action="<?php echo site_url('berita_acara/view_berita_acara'); ?>" target="_blank" novalidate>
      			<div class="card">
      				<div class="card-header">
      					<div class="card-title fs-5">Form Berita Acara Penerimaan</div>
      				</div>
      				<div class="card-body">
      					<div class="mb-3">
      						<label class="form-label">Periode*</label>
      						<div class="row">
	      						<div class="col-sm-3">
	      							<input type="date" name="tanggal_awal" class="form-control" required>
	      							<div class="invalid-feedback">Harap tentukan tanggal!</div>
	      						</div>
	      						<div class="col-sm-3">
	      							<input type="date" name="tanggal_akhir" class="form-control" required>
	      							<div class="invalid-feedback">Harap tentukan tanggal!</div>
	      						</div>
	      					</div>
      					</div>
      					<div class="mb-3">
      						<label class="form-label">EMKL*</label>
      						<div class="row">
      							<div class="col-sm-6">
      								<select class="form-control form-select select2" name="id_emkl" required>
										<option selected disabled value="">Pilih EMKL</option>
											<?php foreach ($emkl as $key => $value) { ?>
												<option value="<?php echo $value->id; ?>">
													<?php echo $value->nama; ?>
												</option>
											<?php } ?>
									</select>
							<div class="invalid-feedback">Harap pilih EMKL!</div>
      							</div>
      						</div>
      					</div>
      					<div class="mb-3">
      						<label class="form-label">MLO*</label>
      						<div class="row">
      							<div class="col-sm-6">
      								<select class="form-control form-select select2" name="id_mlo" required>
										<option selected disabled value="">Pilih MLO</option>
											<?php foreach ($mlo as $key => $value) { ?>
												<option value="<?php echo $value->id; ?>">
													<?php echo $value->nama; ?>
												</option>
											<?php } ?>
									</select>
							<div class="invalid-feedback">Harap pilih MLO!</div>
      							</div>
      						</div>
      					</div>
      					<div class="mb-3">
      						<label class="form-label">Vessel*</label>
      						<div class="row">
      							<div class="col-sm-6">
      								<select class="form-control form-select select2" name="id_vessel" required>
										<option selected disabled value="">Pilih Vessel</option>
											<?php foreach ($vessel as $key => $value) { ?>
												<option value="<?php echo $value->id; ?>">
													<?php echo $value->nama; ?>
												</option>
											<?php } ?>
									</select>
							<div class="invalid-feedback">Harap pilih Vessel!</div>
      							</div>
      						</div>
      					</div>
      					<div class="mb-3">
      						<label class="form-label">No Voyage*</label>
      						<div class="row">
      							<div class="col-sm-6">
      								<input type="text" name="no_voyage" class="form-control" required>
									<div class="invalid-feedback">Harap diisi!</div>
      							</div>
      						</div>
      					</div>
      					<div class="mb-3">
      						<label class="form-label">DO Number*</label>
      						<div class="row">
      							<div class="col-sm-6">
      								<input type="text" name="do_number" class="form-control" required>
									<div class="invalid-feedback">Harap diisi!</div>
      							</div>
      						</div>
      					</div>
      				</div>
      				<div class="card-footer">
      					<button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
      					<button type="submit" name="excel" class="btn btn-success">Save as Excel</button>
      				</div>
      			</div>
      		</form>
		</div>
   	</div>	
</main>

<script>
	$(document).ready(function() {
    	$('.select2').select2();
	});
</script>
