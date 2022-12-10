<?php
  header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
  header("Content-type:   application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename= Berita Acara.xlsx"); 
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
?>



	
      		
      			
      				<table border='1' width="100%">
      						<tr>
      							<th align="center" colspan="8"><img src="<?php echo base_url(); ?>assets/images/logo.svg" width="100"></th>      
      						</tr>

                  <tr>
                    <th colspan="8">PT. BAHARI RAHARJA PERMAI DEPO - PALEMBANG [<?php echo $do_number; ?>]</th>
                  </tr>

      						<tr>
      							<th colspan="8">Berita Acara Penerimaan Container</th>
      						</tr>
      						
                  
                  <tr>
      							<th>EMKL</th>
      							<th colspan="7" align="left"><?php echo $nama_emkl->nama; ?></th>
      						</tr>
      						
                  <tr>
      							<th>Periode</th>
      							<th colspan="7" align="left">
      								<?php echo date('d-m-Y', strtotime($tanggal_awal)); ?> s/d <?php echo date('d-m-Y', strtotime($tanggal_akhir)); ?>
      							</th>
      						</tr>
                  
                  <tr><td colspan="8"></td></tr>

                  <tr>
                    <th>No.</th>
                    <th>No. Container</th>
                    <th>Size</th>
                    <th>MLO</th>
                    <th>Condition</th>
                    <th>Date-In</th>
                    <th>Time-In</th>
                    <th> ex Vessel / Voyage </th>
                  </tr>

                  <?php $no = 1; ?>
                  <?php foreach ($hasil as $key => $value) { ?>
                    <tr class="text-center">
                      <td align="center"><?php echo $no++; ?></td>
                      <td align="center"><?php echo $value->no_cont; ?></td>
                      <td align="center"><?php echo $value->size; ?></td>
                      <td align="center"><?php echo $value->nama_mlo; ?></td>
                      <td align="center"><?php echo $value->kondisi; ?></td>
                      <td align="center"><?php echo date('d-m-Y', strtotime($value->tanggal)); ?></td>
                      <td align="center"><?php echo date('H:i', strtotime($value->waktu)); ?></td>
                      <td align="center"><?php echo $value->nama_vessel; ?> / <?php echo $value->no_voyage; ?></td>
                    </tr>
                  <?php } ?>
                        					
      						<tr><th colspan="8">&nbsp;</th></tr>
      					
                	<tr>
      							<th colspan="6">
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
      					
                	<tr>
      							<th colspan="6"></th>
      							<th colspan="2">Admin BRP</th>
      						</tr>
      					
      				</table>
