	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">List In</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('mlo'); ?>" onclick="return false;">List In</a></li>  
    						<li class="breadcrumb-item">Table Data List In</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-hover tabel-striped caption-top" id="myTableListIn">
  				<caption class="fs-5">
  					<a href="#formAddListIn" class="btn btn-md btn-success" data-bs-toggle="modal">
  						<i class="bi bi-person-add"></i> Tambah Data 
  					</a>
  				</caption>
    			<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">No</th>
	      				<th>Tanggal</th>
	      				<th>MLO</th>	
	      				<th>Vessel</th>
	      				<th>No Voyage</th>
	      				<th>Jumlah</th>
	      				<th width="15%" class="text-center">#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">No</th>
	      				<th>Tanggal</th>
	      				<th>MLO</th>	
	      				<th>Vessel</th>
	      				<th>No Voyage</th>
	      				<th>Jumlah</th>
	      				<th width="15%" class="text-center">#</th>
	      			</tr>
    			</tfoot>
  			</table>
		</div>

		<!-- Modal -->
		<!-- form add List In -->
		<div class="modal fade" id="formAddListIn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('list_in/add_list_in'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah List In</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">MLO*</label>
								<select class="form-control form-select" id="select2" style="width: 100%" name="id_mlo" required>
									<option selected disabled value="">Pilih MLO</option>
									<?php foreach ($mlo as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
							</div>

							<div class="mb-3">
								<label class="form-label">Vessel*</label>
								<select class="form-select form-control" id="select3" style="width: 100%;" name="id_vessel" required>
									<option selected disabled value="">Pilih Vessel</option>
									<?php foreach ($vessel as $key => $value) { ?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">Harap pilih salah satu!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">No. Voyage*</label>
								<input type="text" name="no_voyage" class="form-control" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Jumlah*</label>
								<input type="number" name="jumlah" class="form-control" min="1" required>
								<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
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
		<hr />
    </main>

	<script type="text/javascript">
		$('#select2').select2({
	        dropdownParent: $('#formAddListIn')
	    });
	    $('#select3').select2({
	        dropdownParent: $('#formAddListIn')
	    });
    </script>

    
    
    
