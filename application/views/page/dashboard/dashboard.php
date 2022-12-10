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
      		<div class="col-md-3">
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
			<div class="col-md-3">
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
			<div class="col-md-3">
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
		  	<div class="col-md-3">
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
      	<hr />
      	<div class="row">
      		<div class="card">
				<div class="card-header">
					<div class="card-title fs-5">Data Container Per MLO</div>
                </div>
                <div class="card-body">
            		<div class="chart-container">
                    	<canvas id="chartBar1"></canvas>
                   	</div>
               	</div>
            </div>
		</div>				
    </main>

    <script>
        $(function() {
            const siteUrl = "<?php echo base_url();?>"
            $.ajax({
                url: siteUrl+'Dashboard/chartbar',
                dataType: 'json',
                method: 'get',
                success: function(data) {
                    //console.log(data);
                    var label = [];
                    var value = [];
                    for (var i in data) {
                        label.push(data[i].namamlo);
                        value.push(data[i].jumlahcontainer);
                    }
                    var ctx = document.getElementById("chartBar1").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'Jumlah Container per MLO',
                                data: value,
                                backgroundColor: ['#ffc107', '#198754', '#6f42c1', '#d63384', '#dc3545', '#fd7e14'],
                                hoverOffset: 4

                            }]
                        },
                        options: {
				            responsive: true,
				            //maintainAspectRatio: false,

				            scales: {
				                xAxes: [{
				                    ticks: {
				                        fontColor: "#9ba6b5",
				                    },
				                    display: true,
				                    gridLines: {
				                        color: 'rgba(119, 119, 142, 0.2)'
				                    }
				                }],
				                yAxes: [{
				                    ticks: {
				                        fontColor: "#9ba6b5",
				                    },
				                    display: true,
				                    gridLines: {
				                        color: 'rgba(119, 119, 142, 0.2)'
				                    },
				                    scaleLabel: {
				                        display: false,
				                        labelString: 'Thousands',
				                        fontColor: 'rgba(119, 119, 142, 0.2)'
				                    }
				                }]
				            },
				            legend: {
				                labels: {
				                    fontColor: "#9ba6b5"
				                },
				            },
				        }
                        
                    });
                }
            });
            
        });
    </script>

