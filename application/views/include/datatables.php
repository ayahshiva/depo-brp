<script>
	$(function() {

		var table;
        $(document).ready(function() {
     
            //datatables
            table = $('#myTable').DataTable({ 
     
                "processing": true, 
                "serverSide": true, 
                "order": [], 
                 
                "ajax": {
                    "url": "<?php echo site_url('user/get_data_user')?>",
                    "dataType": "json",
                    "type": "POST",
                     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
                },
     
                 
                "columnDefs": [
                { 
                    "targets": [ 0, -1 ], 
                    "orderable": false, 
                },
                ],
     
            });
     
        });

        $(document).ready( function () {
            $('#myTableMlo').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('mlo/get_data_mlo'); ?>",
                    "dataType": "json",
                    "type": "POST",
                     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
                },
                "columnsDefs":[{
                    "targets": [0, -1],
                    "orderable": false
                }]
            });
        });

        $(document).ready( function () {
            $('#myTableEMKL').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('emkl/get_data_emkl'); ?>",
                    "type": "POST",
                     
                },
                "columnsDefs":[{
                    "targets": [0, -1],
                    "orderable": false,
                }]
            });
        });

        $(document).ready(function() {
            $('#myTableContainer').DataTable({
                ajax: {
                    url : "<?php echo site_url('container/get_container'); ?>",
                    type : 'GET'
                },
                "columnDefs":[{
                    "targets": [0],
                    "orderable": false,
                }],
            });
        });

        $(document).ready(function() {
            $('#myTableVessel').DataTable({
                ajax: {
                    url : "<?php echo site_url('vessel/get_vessel'); ?>",
                    type : 'GET'
                },
                "columnDefs":[{
                    "targets": [0, -1],
                    "orderable": false,
                }],
            });
        });

        $(document).ready(function() {
            $('#myTableListIn').DataTable({
                ajax: {
                    url : "<?php echo site_url('list_in/get_list_in'); ?>",
                    type : 'GET'
                },
                "columnDefs":[{
                    "targets": [0, 1, 6],
                    "orderable": false,
                }],
            });
        });

	});
</script>