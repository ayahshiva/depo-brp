	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Container</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('container'); ?>" onclick="return false;">Container</a></li>  
    						<li class="breadcrumb-item">Table Data Container</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-striped text-nowrap caption-top" id="myTableContainer">
  				<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
						<th width="5%">No.</th>
	      				<th>MLO</th>
	      				<th>No Container</th>
	      				<th>Size</th>
	      				<th>Tipe</th>
	      				<th>Status</th>
	      				<th>#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
						<th width="5%">No.</th>
	      				<th>MLO</th>
	      				<th>No Container</th>
	      				<th>Size</th>
	      				<th>Tipe</th>
	      				<th>Status</th>
	      				<th>#</th>
	      			</tr>
    			</tfoot>
  			</table>
  		</div>
    </main>
    <script>
        $(document).ready(function() {
        //setting datatables
	        $('#myTableContainer').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "order": [],
	            "ajax": {
	                //panggil method ajax list dengan ajax
	                "url": 'container/get_container',
	                "type": "POST"
	            },
	            "columnDefs":[
	            	{"orderable": false, "targets": [0,5,6]}
	            ]
	        });
	    });
    </script>