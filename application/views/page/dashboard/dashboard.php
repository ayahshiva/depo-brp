	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Dashboard</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          		<div class="btn-group me-2">
          			<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>" onclick="return false;">Dashboard</a></li>    						
  						</ol>
					</nav>            
          		</div>
        	</div>
      	</div>
      	
      	<div class="row">
		  	<div class="col-md-8">
		    	<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Container Per MLO</h3>
                    </div>
                	<div class="card-body">
            			<div class="chart-container">
                    		<canvas id="chartBar1"></canvas>
                   		</div>
                	</div>
                </div>
		  	</div>	
		  	<div class="col-md-4">
		  		<div class="row">
		  			<div class="col-md-6">
		  				<div class="card h-100 border-primary">		    
				      		<div class="card-body">
				        		<h5 class="card-title"><?php echo $proses_in; ?></h5>
				        		<p class="card-text">Container.</p>
				      		</div>
				      		<div class="card-footer bg-primary">
				        		<small class="text-white fs-6">Process In</small>
				      		</div>
				    	</div>
		  			</div>
		  			<div class="col-md-6">
		  				<div class="card h-100 border-success">		    
				      		<div class="card-body">
				        		<h5 class="card-title"><?php echo $in_stok; ?></h5>
				        		<p class="card-text">Container.</p>
				      		</div>
				      		<div class="card-footer bg-success">
				        		<small class="text-white fs-6">In Stok</small>
				      		</div>
				    	</div>
		  			</div>
		  		</div>
		  		<br />
		  		<div class="row">
		  			<div class="col-md-6">
		  				<div class="card h-100 border-warning">		    
				      		<div class="card-body">
				        		<h5 class="card-title"><?php echo $proses_out; ?></h5>
				        		<p class="card-text">Container.</p>
				      		</div>
				      		<div class="card-footer bg-warning">
				        		<small class="text-white fs-6">Process Out</small>
				      		</div>
				    	</div>
		  			</div>
		  			<div class="col-md-6">
		  				<div class="card h-100 border-danger">		    
				      		<div class="card-body">
				        		<h5 class="card-title"><?php echo $out; ?></h5>
				        		<p class="card-text">Container.</p>
				      		</div>
				      		<div class="card-footer bg-danger">
				        		<small class="text-white fs-6">Out</small>
				      		</div>
				    	</div>
		  			</div>
		  		</div>
		  		<br />
		  		<div class="row">
		  			<div class="col-md-12">
		  				
		  			</div>
		  		</div>
		    	
		  	</div>
		</div>
    </main>

