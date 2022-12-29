    
        </div>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <p class="text-center text-muted">&copy; <?=  date('Y'); ?> PT. BAHARI RAHARJA PERMAI</p>
        </footer>
    </div>

    <!-- Typehead -->
    <script src="<?php echo base_url('assets/js/bootstrap3-typeahead.min.js'); ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>

    <!-- Feather Icon -->
    <script src="<?php echo base_url('assets/js/feather.min.js'); ?>"></script>

    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/js/Chart.min.js'); ?>"></script>

    <!-- Datatable -->
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/js/dataTables.bootstrap5.min.js'); ?>"></script>

    <!-- Custom JS -->    
    <script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>

    <?php $this->load->view('include/sweetalert_js.php'); ?>
    <?php $this->load->view('include/datatables.php'); ?>
    <?php $this->load->view('include/modal_js.php'); ?>

    <script>
        $(function() {
            $(document).ready(function(){
                $( "#no_cont" ).autocomplete({
                  source: "<?php echo site_url('dashboard/nomorContainer/?');?>"
                });
            });
        });
    </script>

    </body>
</html>