	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Process In</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('process_in'); ?>" onclick="return false;">Process In</a></li>  
    						<li class="breadcrumb-item">Table Data Process In</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
			<table class="table table-hover tabel-striped" id="ProcessInTable">
		  		<thead>
		    		<tr class="bg-primary bg-opacity-75 text-white">
			      		<th>No Container</th>
			      		<th>MLO</th>
			      		<th>Time In</th>	
			      		<th>Date In</th>
			      		<th>Truck No</th>
			      		<th>Kode</th>
			      		<th>Status</th>
			      		<th width="5%" class="text-center">#</th>
			      	</tr>
		    	</thead>
		    			
		    	<tfoot>
		    		<tr class="bg-primary bg-opacity-75 text-white">
			      		<th>No Container</th>
			      		<th>MLO</th>
			      		<th>Time In</th>	
			      		<th>Date In</th>
			      		<th>Truck No</th>
			      		<th>Kode</th>
			      		<th>Status</th>
			      		<th width="5%" class="text-center">#</th>
			      	</tr>
		    	</tfoot>
		  	</table>
		</div>
    </main>

    	<!-- Modal -->
		<!-- form add user -->
		<div class="modal fade" id="formUpdateContainer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-scrollable">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('process_in/update_container'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Update Container</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">No Container*</label>
								<input type="text" class="form-control no_cont" id="validate01" name="no_cont" disabled>
								<input type="hidden" class="form-control id_cont" id="validate01" name="id_container">
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Date In*</label>
								<input type="date" name="date_in" class="form-control" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Time In*</label>
								<input type="time" name="time_in" class="form-control" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Nopol Truck*</label>
								<input type="text" name="truck_in" class="form-control" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Kondisi*</label>
								<select name="kondisi" class="form-control select2" required>
                                    <option value="">Pilih Kondisi</option>
                                    <option value="-">-</option>
                                    <option value="AV">AV</option>
                                    <option value="DMG">DMG</option>
                                </select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Grade*</label>
								<select name="grade" class="form-control select2" required>
									<option value="">Pilih Grade</option>
                                    <option value="-">-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Cleaning*</label>
								<select name="cleaning" class="form-control select2" required>
									<option value="">Pilih Cleaning</option>
                                    <option value="-">-</option>
                                    <option value="Sweeping">Sweeping</option>
                                    <option value="Water Wash">Water Wash</option>
                                    <option value="Detergent Wash">Detergent Wash</option>
                                    <option value="Chemical Wash">Chemical Wash</option>
                                </select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
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

    <script>

    	 $(function () {
          $('#formUpdateContainer').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id_cont = button.data('id_cont'); // Extract info from data-* attributes
            var no_cont = button.data('no_cont'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.id_cont').val(id_cont);
            modal.find('.no_cont').val(no_cont);
          });
        });

        $(document).ready(function() {
        //setting datatables
	        $('#ProcessInTable').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "order": [],
	            "ajax": {
	                //panggil method ajax list dengan ajax
	                "url": 'process_in/get_process_in',
	                "type": "POST"
	            },
	            "columnDefs":[
	            	{"orderable": false, "targets": [7]}
	            ]
	        });
	    });


    </script>