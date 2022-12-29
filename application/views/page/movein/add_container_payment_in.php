	<style>
        
        #rowAdder {
            margin-left: 17px;
        }
    </style>
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Input Container</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          	<div class="btn-group me-2">
          		<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('payment_in'); ?>" >Payment In</a></li>  
    						<li class="breadcrumb-item">Form Input Container</li>
  						</ol>
					</nav>            
          	</div>
        	</div>
      </div>

      	<!-- Content -->
      <div class="container-fluid">
      	<div class="row">
      		<form class="row gy-2 gx-3 align-items-center needs-validation" action="<?php echo site_url('payment_in/simpan_container'); ?>" method="post" novalidate>
      			<div class="row">
				  	<div class="col-sm-3">
				    	<label class="form-label" for="autoSizingInput">EMKL</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->emkl_nama; ?>" disabled>
				  	</div>
				  	<div class="col-sm-3">
				    	<label class="form-label" for="autoSizingInput">No Voyage</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->no_voyage; ?>" disabled>
				  	</div>
				  	
				  	<div class="col-sm-3">
				    	<label class="form-label" for="autoSizingInput">D/O Number</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->do_number; ?>" disabled>
				  	</div>
				  	<div class="col-sm-3">
				    	<label class="form-label" for="autoSizingInput">Jumlah</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->jml; ?>" disabled>
				    	<input type="hidden" name="id_payment_in" value="<?php echo $this->uri->segment(3); ?>">
				  	</div>
				</div>
				<hr />
				<br /><br />
				<div class="row" id="newinput"></div>
				<hr />
				<div class="row">
					<div class="col-auto">
						<button type="button" class="btn btn-success" id="rowAdder" title="Tambah Container">+<span>Tambah Container</span></button>
						<input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary">
						<a href="<?php echo site_url('payment_in/view_payment_in/'); ?><?php echo $this->uri->segment(3); ?>" class="btn btn-danger">Batal</a>
					</div>
				</div>
			</form>
      	</div>
      </div>	
      <hr />
   </main>

  	<script type="text/javascript">
   		$("#rowAdder").click(function () {
            newRowAdd =
            	'<div class="row" id="row">' + 
					'<div class="col-sm-6">' +
						'<input type="text" name="no_container[]" class="form-control cari-nomor" id="autocomplete" placeholder="Nomor Container" required>' +
						'<div class="invalid-feedback">Harap diisi!</div>' +
					'</div>'+
					
					'<div class="col-sm-1 text-center">'+
						'<button type="button" class="btn btn-danger" id="DeleteRow" title="Hapus Container">X</button>'+
					'</div>'+
				'</div>'+'<br /><br />';
 
            $('#newinput').append(newRowAdd);
        });
 
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        });
		
	</script>

	<script>
		$(document).on("focus", "#autocomplete", function(e) {
			if ( !$(this).data("autocomplete") ) {
			    $(this).autocomplete({            
			        source: "<?php echo site_url('dashboard/nomorContainer/?');?>"
			    });
			}
		});
	</script>