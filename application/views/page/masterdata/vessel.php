	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Vessel</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('mlo'); ?>" onclick="return false;">Vessel</a></li>  
    						<li class="breadcrumb-item">Table Data Vessel</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-striped text-nowrap caption-top" id="myTableVessel">
  				<caption class="fs-5">
  					<a href="#formAddVessel" class="btn btn-md btn-success" data-bs-toggle="modal">
  						<i class="bi bi-person-add"></i> Tambah Data 
  					</a>
  				</caption>
    			<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">No</th>
	      				<th>Nama</th>
	      				<th width="70">#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">No</th>
	      				<th>Nama</th>
	      				<th width="70">#</th>
	      			</tr>
    			</tfoot>
  			</table>
		</div>

		<!-- Modal -->
		<!-- form add MLO -->
		<div class="modal fade" id="formAddVessel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('vessel/add_vessel'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Vessel</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">Nama*</label>
								<input type="text" class="form-control" id="validate01" placeholder="Nama" name="nama" autofocus required>
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

		<!-- form edit MLO -->
		<div class="modal fade" id="formEditVessel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('vessel/update_vessel'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Vessel</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">Nama*</label>
								<input type="hidden" class="id" name="id" id="id">
								<input type="text" class="form-control nama" id="nama" name="nama" required>
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
    </main>
