	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">List Out</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('list_out'); ?>" onclick="return false;">List Out</a></li>  
    						<li class="breadcrumb-item">Table Data List Out</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-hover tabel-striped caption-top" id="ListOutTable">
  				<caption class="fs-5">
  					<a href="#formAddListOut" class="btn btn-md btn-success" data-bs-toggle="modal">
  						<i class="bi bi-person-add"></i> Tambah Data 
  					</a>
  				</caption>
    			<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				
	      				<th>Tanggal</th>
	      				<th>EMKL</th>	
	      				<th>Vessel</th>
	      				<th>No Voyage</th>
	      				<th>Jumlah</th>
	      				<th width="15%" class="text-center">#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				
	      				<th>Tanggal</th>
	      				<th>EMKL</th>	
	      				<th>Vessel</th>
	      				<th>No Voyage</th>
	      				<th>Jumlah</th>
	      				<th width="15%" class="text-center">#</th>
	      			</tr>
    			</tfoot>
  			</table>
		</div>

		<!-- Modal -->
		<!-- form Add List Out -->
		<div class="modal fade" id="formAddListOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('list_out/add_list_out'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah List Out</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">EMKL*</label>
								<select class="form-control form-select select2" style="width: 100%" name="id_emkl" required>
									<option selected disabled value="">Pilih EMKL</option>
									<?php foreach ($emkl as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">Harap pilih EMKL!</div>
							</div>

							<div class="mb-3">
								<label class="form-label">Vessel*</label>
								<select class="form-select form-control select3"style="width: 100%;" name="id_vessel" required>
									<option selected disabled value="">Pilih Vessel</option>
									<?php foreach ($vessel as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">Harap pilih Vessel!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">No. Voyage*</label>
								<input type="text" name="no_voyage" class="form-control" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Jumlah*</label>
								<input type="number" name="jumlah" class="form-control" min="1" required>
								<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			        		<button type="submit" class="btn btn-primary">Simpan</button>
			      		</div>
			    	</div>
		    	</form>
		  	</div>
		</div>

		<!-- form Edit List Out -->
		<div class="modal fade" id="formEditListOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('list_out/update_list_out'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit List Out</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">MLO*</label>
								<select class="form-control form-select select4" id="id_emkl"  style="width: 100%" name="id_emkl" required>
									<option selected disabled value="">Pilih EMKL</option>
									<?php foreach ($emkl as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">Harap pilih EMKL!</div>
							</div>

							<div class="mb-3">
								<label class="form-label">Vessel*</label>
								<select class="form-select form-control select5" id="id_vessel" style="width: 100%;" name="id_vessel" required>
									<option selected disabled value="">Pilih Vessel</option>
									<?php foreach ($vessel as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">Harap pilih Vessel!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">No. Voyage*</label>
								<input type="text" name="no_voyage" class="form-control no_voyage" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Jumlah*</label>
								<input type="number" name="jumlah" class="form-control jumlah" min="1" required>
								<input type="hidden" name="id" class="id">
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			        		<button type="submit" class="btn btn-primary">Simpan</button>
			      		</div>
			    	</div>
		    	</form>
		  	</div>
		</div>
		<hr />
    </main>

	<script type="text/javascript">
		$(document).ready(function() {
        //setting datatables
	        $('#ListOutTable').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "order": [],
	            "ajax": {
	                //panggil method ajax list dengan ajax
	                "url": 'list_out/get_list_out',
	                "type": "POST"
	            },
	            "columnDefs":[
	            	{"orderable": false, "targets": [5]}
	            ]
	        });
	    });

			$('.select2').select2({
	        dropdownParent: $('#formAddListOut')
	    });
	    $('.select3').select2({
	        dropdownParent: $('#formAddListOut')
	    });

	    $('.select4').select2({
	        dropdownParent: $('#formEditListOut')
	    });
	    $('.select5').select2({
	        dropdownParent: $('#formEditListOut')
	    });

	     $(function () {
          $('#formEditListOut').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var id_emkl = button.data('id_emkl'); // Extract info from data-* attributes
            var id_vessel = button.data('id_vessel');
            var no_voyage = button.data('no_voyage');
            var jumlah = button.data('jumlah');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.id').val(id);
            modal.find('#id_emkl').val(id_emkl);
            modal.find('#id_vessel').val(id_vessel);
            modal.find('.no_voyage').val(no_voyage);
            modal.find('.jumlah').val(jumlah);
          });
        });
    </script>

    
    
    
