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
      	<div class="table-responsive-sm table-responsive-md">
  			<table class="table table-hover table-sm caption-top">
  				<caption class="fs-5">
  					Move In
  				</caption>
  				<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	  					<th width="10">No.</th>
	  					<th>Tanggal MV-IN</th>
	  					<th>MLO</th>
	  					<th>Vessel</th>
	  					<th>No Voyage</th>
	  					<th>Tanggal Masuk</th>
	  					<th>Kode</th>
	  					<th>DO Number</th>
	  				</tr>
    			</thead> 
    			<tbody>
    				<?php $no = 1; ?>
    				<?php foreach ($mvin as $key => $value) { ?>
	    				<tr>
		  					<td><?php echo $no++; ?>.</td>
		  					<td><?php echo date('d-m-Y', strtotime($value->tanggal)); ?></td>
		  					<td><?php echo $value->namamlo; ?></td>
		  					<td><?php echo $value->namavessel; ?></td>
		  					<td><?php echo $value->no_voyage; ?></td>
		  					<td><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
		  					<td><?php echo $value->kode; ?>
		  					<td><?php echo $value->do_number; ?>
		  				</tr>
		  			<?php } ?>
    			</tbody>   			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
	  					<th width="10">No.</th>
	  					<th>Tanggal MV-IN</th>
	  					<th>MLO</th>
	  					<th>Vessel</th>
	  					<th>No Voyage</th>
	  					<th>Tanggal Masuk</th>
	  					<td>Kode</td>
	  					<th>DO Number</th>
	  				</tr>
    			</tfoot>
  			</table>

  			<table class="table table-hover table-sm caption-top">
  				<caption class="fs-5">
  					Move Out
  				</caption>
  				<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	  					<th width="10">No.</th>
	  					<th>Tanggal MV-Out</th>
	  					<th>EMKL</th>
	  					<th>Vessel</th>
	  					<th>No Voyage</th>
	  					<th>Tanggal Keluar</th>
	  					<th>Kode</th>
	  					<th>DO Number</th>
	  				</tr>
    			</thead> 
    			<tbody>
    				<?php $no = 1; ?>
    				<?php foreach ($mvot as $key => $value) { ?>
	    				<tr>
		  					<td><?php echo $no++; ?>.</td>
		  					<td><?php echo date('d-m-Y', strtotime($value->tanggal)); ?></td>
		  					<td><?php echo $value->namaemkl; ?></td>
		  					<td><?php echo $value->namavessel; ?></td>
		  					<td><?php echo $value->no_voyage; ?></td>
		  					<td><?php echo date('d-m-Y', strtotime($value->date_out)); ?></td>
		  					<td><?php echo $value->kode; ?>
		  					<td><?php echo $value->do_number; ?>
		  				</tr>
		  			<?php } ?>
    			</tbody>   			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
	  					<th width="10">No.</th>
	  					<th>Tanggal MV-Out</th>
	  					<th>EMKL</th>
	  					<th>Vessel</th>
	  					<th>No Voyage</th>
	  					<th>Tanggal Keluar</th>
	  					<th>Kode</th>
	  					<th>DO Number</th>
	  				</tr>
    			</tfoot>
  			</table>
  		</div>

  		<!-- End Content-->
    </main>

