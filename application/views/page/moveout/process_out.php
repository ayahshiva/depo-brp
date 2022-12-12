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
		    				<th width="5">No.</th>
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
		    				<th width="5">No.</th>
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

    <script>
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
	            	{"orderable": false, "targets": [0,7]}
	            ]
	        });
	    });


    </script>