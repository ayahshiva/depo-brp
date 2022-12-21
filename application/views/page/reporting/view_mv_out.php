
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
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    
  </head>
  <body>

 
		<table class="table table-bordered table-striped table-hover text-nowrap">
			<thead>
				<tr>
					<th class="text-center" colspan="22">
						PT BAHARI RAHARJA PERMAI - PALEMBANG
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="22">
						Periode: <?php echo date('d-m-Y', strtotime($tanggal_awal)) ?> s/d <?php echo date('d-m-Y', strtotime($tanggal_akhir)) ?>
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="22">
						MLO: <?php echo $mlo->nama; ?>
					</th>
				</tr>
				<tr><th colspan="22">&nbsp;</th></tr>
				<tr>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">No</td>
			      	<td colspan="4" class="text-center bg-primary text-white">Container Data</td>
			      	<td colspan="7" class="text-center bg-primary text-white">IN</td>
			      	<td colspan="4" class="text-center bg-primary text-white">OUT</td>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">Next Vessel</td>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">Shipper/EMKL</td>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">EX Vessel</td>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">No D.O Out</td>
			      	<td rowspan="2" class="text-center bg-primary text-white align-middle">Truck No</td>
			    </tr>
			    <tr>
			      	<td class="text-center bg-primary text-white">No Container</td>
			      	<td class="text-center bg-primary text-white">SZ</td>
			      	<td class="text-center bg-primary text-white">Type</td>
			      	<td class="text-center bg-primary text-white">MLO</td>
			      	<td class="text-center bg-primary text-white">Condition</td>
			      	<td class="text-center bg-primary text-white">Cleaning</td>
			      	<td class="text-center bg-primary text-white">Empty / Full</td>
			      	<td class="text-center bg-primary text-white">Grade</td>
			      	<td class="text-center bg-primary text-white">Tare</td>     
			      	<td class="text-center bg-primary text-white">Payload<br>KGs</td>
			      	<td class="text-center bg-primary text-white">Date In</td>
			      	<td class="text-center bg-primary text-white">Date Out</td>
			      	<td class="text-center bg-primary text-white">Time Out</td>
			      	<td class="text-center bg-primary text-white">Storage Days</td>
			      	<td class="text-center bg-primary text-white">Seal</td>
			    </tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach($get_mv_out as $key => $value) { ?>
					<tr>
						<td class="text-center"><?php echo $no++; ?></td>
						<td class="text-center"><?php echo $value->no_container; ?></td>
						<td class="text-center"><?php echo $value->size; ?></td>
						<td class="text-center"><?php echo $value->tipe; ?></td>
						<td class="text-center"><?php echo $value->nama_mlo; ?></td>
						<td class="text-center"><?php echo $value->kondisi; ?></td>
						<td class="text-center"><?php echo $value->cleaning; ?></td>
						<td class="text-center"><?php echo $value->status; ?></td>
						<td class="text-center"><?php echo $value->grade; ?></td>
						<td class="text-center"><?php echo $value->tare; ?></td>
						<td class="text-center"><?php echo $value->payload; ?></td>
						<td class="text-center"><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
						<td class="text-center"><?php echo date('d-m-Y', strtotime($value->date_out)); ?></td>
						<td class="text-center"><?php echo date('H:i', strtotime($value->time_out)); ?></td>
						<td class="text-center">
							<?php
								$tgl1 = strtotime($value->date_in);
		            $tgl2 = strtotime($value->date_out);
		            $days = $tgl2 - $tgl1;
		            $totaldays = floor($days / (60*60*24));
		            $storage = $totaldays;
							?>
							<?php echo $storage; ?>							
						</td>
						<td class="text-center"><?php echo $value->seal_number; ?></td>
						<td class="text-center"><?php echo $ves_ot; ?></td>
						<td class="text-center"><?php echo $nama_emkl; ?></td>
						<td class="text-center"><?php echo $nama_vessel; ?></td>
						<td class="text-center"><?php echo $value->do_number; ?></td>
						<td class="text-center"><?php echo $value->truck_out; ?></td>
					</tr>
				<?php } ?>
			</tbody>

			<tfoot>
				<tr><th colspan="16">&nbsp;</th></tr>
				<tr>
					<th colspan="16">Total Container</th>
				</tr>
				<tr>
					<td colspan="4">Jumlan 20 GP: <?php echo $gp20; ?></td>
					<td colspan="3">-</td>
					<td colspan="3">Jumlah 20 OP: <?php echo $op20; ?></td>
					<td colspan="3">Jumlah 20 FR: <?php echo $fr20; ?></td>
					<td colspan="3">Jumlah 20 RF: <?php echo $rf20; ?></td>
				</tr>
				<tr>
					<td colspan="4">Jumlan 40 GP: <?php echo $gp40; ?></td>
					<td colspan="3">Jumlah 40 HC: <?php echo $hc40; ?></td>
					<td colspan="3">Jumlah 40 OP: <?php echo $op40; ?></td>
					<td colspan="3">Jumlah 40 FR: <?php echo $fr40; ?></td>
					<td colspan="3">Jumlah 40 RF: <?php echo $rf40; ?></td>
				</tr>
			</tfoot>
		</table>

    </body>
</html>
