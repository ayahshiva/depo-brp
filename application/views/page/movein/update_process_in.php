	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Process In</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('process_in'); ?>" onclick="return false;">Process In</a></li>  
    						<li class="breadcrumb-item">Update Process In</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

		<!-- form add user -->
		<div class="row" >
		  	<div class="container-fluid">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('process_in/simpan_update_container'); ?>" novalidate>
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
								<input type="hidden" class="form-control" id="validate01" name="id_detil_in" value="<?php echo $update->id_detil_in; ?>">
								<input type="hidden" class="form-control" id="validate01" name="id_container" value="<?php echo $update->id_container; ?>">
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Date In*</label>
								<input type="date" name="date_in" class="form-control" value="<?php echo $update->date_in; ?>" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Time In*</label>
								<input type="time" name="time_in" class="form-control" value="<?php echo $update->time_in; ?>" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Nopol Truck*</label>
								<input type="text" name="truck_in" class="form-control" value="<?php echo $update->truck_in; ?>" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Kondisi*</label>
								<select name="kondisi" class="form-control select2" required>
                                    <option value="">Pilih Kondisi</option>
                                    <option value="-"<?php if($update->kondisi == '-'){echo "selected";} ?>>-</option>
                                    <option value="AV" <?php if($update->kondisi == 'AV'){echo "selected";} ?>>AV</option>
                                    <option value="DMG"<?php if($update->kondisi == 'DMG'){echo "selected";} ?>>DMG</option>
                                </select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Grade*</label>
								<select name="grade" class="form-control select2" required>
									<option value="">Pilih Grade</option>
                                    <option value="-" <?php if($update->grade == '-'){echo "selected";} ?>>-</option>
                                    <option value="A" <?php if($update->grade == 'A'){echo "selected";} ?>>A</option>
                                    <option value="B" <?php if($update->grade == 'B'){echo "selected";} ?>>B</option>
                                    <option value="C" <?php if($update->grade == 'C'){echo "selected";} ?>>C</option>
                                    <option value="D" <?php if($update->grade == 'D'){echo "selected";} ?>>D</option>
                                    <option value="E" <?php if($update->grade == 'E'){echo "selected";} ?>>E</option>
                                </select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Cleaning*</label>
								<select name="cleaning" class="form-control select2" required>
									<option value="">Pilih Cleaning</option>
                                    <option value="-" <?php if($update->cleaning == '-'){echo "selected";} ?>>-</option>
                                    <option value="Sweeping" <?php if($update->cleaning == 'Sweeping'){echo "selected";} ?>>Sweeping</option>
                                    <option value="Water Wash" <?php if($update->cleaning == 'Water Wash'){echo "selected";} ?>>Water Wash</option>
                                    <option value="Detergent Wash" <?php if($update->cleaning == 'Detergent Wash'){echo "selected";} ?>>Detergent Wash</option>
                                    <option value="Chemical Wash" <?php if($update->cleaning == 'Chemical Wash'){echo "selected";} ?>>Chemical Wash</option>
                                </select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
							</div>
							
			      		</div>
			      		<div class="card-footer">
			        		<button type="submit" class="btn btn-primary">Simpan</button>
			        		<a href="<?php echo site_url('process_in'); ?>" type="button" class="btn btn-danger">Batal</a>
			      		</div>
			    	</div>
		    	</form>
		  	</div>
		</div>
	</main>