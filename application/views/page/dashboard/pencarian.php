	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Hasil Pencarian : <?php echo $noCont; ?> </h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>" onclick="return false;">Dashboard</a></li> 
    						<li class="breadcrumb-item">Hasil Pencarian</li>     						
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>
      	
      	<!-- Content -->
      	<div class="row">
      		<div class="col-md-3">
				<div class="card h-100 border-primary">		    
					<div class="card-body">
						<h5 class="card-title"><?php echo $data->nama; ?></h5>
					        <!-- <p class="card-text">Container.</p> -->
					</div>
					<div class="card-footer bg-primary">
						<small class="text-white fs-6">MLO</small>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card h-100 border-success">		    
				    <div class="card-body">
				        <h5 class="card-title"><?php echo $data->no_cont; ?></h5>
				        	<!-- <p class="card-text">Size.</p> -->
				      	</div>
				    <div class="card-footer bg-success">
				        <small class="text-white fs-6">No Container</small>
				    </div>
				</div>
			</div>
			<div class="col-md-3">
		  		<div class="card h-100 border-warning">		    
				    <div class="card-body">
				       	<h5 class="card-title"><?php echo $data->size; ?></h5>
				        <!-- <p class="card-text">Container.</p> -->
				    </div>
					<div class="card-footer bg-warning">
				   		<small class="text-white fs-6">Size</small>
					</div>
				</div>
		  	</div>
		  	<div class="col-md-3">
		  		<div class="card h-100 border-danger">		    
				    <div class="card-body">
				        <h5 class="card-title"><?php echo $data->tipe; ?></h5>
				        <!-- <p class="card-text">Container.</p> -->
				    </div>
				    <div class="card-footer bg-danger">
				        <small class="text-white fs-6">Tipe</small>
				    </div>
				</div>
		  	</div>
		</div>
		<hr />
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-hover table-sm caption-top text-nowrap">
  				<caption class="fs-5">
  					Move In
  				</caption>
  				<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	  					<th>No.</th>
	  					<th>Tanggal Masuk</th>	  				
	  					<th>EMKL</th>
	  					<th>Vessel</th>
	  					<th>No Voyage</th>	  					
	  					<th>Kode</th>
	  					<th>DO Number</th>
	  				</tr>
    			</thead> 
    			<tbody>
    				<?php $no = 1; ?>
    				<?php foreach ($mvin as $key => $value) { ?>
	    				<tr>
		  					<td><?php echo $no++; ?>.</td>
		  					<td><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
		  					<td><?php echo $value->nama_emkl; ?></td>
		  					<td><?php echo $value->nama_vessel; ?></td>
		  					<td><?php echo $value->no_voyage; ?></td>
		  					<td><?php echo $value->kode; ?></td>
		  					<td><?php echo $value->do_number; ?></td>
		  				</tr>
		  			<?php } ?>
    			</tbody>   			
    			
  			</table>
  			
  			<table class="table table-hover table-sm caption-top text-nowrap">
  				<caption class="fs-5">
  					Move Out
  				</caption>
  				<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	  					<th>No.</th>
	  					<th>Tanggal Keluar</th>	  				
	  					<th>EMKL</th>
	  					<th>Vessel</th>
	  					<th>No Voyage</th>	  					
	  					<th>Kode</th>
	  					<th>DO Number</th>
	  				</tr>
    			</thead> 
    			<tbody>
    				<?php $no = 1; ?>
    				<?php foreach ($mvot as $key => $value) { ?>
	    				<tr>
		  					<td><?php echo $no++; ?>.</td>
		  					<td>
		  						<?php echo date('d-m-Y', strtotime($value->date_out)); ?>
		  					</td>
		  					<td><?php echo $value->nama_emkl; ?></td>
		  					<td><?php echo $value->nama_vessel; ?></td>
		  					<td><?php echo $value->no_voyage; ?></td>
		  					<td><?php echo $value->kode; ?></td>
		  					<td><?php echo $value->do_number; ?></td>
		  				</tr>
		  			<?php } ?>
    			</tbody>   	
    			
  			</table>
  		</div>

  		<!-- End Content-->
    </main>

