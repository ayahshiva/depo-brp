	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">User</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('user'); ?>" onclick="return false;">User</a></li>  
    						<li class="breadcrumb-item">Table Data User</li>
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>

      	<!-- Content -->
      	
  			<table class="table table-hover caption-top" id="myTable">
  				<caption class="fs-5">
  					<a href="#formAddUser" class="btn btn-md btn-success" data-bs-toggle="modal">
  						<i class="bi bi-person-add"></i> Tambah Data 
  					</a>
  				</caption>
    			<thead>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">ID</th>
	      				<th>Nama</th>
	      				<th>Username</th>
	      				<th>Email</th>
	      				<th>Role</th>
	      				<th width="80">Last Login</th>
	      				<th width="50">#</th>
	      			</tr>
    			</thead>
    			
    			<tfoot>
    				<tr class="bg-primary bg-opacity-75 text-white">
	      				<th width="10">ID</th>
	      				<th>Nama</th>
	      				<th>Username</th>
	      				<th>Email</th>
	      				<th>Role</th>
	      				<th width="80">Last Login</th>
	      				<th width="50">#</th>
	      			</tr>
    			</tfoot>
  			</table>
		

		<!-- Modal -->
		<!-- form add user -->
		<div class="modal fade" id="formAddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('user/add_user'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah User</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">Nama*</label>
								<input type="text" class="form-control" id="validate01" placeholder="Nama" name="display_name" autofocus required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Username*</label>
								<input type="text" class="form-control" id="validate02" placeholder="Username" name="username" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Email*</label>
								<input type="email" class="form-control" id="validate03" placeholder="name@example.com" name="email" required>
								<div class="invalid-feedback">Harap isi email dengan format yang benar!</div>

							</div>
							<div class="mb-3">
								<label class="form-label">Hak Akses*</label>
								<select class="form-select" aria-label="Pilih Hak Akses"  id="validate04" name="role" required>
									<option selected disabled value="">Pilih Hak Akses</option>
									<option value="mgmt">mgmt</option>
	                                <option value="spv">spv</option>
	                                <option value="admin">admin</option>
	                                <option value="finance">finance</option>
	                                <option value="MLO">MLO</option>
								</select>
								<div class="invalid-feedback">Pilih hak akses</div>
							</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			        		<button type="submit" class="btn btn-primary">Simpan</button>
			      		</div>
			    	</div>
		    	</form>
		  	</div>
		</div>

		<!-- form edit user -->
		<div class="modal fade" id="formEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		  		<form class="needs-validation" method="post" action="<?php echo site_url('user/update_user'); ?>" novalidate>
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah User</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="mb-3">
								<label class="form-label">Nama*</label>
								<input type="hidden" name="id" id="id">
								<input type="text" class="form-control" id="display_name" name="display_name" required>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Username*</label>
								<input type="text" class="form-control" id="username" name="username" readonly disabled>
								<div class="invalid-feedback">Harap diisi!</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Email*</label>
								<input type="email" class="form-control" id="email" name="email" required>
								<div class="invalid-feedback">Harap isi email dengan format yang benar!</div>

							</div>
							<div class="mb-3">
								<label class="form-label">Hak Akses*</label>
								<select class="form-select" aria-label="Pilih Hak Akses"  id="role" name="role" required>
									<option selected disabled value="">Pilih Hak Akses</option>
									<option value="mgmt">mgmt</option>
	                                <option value="spv">spv</option>
	                                <option value="admin">admin</option>
	                                <option value="finance">finance</option>
	                                <option value="MLO">MLO</option>
								</select>
								<div class="invalid-feedback">Pilih hak akses</div>
							</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			        		<button type="submit" class="btn btn-primary">Simpan</button>
			      		</div>
			    	</div>
		    	</form>
		  	</div>
		</div>
    </main>

    <script>
    	<?php if($this->session->flashdata('edit')){ ?>           
            Swal.fire({
                title: 'Berhasil',  
                icon: 'success',
                title: 'Data user telah diubah',
                showConfirmButton: true,
            })
        <?php } ?>
    </script>

    <script>
        <?php if($this->session->flashdata('sukses')){ ?>           
            Swal.fire({
                title: 'Berhasil',  
                icon: 'success',
                title: 'Data user telah disimpan',
                showConfirmButton: true,
            })
        <?php } ?>
    </script>

    <script>
        <?php if($this->session->flashdata('hapus')){ ?>           
            Swal.fire({
                title: 'Berhasil',  
                icon: 'success',
                title: 'Data user telah dihapus',
                showConfirmButton: true,
            })
        <?php } ?>
    </script>

    <script>
    	function hapus(ID){
    		Swal.fire({
			  title: 'Yakin mau dihapus?',
			  //text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			    	window.location.href = "<?php echo site_url('user/hapus_user')?>/"+ID;
			  }
			})
    	} 	
    </script>

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
    </script>