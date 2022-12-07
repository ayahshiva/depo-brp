    
        </div>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <p class="text-center text-muted">&copy; <?=  date('Y'); ?> PT. BAHARI RAHARJA PERMAI</p>
        </footer>
    </div>

    <!-- Typehead -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

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