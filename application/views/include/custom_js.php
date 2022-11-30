    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()

        <?php if($this->session->flashdata('simpan')){ ?>           
            Swal.fire({
                title: 'Berhasil',  
                icon: 'success',
                title: 'Data telah disimpan',
                showConfirmButton: true,
            })
        <?php } ?>
    
        <?php if($this->session->flashdata('edit')){ ?>           
            Swal.fire({
                title: 'Berhasil',  
                icon: 'success',
                title: 'Data telah diubah',
                showConfirmButton: true,
            })
        <?php } ?>
    
        <?php if($this->session->flashdata('hapus')){ ?>           
            Swal.fire({
                title: 'Berhasil',  
                icon: 'success',
                title: 'Data telah dihapus',
                showConfirmButton: true,
            })
        <?php } ?>
    

    
        function hapus(ID){
            Swal.fire({
              title: 'Yakin mau dihapus?',
              //text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya!'
            }).then((result) => {
              if (result.isConfirmed) {
                    window.location.href = "<?php echo site_url('user/hapus_user')?>/"+ID;
              }
            })
        } 

        function hapusmlo(ID){
            Swal.fire({
              title: 'Yakin mau dihapus?',
              //text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya!'
            }).then((result) => {
              if (result.isConfirmed) {
                    window.location.href = "<?php echo site_url('mlo/hapus_mlo')?>/"+ID;
              }
            })
        }   
    

        $(function () {
          $('#formEditUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var display_name = button.data('display_name'); // Extract info from data-* attributes
            var username = button.data('username');
            var email = button.data('email');
            var role = button.data('role');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#display_name').val(display_name);
            modal.find('#username').val(username);
            modal.find('#email').val(email);
            modal.find('#role').val(role);
          });
        });

        $(function () {
          $('#formEditMLO').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var nama = button.data('nama'); // Extract info from data-* attributes
            var alamat = button.data('alamat');
            var telp = button.data('telp');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.id').val(id);
            modal.find('.nama').val(nama);
            modal.find('.alamat').val(alamat);
            modal.find('.telp').val(telp);
          });
        });
    
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
    </script>