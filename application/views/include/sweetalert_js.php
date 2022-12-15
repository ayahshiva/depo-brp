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

        <?php if($this->session->flashdata('payment')){ ?>           
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


        function hapusemkl(ID){
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
                    window.location.href = "<?php echo site_url('mlo/hapus_emkl')?>/"+ID;
              }
            })
        }   

        function hapusvessel(ID){
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
                    window.location.href = "<?php echo site_url('vessel/hapus_vessel')?>/"+ID;
              }
            })
        }

        function hapusdetil(ID){
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
                    window.location.href = "<?php echo site_url('list_in/hapus_detil')?>/"+ID;
              }
            })
        }

        function hapus_list_in(ID){
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
                    window.location.href = "<?php echo site_url('list_in/hapus_list_in')?>/"+ID;
              }
            })
        }
    

    </script>