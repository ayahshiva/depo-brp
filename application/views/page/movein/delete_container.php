	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">View List In</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          	<div class="btn-group me-2">
          		<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('list_in'); ?>" >List In</a></li>  
    						<li class="breadcrumb-item">View Detail List In</li>
  						</ol>
					</nav>            
          	</div>
        	</div>
      </div>

      	<!-- Content -->
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-sm-3">
	      		<div class="card h-100 border-primary">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $view->namamlo; ?></h5>
					   </div>
					   <div class="card-footer bg-primary">
					      <small class="text-white fs-6">MLO</small>
					   </div>
					</div>
				</div>
				<div class="col-sm-3">
	      		<div class="card h-100 border-success">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $view->namavessel; ?></h5>
					   </div>
					   <div class="card-footer bg-success">
					      <small class="text-white fs-6">Vessel</small>
					   </div>
					</div>
				</div>
				<div class="col-sm-3">
	      		<div class="card h-100 border-info">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $view->no_voyage; ?></h5>
					   </div>
					   <div class="card-footer bg-info">
					      <small class="text-white fs-6">No. Voyage</small>
					   </div>
					</div>
				</div>
				<div class="col-sm-3">
	      		<div class="card h-100 border-warning">		    
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $jumlah_real; ?></h5>
					   </div>
					   <div class="card-footer bg-warning">
					      <small class="text-white fs-6">Jumlah Container</small>
					   </div>
					</div>
				</div>
      	</div>
      	<hr />
      	<div class="row">
	      	<div class="table-responsive-sm table-responsive-md">
	      		<form method="post" action="<?php echo site_url('list_in/hapus_container') ?>">
		      		<table class="table table-hover tabel-striped caption-top display" id="example">
		      			<thead>
			      			<tr class="bg-primary bg-opacity-75 text-white">
			      				<th width="10" class="text-center">ID</th>
				      			<th>No Container</th>
				      			<th>Size</th>
				      			<th>Tipe</th>
				      			<th>Status</th>
				      		</tr>
			      		</thead>
			      		<tbody>
				      		<?php foreach ($listContainer as $key => $value) { ?>
				      			<tr>
				      				<td class="text-center">
				      					<input type="checkbox" name="hapus[]" value="<?php echo $value->idcontainer; ?>">
				      				</td>
				      				<td><?php echo $value->no_cont; ?></td>
				      				<td><?php echo $value->size; ?></td>
				      				<td><?php echo $value->tipe; ?></td>
				      				<td><?php echo $value->st_cont; ?></td>
				      			</tr>
			      			<?php } ?>
			      		</tbody>
			      		<tfoot>
			      			<tr>
			      				<td colspan="5">
			      					<input type="hidden" name="id_move_in" value="<?php echo $this->uri->segment(3); ?>">
			      					<button type="submit" class="btn btn-warning text-white" onclick="return confirm('Yakin dihapus?');">Hapus</button>
			      					<a href="<?php echo site_url('list_in/view_list_in/'); ?><?php echo $this->uri->segment(3); ?>" class="btn btn-danger">Batal</a>
			      				</td>
			      			</tr>
			      		</tfoot>
		      		</table>
		      	</form>
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