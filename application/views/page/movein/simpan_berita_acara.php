<?php
  header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
  header("Content-type:   application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename= Berita Acara.xls"); 
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
?>


<style type="text/css">
  table{
    border: 1px solid #ooo;
    width: 100%;
  }
  td{
    border: 1px solid #000;
  }
</style>
	
      		
      			
      				<table class="table table-bordered border-dark">
                <thead>
                  <tr>
                    <th rowspan="2" align="center" valign="center"><img src="<?php echo base_url(); ?>assets/images/logo.jpg" width="40"></th>
                    <th colspan="7">PT. BAHARI RAHARJA PERMAI DEPO</th>
                  </tr>
                  <tr>
                    <th colspan="7">Berita Acara Penerimaan Container</th>
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
                      <td><?php echo $value->nama_mlo; ?></td>
                      <td><?php echo $value->kondisi; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
                      <td><?php echo date('H:i', strtotime($value->time_in)); ?></td>
                      <td><?php echo $value->nama_vessel; ?> / <?php echo $value->no_voyage; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
                  
                  <br />
                  <br />
                  <br />
                  <p style="text-align: right; padding-right: 100px; ">

                  Palembang, <?php echo date('d-m-Y', strtotime(date('Y-m-d'))); ?>
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <?php echo $this->session->userdata('display_name');?>
                </p>
