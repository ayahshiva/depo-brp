
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Form Edit Payment Out</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('payment_out'); ?>" >Payment Out</a></li>  
    						<li class="breadcrumb-item">Form Edit Payment Out</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

     	<?php if($this->session->flashdata('besar') != ''){ ?>
	      	<div class="alert alert-danger">
				<strong>Error!</strong> <br /><?php echo $this->session->flashdata('besar'); ?>
			</div>
		<?php } ?>
      	
      	<!-- Content -->
	    <div class="container-fluid">
	    	<div class="row">
	    		<div class="col-md-6">
	    			<form class="needs-validation" method="post" action="<?php echo site_url('payment_out/simpan_edit_payment_out'); ?>" novalidate>
		    			<div class="card">
		    				<div class="card-header">
		    					<div class="card-title fs-5">Form Edit Payment Out</div>
		    				</div>
		    				<div class="card-body">
		    					<div class="mb-3">
								<label class="form-label">EMKL*</label>
								<select class="form-control form-select select2" name="id_emkl" required>
									<option selected disabled value="">Pilih EMKL</option>
										<?php foreach ($emkl as $key => $value) { ?>
											<option value="<?php echo $value->id; ?>" <?php if($edit->id_emkl == $value->id){echo "selected";} ?> >
												<?php echo $value->nama; ?>
											</option>
										<?php } ?>
								</select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
								</div>

								<div class="mb-3">
									<label class="form-label">No Voyage*</label>
									<select class="form-control select2" name="no_voyage" id="no_voyage" required>
										<option selected disabled value="">Pilih No Voyage</option>
										<?php foreach ($voyage as $key => $value) { ?>
											<option value="<?php echo $value->no_voyage; ?>" <?php if($edit->no_voyage == $value->no_voyage){echo "selected";} ?> >
												<?php echo $value->no_voyage; ?>
											</option>
										<?php } ?>
									</select>
									<div class="invalid-feedback">Harap pilih salah satu!</div>
								</div>
								<div class="mb-3">
									<label class="form-label">Vessel*</label>
									<select class="form-control select2" id="id_vessel" name="id_vessel" required>
		                        		<option selected disabled value="">Pilih Vessel</option>
		                        		<?php foreach ($vessel as $key => $value) { ?>
		                        			<option value="<?php echo $value->id; ?>" <?php if($edit->id_vessel == $value->id){echo "selected";} ?> ><?php echo $value->nama; ?></option>
		                        		
		                        		<?php } ?>
		 							</select>
									<div class="invalid-feedback">Harap diisi!</div>
								</div>
								<div class="mb-3">
									<label class="form-label">DO Number*</label>
									<input type="text" name="do_number" class="form-control" value="<?php echo $edit->do_number; ?>" required>
									<div class="invalid-feedback">Harap diisi!</div>
								</div>
								<div class="mb-3">
									<label class="form-label">Jumlah*</label>
									<input type="number" name="jumlah" class="form-control" value="<?php echo $edit->jumlah; ?>" min="1" required>
									<div class="invalid-feedback">Harap diisi!</div>
								</div>
		    				</div>
		    				<div class="card-footer">
		    					<input type="hidden" name="id_payment" value="<?php echo $this->uri->segment(3); ?>">
						  		<button type="submit" class="btn btn-primary">Submit</button>
						  		<a href="<?php echo site_url('payment_out'); ?>" class="btn btn-danger">Batal</a>
		    				</div>
		    			</div>
		    		</form>
	    		</div>
	      		<div class="col-md-6">
	      			<form class="needs-validation" method="post" action="<?php echo site_url('payment_out/simpan_update_payment_out'); ?>" novalidate>
	      				<div class="card">
	      					<div class="card-header">
	      						<div class="card-title fs-5">Form Edit Metode Pembayaran</div>
	      					</div>
	      					<div class="card-body">
	      						<div class="mb-3">
									<label class="form-label">Tanggal*</label>
									<input type="hidden" name="id_payment" value="<?php echo $this->uri->segment(3); ?>">
									<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d', strtotime($get_payment->tanggal_payment)); ?>" required>
									<div class="invalid-feedback">Harap diisi!</div>
								</div>
								<div class="mb-3">
									<label class="form-label">Invoice*</label>
									<input type="text" class="form-control" name="invoice" value="<?php echo $get_payment->invoice; ?>" required>
									<div class="invalid-feedback">Harap diisi!</div>
								</div>
								<div class="mb-3">
									<label class="form-label">Payment Method*</label>
									<select class="form-control select2" name="metode" required>
							            <option selected disabled value="">Pilih Metode Bayar</option>
										<option value="Transfer Mandiri"<?php if($get_payment->metode == 'Transfer Mandiri'){echo "selected";} ?>> Transfer Mandiri </option>
		                                <option value="Transfer CIMB"<?php if($get_payment->metode == 'Transfer CIMB'){echo "selected";} ?>> Transfer CIMB </option>
		                                <option value="Transfer BNI"<?php if($get_payment->metode == 'Transfer BNI'){echo "selected";} ?>> Transfer BNI </option>
		                                <option value="Cash"<?php if($get_payment->metode == 'Cash'){echo "selected";} ?>> Cash </option>
		                                <option value="EDC"<?php if($get_payment->metode == 'EDC'){echo "selected";} ?>> EDC </option>
		                                <option value="ADV-FOC"<?php if($get_payment->metode == 'ADV-FOC'){echo "selected";} ?>> ADV-FOC </option>
		                                <option value="EMS-FOC"<?php if($get_payment->metode == 'EMS-FOC'){echo "selected";} ?>> EMS-FOC </option>
		                                <option value="BRP-FOC"<?php if($get_payment->metode == 'BRP-FOC'){echo "selected";} ?>> BRP-FOC </option>
		                                <option value="SAL-FOC"<?php if($get_payment->metode == 'SAL-FOC'){echo "selected";} ?>> SAL-FOC </option>
							        </select>
							        <div class="invalid-feedback">Harap pilih salah satu!</div>
								</div>
	      					</div>
	      					<div class="card-footer">
	      						<button type="submit" class="btn btn-primary">Submit</button>
				  				<a href="<?php echo site_url('payment_out'); ?>" class="btn btn-danger">Batal</a>
	      					</div>
	      				</div>
	      			</form>
	    		</div>
			</div>
	   	</div>	
	</main>

<script>
	$(document).ready(function() {
    	$('.select2').select2();
	});
	
</script>
