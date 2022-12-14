	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Payment In</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('payment_in'); ?>" onclick="return false;">Payment In</a></li>  
    						<li class="breadcrumb-item">Table Data Payment In</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-striped text-nowrap caption-top" id="PaymentInTable">
  				<caption class="fs-5">
  					<a href="<?php echo site_url('payment_in/tambah_payment_in'); ?>" class="btn btn-md btn-success">
  						<i class="bi bi-person-add"></i> Tambah Data 
  					</a>
  				</caption>
    			<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
    					<th>No.</th>
	      				<th>Do Number</th>
	      				<th>Invoice</th>
	      				<th>EMKL</th>	
	      				<th>Vessel</th>
	      				<th>No Voyage</th>
	      				<th>Payment</th>
	      				<th>Kode</th>
	      				<th width="12%" class="text-center">#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
    					<th>No.</th>
	      				<th>Do Number</th>
	      				<th>Invoice</th>
	      				<th>EMKL</th>	
	      				<th>Vessel</th>
	      				<th>No Voyage</th>
	      				<th>Payment</th>
	      				<th>Kode</th>
	      				<th width="12%" class="text-center">#</th>
	      			</tr>
    			</tfoot>
  			</table>
		</div>

		<hr />
    </main>

    <script>
        $(document).ready(function() {
        //setting datatables
	        $('#PaymentInTable').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "order": [],
	            "ajax": {
	                //panggil method ajax list dengan ajax
	                "url": 'payment_in/get_payment_in',
	                "type": "POST"
	            },
	            "columnDefs":[
	            	{"orderable": false, "targets": [0,8]}
	            ]
	        });
	    });
    </script>