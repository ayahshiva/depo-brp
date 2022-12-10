	<style>
        
        #rowAdder {
            margin-left: 17px;
        }
    </style>
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

		<!-- Breadcrmb -->
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        	<h1 class="h2">Tambah Container</h1>
        	<div class="btn-toolbar mb-2 mb-md-0">
          	<div class="btn-group me-2">
          		<nav aria-label="breadcrumb">
  						<ol class="breadcrumb">
    						<li class="breadcrumb-item"><a href="<?= site_url('list_out'); ?>" >List Out</a></li>  
    						<li class="breadcrumb-item">Form Tambah Container</li>
  						</ol>
					</nav>            
          	</div>
        	</div>
      </div>

      	<!-- Content -->
      <div class="container-fluid">
      	<div class="row">
      		<form class="row gy-2 gx-3 align-items-center needs-validation" action="<?php echo site_url('list_out/simpan_container'); ?>" method="post" novalidate>
      			<div class="row">
				  	<div class="col-sm-4">
				    	<label class="form-label" for="autoSizingInput">EMKL</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->nama_emkl; ?>" disabled>
				    	<input type="hidden" name="id_emkl" value="<?php echo $view->id_emkl; ?>">
				  	</div>
				  	<div class="col-sm-3">
				    	<label class="form-label" for="autoSizingInput">Vessel</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->nama_vessel; ?>" disabled>
				    	<input type="hidden" name="id_vessel" value="<?php echo $view->id_vessel; ?>">
				  	</div>
				  	<div class="col-sm-3">
				    	<label class="form-label" for="autoSizingInput">No Voyage</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->no_voyage; ?>" disabled>
				    	<input type="hidden" name="id_move_out" value="<?php echo $this->uri->segment(3); ?>">
				  	</div>
				  	<div class="col-sm-2">
				    	<label class="form-label" for="autoSizingInput">Jumlah</label>
				    	<input type="text" class="form-control" id="autoSizingInput" value="<?php echo $view->jumlah; ?>" disabled>
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
						<a href="<?php echo site_url('list_out/view_list_out/'); ?><?php echo $this->uri->segment(3); ?>" class="btn btn-danger">Batal</a>
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
					'<div class="col-sm-3">' +
						'<select name="id_container[]" class="form-control select2" id="select2" required>' +
							'<option selected disabled value="">Pilih Container</option>' +
							'<?php foreach ($get_container as $row) : ?>' +
								'<option value="<?php echo $row->id; ?>"><?php echo $row->no_cont; ?></option> ' +
							'<?php endforeach ?>' +
						'</select>' +						
						'<div class="invalid-feedback">Harap diisi!</div>' +
					'</div>' +
					'<div class="col-sm-3">' +
						'<input type="text" name="seal_no[]" class="form-control" placeholder="Seal Number" required>' +
						'<div class="invalid-feedback">Harap diisi!</div>' +
					'</div>' +				
					'<div class="col-sm-2">'+
						'<select name="status[]" class="form-control form-select" required>'+
							'<option value="">Pilih Status</option>'+
                            '<option value="-"> - </option>'+
                            '<option value="MT">MT</option>'+
                            '<option value="OP">OP</option>'+
                            '<option value="FCL">FCL</option>'+
						'</select>'+
						'<div class="invalid-feedback">Harap pilih salah satu!</div>'+
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


        $('#select2').select2({
	        dropdownParent: $('#newinput')
	    });
		
	</script>