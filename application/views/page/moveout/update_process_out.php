	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Process Out</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('process_in'); ?>" onclick="return false;">Process Out</a></li>  
    						<li class="breadcrumb-item">Update Process Out</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

		<!-- form add user -->
		<div class="row" >
		  	<div class="container-fluid">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('process_out/simpan_update_container'); ?>" novalidate>
			    	<div class="card col-md-6">
			      		<div class="card-header">
			      			<div class="card-title fs-5">
			        			<h1 class="modal-title fs-5" id="exampleModalLabel">Form Update Container</h1>
			        		</div>
			      		</div>
			      		<div class="card-body">
			        		<div class="mb-3">
								<label class="form-label">No Container*</label>
								<input type="text" class="form-control" id="validate01" name="no_cont" value="<?php echo $update->no_container; ?>" disabled>
								<input type="hidden" class="form-control" id="validate01" name="id_detil_out" value="<?php echo $update->id_detil_out; ?>">
								<input type="hidden" name="id_container" value="<?php echo $update->id_container; ?>">
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Date Out*</label>
								<input type="date" name="date_out" class="form-control" value="<?php echo $update->date_out; ?>" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Time Out*</label>
								<input type="time" name="time_out" class="form-control" value="<?php echo $update->time_out; ?>" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Nopol Truck*</label>
								<input type="text" name="truck_out" class="form-control" value="<?php echo $update->truck_out; ?>" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
			      		</div>
			      		<div class="card-footer">
			        		<button type="submit" class="btn btn-primary">Simpan</button>
			        		<a href="<?php echo site_url('process_out'); ?>" type="button" class="btn btn-danger">Batal</a>
			      		</div>
			    	</div>
		    	</form>
		  	</div>
		</div>
	</main>