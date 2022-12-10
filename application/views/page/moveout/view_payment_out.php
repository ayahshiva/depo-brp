	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">View Payment Out</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          	<div class="btn-group me-2">
          		<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('payment_out'); ?>" >Payment Out</a></li>  
    						<li class="breadcrumb-item">View Detail Payment Out</li>
  						</ol>
					</nav>            
          	</div>
        	</div>
      </div>

      	<!-- Content -->
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-sm-4">
	      		<div class="card h-100 border-primary">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $view->nama_emkl; ?></h5>
					   </div>
					   <div class="card-footer bg-primary">
					      <small class="text-white fs-6">EMKL</small>
					   </div>
					</div>
				</div>
				<div class="col-sm-4">
	      		<div class="card h-100 border-success">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $view->do_number; ?></h5>
					   </div>
					   <div class="card-footer bg-success">
					      <small class="text-white fs-6">DO Number</small>
					   </div>
					</div>
				</div>
				<div class="col-sm-4">
	      		<div class="card h-100 border-info">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $view->no_voyage; ?></h5>
					   </div>
					   <div class="card-footer bg-info">
					      <small class="text-white fs-6">No Voyage</small>
					   </div>
					</div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-sm-4">
	      		<div class="card h-100 border-warning">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $view->metode; ?></h5>
					   </div>
					   <div class="card-footer bg-warning">
					      <small class="text-white fs-6">Payment</small>
					   </div>
					</div>
				</div>
				<div class="col-sm-4">
	      		<div class="card h-100 border-danger">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo date('d-m-Y', strtotime($view->tanggal_payment)); ?></h5>
					   </div>
					   <div class="card-footer bg-danger">
					      <small class="text-white fs-6">Tanggal</small>
					   </div>
					</div>
				</div>
				<div class="col-sm-4">
	      		<div class="card h-100 border-secondary">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $jumlah_real; ?></h5>
					   </div>
					   <div class="card-footer bg-secondary">
					      <small class="text-white fs-6">Jumlah</small>
					   </div>
					</div>
				</div>
      	</div>
      	<hr />
      	<div class="row">
	      	<div class="table-responsive-sm table-responsive-md">
	      		<table class="table table-hover tabel-striped caption-top display" id="example">
	      			<caption class="fs-5">
			  				<a href="<?php echo site_url('payment_out'); ?>" class="btn btn-md btn-success">
			  					<i class="bi bi-arrow-left-circle"></i> Kembali
			  				</a>
			  				<a href='<?php echo site_url() ?>payment_in/add_container_payment_in/<?php echo $this->uri->segment(3); ?>' class='btn btn-warning' title='Tambah Container'><i class='bi bi-clipboard-plus'></i></a>
			  				<!-- <a href='<?php echo site_url(); ?>payment_in/delete_container/<?php echo $this->uri->segment(3); ?>' class='btn btn-danger' title='Hapus Container'><i class='bi bi-clipboard-minus'></i></a> -->
		  				</caption>
	      			<thead>
		      			<tr class="bg-primary bg-opacity-75 text-white">
			      			<th>No Container</th>
			      			<th>Size</th>
			      			<th>Tipe</th>
			      			<th>Status</th>
			      		</tr>
		      		</thead>
		      		<tbody>
			      		<?php foreach ($container as $key => $value) { ?>
			      			<tr>
			      				<td><?php echo $value->no_cont; ?></td>
			      				<td><?php echo $value->size; ?></td>
			      				<td><?php echo $value->tipe; ?></td>
			      				<td><?php echo $value->st_cont; ?></td>
			      			</tr>
		      			<?php } ?>
		      		</tbody>
	      		</table>
	      	</div>
	      </div>
      </div>	
      <hr />
   </main>

   <script>
   	$(document).ready(function () {
            $('#example').DataTable();
        });
   </script>