	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Edit Container</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('container'); ?>" >Edit Container</a></li>  
    						<li class="breadcrumb-item">Form Edit Container</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      </div>

      <!-- Content -->
      <div class="container-fluid">
      	<div class="row col-md-6">
      		<form class="needs-validation" method="post" action="<?php echo site_url('container/update_container'); ?>" novalidate>
				<div class="card">
					<div class="card-header">
						<div class="card-title fs-6">Form Edit Container</div>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label">MLO*</label>
							<select class="form-control form-select select2" name="id_mlo" required>
								<option selected disabled value="">Pilih MLO</option>
									<?php foreach ($mlo as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>" <?php if($value->id == $get_by_id->id_mlo){echo "selected";} ?> >
											<?php echo $value->nama; ?>
										</option>
									<?php } ?>
							</select>
							<div class="invalid-feedback">Harap pilih salah satu!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">No. Container*</label>
							<input type="text" name="no_cont" class="form-control" value="<?php echo $get_by_id->no_cont; ?>" required>
							<div class="invalid-feedback">Harap diisi!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Size</label>
							<select name="size" class="form-control form-select" required>
								<option value="">Pilih Size</option>
	                            <option value="-"> - </option>
	                            <option value="D2" <?php if($get_by_id->size == 'D2'){echo "selected";} ?> >D2</option>
	                            <option value="D3" <?php if($get_by_id->size == 'D3'){echo "selected";} ?> >D3</option>
	                            <option value="D4" <?php if($get_by_id->size == 'D4'){echo "selected";} ?> >D4</option>
	                            <option value="D5" <?php if($get_by_id->size == 'D5'){echo "selected";} ?> >D5</option>
	                            <option value="20" <?php if($get_by_id->size == '20'){echo "selected";} ?> >20</option>
	                            <option value="40" <?php if($get_by_id->size == '40'){echo "selected";} ?> >40</option>
	                            <option value="45" <?php if($get_by_id->size == '45'){echo "selected";} ?> >45</option>
							</select>
							<div class="invalid-feedback">Harap pilih salah satu!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Tipe</label>
							<select name="tipe" class="form-control form-select" required>
								<option value="">Pilih Tipe</option>
								<option value="-"> - </option>
	                            <option value="GP" <?php if($get_by_id->tipe == 'GP'){echo "selected";} ?> >GP</option>
	                            <option value="HC" <?php if($get_by_id->tipe == 'HC'){echo "selected";} ?> >HC</option>
	                            <option value="OP" <?php if($get_by_id->tipe == 'OP'){echo "selected";} ?> >OP</option>
	                            <option value="FR" <?php if($get_by_id->tipe == 'FR'){echo "selected";} ?> >FR</option>
	                            <option value="RF" <?php if($get_by_id->tipe == 'RF'){echo "selected";} ?> >RF</option>
							</select>
							<div class="invalid-feedback">Harap pilih salah satu!</div>
						</div>
						
					</div>
					<div class="card-footer">
						<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
				  		<button type="submit" class="btn btn-primary">Submit</button>
				  		<a href="<?php echo site_url('container'); ?>" class="btn btn-danger">Batal</a>
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