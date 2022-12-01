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
                    "targets": [ 0 ], 
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
                    "targets": [0],
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
                    "dataType": "json",
                    "type": "POST",
                     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
                },
                "columnsDefs":[{
                    "targets": [0],
                    "orderable": false
                }]
            });
        });


	});
</script>