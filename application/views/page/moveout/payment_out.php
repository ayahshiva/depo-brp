	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Payment Out</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('payment_out'); ?>" onclick="return false;">Payment Out</a></li>  
    						<li class="breadcrumb-item">Table Data Payment Out</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-hover tabel-striped caption-top" id="PaymentOutTable">
  				<caption class="fs-5">
  					<a href="<?php echo site_url('payment_out/tambah_payment_out'); ?>" class="btn btn-md btn-success">
  						<i class="bi bi-person-add"></i> Tambah Data 
  					</a>
  				</caption>
    			<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
    					<th>No</th>
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
    					<th>No</th>
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
	        $('#PaymentOutTable').DataTable({
	            "processing": true,
	            "serverSide": true,
	            "order": [],
	            "ajax": {
	                //panggil method ajax list dengan ajax
	                "url": 'payment_out/get_payment_out',
	                "type": "POST"
	            },
	            "columnDefs":[
	            	{"orderable": false, "targets": [7]}
	            ]
	        });
	    });
    </script>