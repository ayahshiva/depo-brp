
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
    
    <!--Bootstrap JS -->    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    
  </head>
  <body>

  <div class="table-responsive">
		<table class="table table-bordered table-striped table-hover text-nowrap">
			<thead>
				<tr>
					<th class="text-center" colspan="13">
						PT BAHARI RAHARJA PERMAI - PALEMBANG
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="13">
						Periode: <?php echo date('d-m-Y', strtotime($tanggal)) ?>
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="13">
						MLO: <?php echo $nama->nama; ?>
					</th>
				</tr>
				<tr><th colspan="13">&nbsp;</th></tr>
				<tr>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">No</td>
			      	<td colspan="4" class="text-center bg-primary text-white">Container Data</td>
			      	<td colspan="6" class="text-center bg-primary text-white">IN</td>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">Cogsignee/EMKL</td>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">Total Storage Day</td>
			    </tr>
			    <tr>
			      	<td class="text-center bg-primary text-white">No Container</td>
			      	<td class="text-center bg-primary text-white">Size</td>
			      	<td class="text-center bg-primary text-white">Type</td>
			      	<td class="text-center bg-primary text-white">MLO</td>
			      	<td class="text-center bg-primary text-white">Condition</td>
			      	<td class="text-center bg-primary text-white">Payload<br>KGs</td>
			      	<td class="text-center bg-primary text-white">Cleaning</td>
			      	<td class="text-center bg-primary text-white">Date In</td>
			      	<td class="text-center bg-primary text-white">Truck No</td>
			      	<td class="text-center bg-primary text-white">Ex Vessel / Voyage</td>
			    </tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach($get_s_list as $key => $value) { ?>
					<tr>
						<td class="text-center"><?php echo $no++; ?></td>
						<td class="text-center"><?php echo $value->no_cont; ?></td>
						<td class="text-center"><?php echo $value->size; ?></td>
						<td class="text-center"><?php echo $value->tipe; ?></td>
						<td class="text-center"><?php echo $nama->nama; ?></td>
						<td class="text-center"><?php echo $value->kondisi; ?></td>
						<td class="text-center"><?php echo $value->payload; ?></td>
						<td class="text-center"><?php echo $value->cleaning; ?></td>
						<td class="text-center"><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
						<td class="text-center"><?php echo $value->truck_in; ?></td>
						<td class="text-center"><?php echo $value->nama_vessel; ?> / <?php echo $value->no_voyage; ?></td>
						<td class="text-center"><?php echo $value->nama_emkl; ?></td>
						<td class="text-center">
							<?php 
								$tgl1 = strtotime(date('Y-m-d'));
            		$tgl2 = strtotime($value->date_in);
            		$days = $tgl1 - $tgl2;
            		$totaldays = floor($days / (60*60*24));
            		$data['storage'] = $totaldays;
            		echo $totaldays;
							?>							
						</td>
					</tr>
				<?php } ?>
			</tbody>

			<tfoot>
				<tr><th colspan="13">&nbsp;</th></tr>
				<tr>
					<th colspan="13">Total Container</th>
				</tr>
				<tr>
					<td colspan="3">Jumlan 20 GP: <?php echo $gp20; ?></td>
					<td colspan="3">-</td>
					<td colspan="3">Jumlah 20 OP: <?php echo $op20; ?></td>
					<td colspan="2">Jumlah 20 FR: <?php echo $fr20; ?></td>
					<td colspan="3">Jumlah 20 RF: <?php echo $rf20; ?></td>
				</tr>
				<tr>
					<td colspan="3">Jumlan 40 GP: <?php echo $gp40; ?></td>
					<td colspan="3">Jumlah 40 HC: <?php echo $hc40; ?></td>
					<td colspan="3">Jumlah 40 OP: <?php echo $op40; ?></td>
					<td colspan="2">Jumlah 40 FR: <?php echo $fr40; ?></td>
					<td colspan="3">Jumlah 40 RF: <?php echo $rf40; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>

    </body>
</html>
