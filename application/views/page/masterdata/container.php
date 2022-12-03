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
  			<table class="table table-hover table-sm" id="myTableContainer">
  				<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
						<th width="10">No.</th>
	      				<th>MLO</th>
	      				<th>No Container</th>
	      				<th>Size</th>
	      				<th>Tipe</th>
	      				<!-- <th>Kode</th> -->
	      				<th class="text-center" width="70">#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
						<th width="10">No.</th>
	      				<th>MLO</th>
	      				<th>No Container</th>
	      				<th>Size</th>
	      				<th>Tipe</th>
	      				<!-- <th>Kode</th> -->
	      				<th class="text-center" width="70">#</th>
	      			</tr>
    			</tfoot>
  			</table>
  		</div>
    </main>
