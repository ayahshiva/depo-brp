	<section class="login-background">
		<main>
      		<div class="row justify-content-center p-2 text-center">
         		<div class="col col-12 col-md-4 col-lg-4 form-signin w-100 m-auto">
         			<img class="mb-4" src="<?php echo base_url(); ?>assets/images/logo.svg" alt="" width="120" height="120">
         			<div class="card">
         				<div class="card-header">
         					<div class="card-title text-center"><h3>Silahkan Login</h3></div>
         				</div>
         				<div class="card-body">
         					<form action="<?php echo site_url('login/auth'); ?>" method="post">
	    		
					    		<div class="form-floating">
					      			<input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com" required>
					      			<label for="floatingInput">Username</label>
					    		</div>
					    		
					    		<div class="form-floating">
					      			<input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
					      			<label for="floatingPassword">Password</label>
					    		</div>
					    		<button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
				  			</form>
         				</div>
         				
         				<?php if($this->session->flashdata('error') != ''){ ?>
         					<div class="card-footer">
							    <div class="alert alert-danger">
							  		<strong>Gagal Login!</strong> <br />Username dan/atau Password Salah!
								</div>
							</div>
						<?php } ?>
								
						<?php if($this->session->flashdata('none') != ''){ ?>
							<div class="card-footer">
						    	<div class="alert alert-danger">
						  			<strong>Gagal Login!</strong> <br />Username belum terdaftar!
								</div>
							</div>
						<?php } ?>         				
         			</div>
         		</div>
         	</div>
         	<div class="row justify-content-center p-2">
         		<div class="col col-12 col-md-4 col-lg-4 text-center">
         			<p class="mt-5 mb-3 text-white">&copy; <?php echo date('Y'); ?> - PT Bahari Raharja Permai</p>
         		</div>
         	</div>
		</main>		
	</section>