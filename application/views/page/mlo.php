	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">MLO</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('mlo'); ?>" onclick="return false;">MLO</a></li>  
    						<li class="breadcrumb-item">Table Data MLO</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	
  			<table class="table table-hover caption-top" id="myTableMlo">
  				<caption class="fs-5">
  					<a href="#formAddMLO" class="btn btn-md btn-success" data-bs-toggle="modal">
  						<i class="bi bi-person-add"></i> Tambah Data 
  					</a>
  				</caption>
    			<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">No</th>
	      				<th>Nama</th>
	      				<th>Alamat</th>
	      				<th>Telp</th>
	      				<th width="50">#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">no</th>
	      				<th>Nama</th>
	      				<th>Alamat</th>
	      				<th>Telp</th>
	      				<th width="50">#</th>
	      			</tr>
    			</tfoot>
  			</table>
		

		<!-- Modal -->
		<!-- form add MLO -->
		<div class="modal fade" id="formAddMLO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('mlo/add_mlo'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah MLO</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">Nama*</label>
								<input type="text" class="form-control" id="validate01" placeholder="Nama" name="nama" autofocus required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Alamat*</label>
								<textarea name="alamat" class="form-control" id="validate02"></textarea>
								<!-- <input type="text" class="form-control" id="validate02" placeholder="Username" name="username" required> -->
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Telp*</label>
								<input type="number" class="form-control" id="validate03" placeholder="" name="telp">
								<div class="invalid-feedback">Harap isi email dengan format yang benar!</div>

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
		<div class="modal fade" id="formEditMLO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('mlo/update_mlo'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit MLO</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">Nama*</label>
								<input type="hidden" class="id" name="id" id="id">
								<input type="text" class="form-control nama" id="nama" name="nama" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Alamat*</label>
								<!-- <input type="text" class="form-control" id="alamat" name="alamat"> -->
								<textarea name="alamat" class="form-control alamat" id="alamat"></textarea>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Telp*</label>
								<input type="number" class="form-control telp" id="telp" name="telp">
								<div class="invalid-feedback">Harap Diisi!</div>

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
