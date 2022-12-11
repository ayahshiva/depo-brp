	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Process Out</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('process_out'); ?>" onclick="return false;">Process Out</a></li>  
    						<li class="breadcrumb-item">Table Data Process Out</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
			<table class="table table-hover tabel-striped" id="ProcessOutTable">
		  		<thead>
		    		<tr class="bg-primary bg-opacity-75 text-white">
			      		<th>No Container</th>
			      		<th>Date In</th>	
			      		<th>Time In</th>
			      		<th>Truck No</th>
			      		<th>Kode</th>
			      		<th>Status</th>
			      		<th width="5%" class="text-center">#</th>
			      	</tr>
		    	</thead>
		    			
		    	<tfoot>
		    		<tr class="bg-primary bg-opacity-75 text-white">
			      		<th>No Container</th>
			      		<th>Date In</th>	
			      		<th>Time In</th>
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
		  		<form class="needs-validation" method="post" action="<?php echo site_url('process_out/update_container'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Update Container</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">No Container*</label>
								<input type="text" class="form-control no_container" id="validate01" name="no_container" disabled>
								<input type="hidden" class="form-control id_container" id="validate01" name="id_container">
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Date In*</label>
								<input type="date" name="date_out" class="form-control" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Time In*</label>
								<input type="time" name="time_out" class="form-control" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Nopol Truck*</label>
								<input type="text" name="truck_out" class="form-control" required>
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

    <script>

    	 $(function () {
          $('#formUpdateContainer').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id_container = button.data('id_container'); // Extract info from data-* attributes
            var no_container = button.data('no_container'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.id_container').val(id_container);
            modal.find('.no_container').val(no_container);
          });
        });

        $(document).ready(function() {
        //setting datatables
	        $('#ProcessOutTable').DataTable({
	            'processing': true,
	            'serverSide': true,
	            'ordering': true ,
	            'order': [[0, 'asc']],
	            'deferRender': true,
	            'aLengthMenu': [[10, 25, 50, 100], [10, 25, 50, 100]],
	            'ajax': {
	                //panggil method ajax list dengan ajax
	                "url": 'process_out/get_process_out',
	                "type": "POST"
	            },
	            'columnDefs':[
	            	{"orderable": false, "targets": [6]}
	            ]
	        });
	    });


    </script>