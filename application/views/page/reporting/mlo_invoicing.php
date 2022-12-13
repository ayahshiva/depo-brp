	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Reporting</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?php echo  site_url('reporting'); ?>" onclick="return false;">Reporting</a></li>    	
    						<li class="breadcrumb-item">Reporting MLO Invoicing</li> 
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>
      	<div class="row">
      		<div class="container-fluid">
      			<form class="needs-validation" method="post" action="<?php echo site_url('reporting/get_mlo_invoicing'); ?>" target="_blank" novalidate >
	      			<div class="card">
	      				<div class="card-header">
	      					<div class="card-title fs6">Form Laporan MV-In</div>
	      				</div>
	      				<div class="card-body">
	      					<div class="mb-3">
	      						<label class="form-label">Tanggal Awal*</label>
	      						<div class="col-sm-6">
	      							<input type="date" name="tanggal_awal" class="form-control" required>
	      							<div class="invalid-feedback">Harap tentukan tanggal awal!</div>
	      						</div>
	      					</div>
	      					<div class="mb-3">
	      						<label class="form-label">Tanggal Akhir*</label>
	      						<div class="col-sm-6">
	      							<input type="date" name="tanggal_akhir" class="form-control" required>
	      							<div class="invalid-feedback">Harap tentukan tanggal akhir!</div>
	      						</div>
	      					</div>
	      					<div class="mb-3">
	      						<label class="form-label">MLO*</label>
	      						<div class="col-sm-6">
	      							<select class="form-control form-select" id="select2" style="width: 100%" name="id_mlo" required>
										<option selected disabled value="">Pilih MLO</option>
										<?php foreach ($mlo as $key => $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
										<?php } ?>
									</select>
									<div class="invalid-feedback">Harap pilih MLO!</div>
	      						</div>
	      					</div>
	      				</div>
	      				<div class="card-footer">
	      					<button type="submit" class="btn btn-warning" name="preview"><i class="bi bi-eye"></i> Preview</button>
			        		<button type="submit" class="btn btn-primary" name="save"><i class="bi bi-file-earmark-spreadsheet"></i> Save as Excel</button>
	      				</div>
	      			</div>
      			</form>
      		</div>
      	</div>
    </main>

    <script type="text/javascript">
    	$('#select2').select2({
	       
	    });
    </script>
