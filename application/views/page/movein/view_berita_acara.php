<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Inventory System | PT Bahari Raharja Permai</title>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
    
    <!--Bootstrap JS -->    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.full.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

     <style type="text/css"> 

	      .example-print {
	        display: none;
	      }
	      @media print {
	      .example-screen {
	        display: none;
	      }
	      .example-print {
	        display: block;
	      }
	    }
	</style>
    
  </head>
  <body>

	
      		
      			
      				<table class="table table-bordered border-dark">
      					<thead>
      						<tr>
      							<th rowspan="2" class="text-center"><img src="<?php echo base_url(); ?>assets/images/logo.svg" width="100"></th>
      							<th colspan="7" class="text-center fs-3">PT. BAHARI RAHARJA PERMAI DEPO</th>
      						</tr>
      						<tr>
      							<th colspan="7" class="text-center fs-6">Berita Acara Penerimaan Container</th>
      						</tr>
      						<tr>
      							<th>EMKL</th>
      							<th colspan="7"><?php echo $nama_emkl->nama; ?></th>
      						</tr>
      						<tr>
      							<th>Periode</th>
      							<th colspan="7">
      								<?php echo date('d-m-Y', strtotime($tanggal_awal)); ?> s/d <?php echo date('d-m-Y', strtotime($tanggal_akhir)); ?>
      							</th>
      						</tr>
      					</thead>
      				</table>
      				<table class="table table-borderless table-striped">
      					<thead>
      						<tr class="text-center">
      							<th>No.</th>
      							<th>No. Container</th>
      							<th>Size</th>
      							<th>MLO</th>
      							<th>Condition</th>
      							<th>Date-In</th>
      							<th>Time-In</th>
      							<th> ex Vessel / Voyage </th>
      						</tr>
      					</thead>
      					<tbody>
      						<?php $no = 1; ?>
      						<?php foreach ($hasil as $key => $value) { ?>
	      						<tr class="text-center">
	      							<td><?php echo $no++; ?></td>
	      							<td><?php echo $value->no_container; ?></td>
	      							<td><?php echo $value->size; ?></td>
	      							<td><?php echo $value->nama; ?></td>
	      							<td><?php echo $value->kondisi; ?></td>
	      							<td><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
	      							<td><?php echo date('H:i', strtotime($value->time_in)); ?></td>
	      							<td><?php echo $value->nama_vessel; ?> / <?php echo $value->no_voyage; ?></td>
	      						</tr>
      						<?php } ?>
      					</tbody>
      					<tfoot>
      						<tr><th colspan="8">&nbsp;</th></tr>
      						<tr class="text-center">
      							<th colspan="6" style="border-left: 0px; border-bottom: 0px;">
      								&nbsp;
      							</th>
      							<th colspan="2">
      								Palembang, <?php echo date('d-m-Y', strtotime(date('Y-m-d'))); ?>
      							</th>
      						</tr>
      						<tr><th colspan="8">&nbsp;</th></tr>
      						<tr><th colspan="8">&nbsp;</th></tr>
      						<tr><th colspan="8">&nbsp;</th></tr>
      						<tr><th colspan="8">&nbsp;</th></tr>
      						<tr class="text-center">
      							<th colspan="6"></th>
      							<th colspan="2"><?php echo $this->session->userdata('display_name'); ?></th>
      						</tr>
      					</tfoot>
      				</table>
      			
</body>
</html>
    <script>
    	//window.print();
  	</script>