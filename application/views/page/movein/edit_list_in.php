	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Edit List In</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('list_in'); ?>" >List In</a></li>  
    						<li class="breadcrumb-item">Form Edit List In</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      </div>

      <!-- Content -->
      <div class="container-fluid">
      	<div class="row">
      		<form class="needs-validation" method="post" action="<?php echo site_url('list_in/update_list_in'); ?>" novalidate>
				<div class="card">
					<div class="card-header">
						<div class="card-title fs-6">Form Edit List In</div>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label">MLO*</label>
							<select class="form-control form-select select2" name="id_mlo" required>
								<option selected disabled value="">Pilih MLO</option>
									<?php foreach ($mlo as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>"<?php if($get_by_id->id_mlo = $value->id){echo "selected";} ?> >
											<?php echo $value->nama; ?>
										</option>
									<?php } ?>
							</select>
							<div class="invalid-feedback">Harap pilih salah satu!</div>
						</div>

						<div class="mb-3">
							<label class="form-label">Vessel*</label>
							<select class="form-select form-control select2" name="id_vessel" required>
								<option selected disabled value="">Pilih Vessel</option>
								<?php foreach ($vessel as $key => $value) { ?>
									<option value="<?php echo $value->id; ?>"<?php if($get_by_id->id_vessel = $value->id){echo "selected";} ?> >
										<?php echo $value->nama; ?>
									</option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">Harap pilih salah satu!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">No. Voyage*</label>
							<input type="text" name="no_voyage" class="form-control" value="<?php echo $get_by_id->no_voyage; ?>" required>
							<div class="invalid-feedback">Harap diisi!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Jumlah*</label>
							<input type="number" name="jumlah" class="form-control" value="<?php echo $get_by_id->jumlah; ?>" min="1" required>
							<div class="invalid-feedback">Harap diisi!</div>
						</div>
					</div>
					<div class="card-footer">
						<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
				  		<button type="submit" class="btn btn-primary">Submit</button>
				  		<a href="<?php echo site_url('list_in'); ?>" class="btn btn-danger">Batal</a>
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