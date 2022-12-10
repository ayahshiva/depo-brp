
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Update Payment</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('payment_out'); ?>" >Payment Out</a></li>  
    						<li class="breadcrumb-item">Form Update Payment</li>
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
      		<form class="needs-validation" method="post" action="<?php echo site_url('payment_out/simpan_update_payment_out'); ?>" novalidate>
				<div class="card">
					<div class="card-header">
						<div class="card-title fs-6">Form Update Payment</div>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label">Tanggal*</label>
							<input type="hidden" name="id_payment" value="<?php echo $this->uri->segment(3); ?>">
							<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
							<div class="invalid-feedback">Harap pilih tanggal!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Invoice*</label>
							<input type="text" class="form-control" placeholder="Invoice" name="invoice" required>
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
</main>

<script>
	$(document).ready(function() {
    	$('.select2').select2();
	});

	$(document).ready(function(){
	    $('#no_voyage').change(function(){
	      var id=$(this).val();
	      $.ajax({
	        url : "<?php echo site_url() . 'payment_in/get_vessel'; ?>",
	        method : "POST",
	        data : {id: id},
	        async : false,
	            dataType : 'json',
		        success: function(data){
		          var html = '<option selected></option>';
		                var i;
		                for(i=0; i<data.length; i++){
		                    html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
		                }
		                $('#id_vessel').html(html);
		                //$('#id_mlo').html('<option selected></option>');
		        }
	      	});
	    });
	});

	$(document).ready(function(){
	    $('#no_voyage').change(function(){
	      var id=$(this).val();
	      $.ajax({
	        url : "<?php echo site_url() . 'payment_in/get_mlo'; ?>",
	        method : "POST",
	        data : {id: id},
	        async : false,
	            dataType : 'json',
		        success: function(data){
		          var html = '<option selected></option>';
		                var i;
		                for(i=0; i<data.length; i++){
		                    html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
		                }
		                $('#id_mlo').html(html);
		                //$('#id_mlo').html('<option selected></option>');
		        }
	      	});
	    });
	});
	
</script>
