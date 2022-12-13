<?php
  header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
  header("Content-type:   application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename= MLO invoicing Reporting.xls"); 
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Inventory System | PT Bahari Raharja Permai</title>

    <link rel="manifest" href="<?php echo base_url('assets/pwa/'); ?>manifest.json" />
    
    
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
    
  </head>
  <body>

  <div class="table-responsive">
		<table class="table table-bordered table-striped text-nowrap">
			<thead>
				<tr>
					<th class="text-center" colspan="13">
						PT BAHARI RAHARJA PERMAI - PALEMBANG
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="13">
						Periode: <?php echo date('d-m-Y', strtotime($tanggal_awal)) ?> / <?php echo date('d-m-Y', strtotime($tanggal_akhir)) ?>
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="13">
						MLO: <?php echo $nama->nama; ?>
					</th>
				</tr>
				<tr><th colspan="13">&nbsp;</th></tr>
				<tr>
						<th class="text-center bg-primary text-white">No</th>
				    <th class="text-center bg-primary text-white">Container No</th>
				    <th class="text-center bg-primary text-white">Size</th>
				    <th class="text-center bg-primary text-white">Type</th>
				    <th class="text-center bg-primary text-white">Condition</th>
				    <th class="text-center bg-primary text-white">Date In</th>
				    <th class="text-center bg-primary text-white">ex Vessel / Voyage</th>
				    <th class="text-center bg-primary text-white">Date Out</th>
				    <th class="text-center bg-primary text-white">EMKL Out</th>
				    <th class="text-center bg-primary text-white">Storage Days</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach($invoicing as $key => $value) { ?>
					<tr>
						<td class="text-center"><?php echo $no++; ?></td>
						<td class="text-center"><?php echo $value->no_container; ?></td>
						<td class="text-center"><?php echo $value->size; ?></td>
						<td class="text-center"><?php echo $value->tipe; ?></td>
						<td class="text-center"><?php echo $value->kondisi; ?></td>
						<td class="text-center"><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
						<td class="text-center"><?php echo $value->nama_vessel; ?> / <?php echo $value->no_voyage; ?></td>
						<td class="text-center"><?php echo date('d-m-Y', strtotime($value->date_out)); ?></td>
						<td class="text-center"><?php echo $value->nama_emkl; ?></td>						
						<td class="text-center">
							<?php 
									$tgl1 = strtotime($value->date_out);
            			$tgl2 = strtotime($value->date_in);
            			$days = $tgl1 - $tgl2;
            			$totaldays = floor($days / (60*60*24));
            			echo $totaldays;
							?>							
						</td>
					</tr>
				<?php } ?>
			</tbody>

			<tfoot>
				<!-- <tr><th colspan="13">&nbsp;</th></tr>
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
				</tr> -->
			</tfoot>
		</table>
	</div>

    </body>
</html>
