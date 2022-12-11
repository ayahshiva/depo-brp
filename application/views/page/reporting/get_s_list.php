<?php
  header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
  header("Content-type:   application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename= S-List Reporting.xls"); 
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
						<td class="text-center"><?php echo $value->no_container; ?></td>
						<td class="text-center"><?php echo $value->size; ?></td>
						<td class="text-center"><?php echo $value->tipe; ?></td>
						<td class="text-center"><?php echo $mlo; ?></td>
						<td class="text-center"><?php echo $value->kondisi; ?></td>
						<td class="text-center"><?php echo $value->payload; ?></td>
						<td class="text-center"><?php echo $value->cleaning; ?></td>
						<td class="text-center"><?php echo date('d-m-Y', strtotime($value->date_in)); ?></td>
						<td class="text-center"><?php echo $value->truck_in; ?></td>
						<td class="text-center"><?php echo $vessel; ?> / <?php echo $value->no_voyage; ?></td>
						<td class="text-center"><?php echo $emkl; ?></td>
						<td class="text-center"><?php echo $storage; ?></td>
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


	<!-- Typehead -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom JS -->    
    <script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>

    <?php $this->load->view('include/sweetalert_js.php'); ?>
    <?php $this->load->view('include/datatables.php'); ?>
    <?php $this->load->view('include/modal_js.php'); ?>

    <script>
        $(function() {
            $(document).ready(function(){
                $( "#no_cont" ).autocomplete({
                  source: "<?php echo site_url('dashboard/nomorContainer/?');?>"
                });
            });
        });
    </script>


    </body>
</html>
