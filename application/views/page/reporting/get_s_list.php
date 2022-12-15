<?php
  header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
  header("Content-type:   application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename= S-List Reporting.xls"); 
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
?>

<style type="text/css">
	table, td {
		border: 1px solid #000;
	}
</style>
<table>
			<thead>
				<tr>
					<th colspan="13">
						PT BAHARI RAHARJA PERMAI - PALEMBANG
					</th>
				</tr>
				<tr>
					<th colspan="13">
						Periode: <?php echo date('d-m-Y', strtotime($tanggal)) ?>
					</th>
				</tr>
				<tr>
					<th colspan="13">
						MLO: <?php echo $nama->nama; ?>
					</th>
				</tr>
				<tr><th colspan="13">&nbsp;</th></tr>
				<tr>
			      	<th rowspan="2" bgcolor="yellow">No</th>
			      	<th colspan="4" bgcolor="yellow">Container Data</th>
			      	<th colspan="6" bgcolor="yellow">IN</th>
			      	<th rowspan="2" bgcolor="yellow">Cogsignee/EMKL</th>
			      	<th rowspan="2" bgcolor="yellow">Total Storage Day</th>
			    </tr>
			    <tr>
			      	<th bgcolor="yellow">No Container</th>
			      	<th bgcolor="yellow">Size</th>
			      	<th bgcolor="yellow">Type</th>
			      	<th bgcolor="yellow">MLO</th>
			      	<th bgcolor="yellow">Condition</th>
			      	<th bgcolor="yellow">Payload<br />KGs</th>
			      	<th bgcolor="yellow">Cleaning</th>
			      	<th bgcolor="yellow">Date In</th>
			      	<th bgcolor="yellow">Truck No</th>
			      	<th bgcolor="yellow">Ex Vessel / Voyage</th>
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
					<td colspan="2">Jumlah 20 RF: <?php echo $rf20; ?></td>
				</tr>
				<tr>
					<td colspan="3">Jumlan 40 GP: <?php echo $gp40; ?></td>
					<td colspan="3">Jumlah 40 HC: <?php echo $hc40; ?></td>
					<td colspan="3">Jumlah 40 OP: <?php echo $op40; ?></td>
					<td colspan="2">Jumlah 40 FR: <?php echo $fr40; ?></td>
					<td colspan="2">Jumlah 40 RF: <?php echo $rf40; ?></td>
				</tr>
			</tfoot>
		</table>
