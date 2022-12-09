
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Tambah Payment In</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('payment_in'); ?>" >Payment In</a></li>  
    						<li class="breadcrumb-item">Form Tambah Payment In</li>
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
      		<form class="needs-validation" method="post" action="<?php echo site_url('payment_in/simpan_payment_in'); ?>" novalidate>
				<div class="card">
					<div class="card-header">
						<div class="card-title fs-5">Form Tambah Payment In</div>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label">EMKL*</label>
							<select class="form-control form-select select2" name="id_emkl" required>
								<option selected disabled value="">Pilih EMKL</option>
									<?php foreach ($emkl as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>">
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
									<option value="<?php echo $value->no_voyage; ?>">
										<?php echo $value->no_voyage; ?>
									</option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">Harap pilih salah satu!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Vessel*</label>
							<select class="form-control select2" id="id_vessel" name="id_vessel" required>
                        		<option>No Selected</option>
 							</select>
							<div class="invalid-feedback">Harap diisi!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">MLO*</label>
							<select class="form-control select2" id="id_mlo" name="id_mlo" required>
                        		<option>No Selected</option>
 							</select>
							<div class="invalid-feedback">Harap diisi!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">DO Number*</label>
							<input type="text" name="do_number" class="form-control" placeholder="D/O Number" required>
							<div class="invalid-feedback">Harap diisi!</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Jumlah*</label>
							<input type="number" name="jumlah" class="form-control" placeholder="Jumlah" min="1" required>
							<div class="invalid-feedback">Harap diisi!</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
				  		<a href="<?php echo site_url('payment_in'); ?>" class="btn btn-danger">Batal</a>
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
