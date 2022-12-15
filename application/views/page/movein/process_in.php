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
			<table class="table table-striped text-nowrap caption-top" id="ProcessInTable">
		  		<thead>
		    		<tr class="bg-primary bg-opacity-75 text-white">
		    				<th>No.</th>
			      		<th>No Container</th>
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
		    				<th>No.</th>
			      		<th>No Container</th>
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

    <script>

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
	            	{"orderable": false, "targets": [0, 7]}
	            ]
	        });
	    });


    </script>