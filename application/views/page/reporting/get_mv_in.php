<?php
  header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
  header("Content-type:   application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename= MV-In Reporting.xls"); 
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
?>

<style type="text/css">
	table{
		width: 100%;
		border: 1px solid #000;
		margin: 1px;
		padding: 1px;
	}
	td{
		border: 1px solid #000;
		margin: 2px;
		padding: 2px;
	}
</style>
		<table>
			<thead>
				<tr>
					<th class="text-center" colspan="16">
						PT BAHARI RAHARJA PERMAI - PALEMBANG
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="16">
						Periode: <?php echo date('d-m-Y', strtotime($tanggal_awal)) ?> s/d <?php echo date('d-m-Y', strtotime($tanggal_akhir)) ?>
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="16">
						MLO: <?php echo $mlo->nama; ?>
					</th>
				</tr>
				<tr><th colspan="16">&nbsp;</th></tr>
				<tr>
			      	<th rowspan="2" bgcolor="yellow">No</th>
			      	<th colspan="4" bgcolor="yellow">Container Data</th>
			      	<th colspan="9" bgcolor="yellow">IN</th>
			      	<th rowspan="2" bgcolor="yellow">Cogsignee/EMKL</th>
			      	<th rowspan="2" bgcolor="yellow">Ex Vessel/Voy</th>
			    </tr>
			    <tr>
			      	<th bgcolor="yellow">No Container</th>
			      	<th bgcolor="yellow">SZ</th>
			      	<th bgcolor="yellow">Type</th>
			      	<th bgcolor="yellow">MLO</th>
			      	<th bgcolor="yellow">Condition</th>
			      	<th bgcolor="yellow">Cleaning</th>
			      	<th bgcolor="yellow">Empty / Full</th>
			      	<th bgcolor="yellow">Grade</th>
			      	<th bgcolor="yellow">Tare</th>     
			      	<th bgcolor="yellow">Payload<br>KGs</th>
			      	<th bgcolor="yellow">Date In</th>
			      	<th bgcolor="yellow">Time In</th>
			      	<th bgcolor="yellow">Truck No</th>
			    </tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach($get_mv_in as $key => $value) { ?>
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
						<td class="text-center"><?php echo date('H:i', strtotime($value->date_in)); ?></td>
						<td class="text-center"><?php echo $value->truck_in; ?></td>
						<td class="text-center"><?php echo $value->nama_emkl; ?></td>
						<td class="text-center"><?php echo $value->nama_vessel; ?> / <?php echo $value->no_voyage; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<hr />
		
		<table>
				<tr>
					<th colspan="16" align="left">Total Container</th>
				</tr>
				<tr>
					<td colspan="4">Jumlan 20 GP: <?php echo $gp20; ?></td>
					<td colspan="3">-</td>
					<td colspan="3">Jumlah 20 OP: <?php echo $op20; ?></td>
					<td colspan="4">Jumlah 20 FR: <?php echo $fr20; ?></td>
					<td colspan="2">Jumlah 20 RF: <?php echo $rf20; ?></td>
				</tr>
				<tr>
					<td colspan="4">Jumlan 40 GP: <?php echo $gp40; ?></td>
					<td colspan="3">Jumlah 40 HC: <?php echo $hc40; ?></td>
					<td colspan="3">Jumlah 40 OP: <?php echo $op40; ?></td>
					<td colspan="4">Jumlah 40 FR: <?php echo $fr40; ?></td>
					<td colspan="2">Jumlah 40 RF: <?php echo $rf40; ?></td>
				</tr>
			
		</table>
