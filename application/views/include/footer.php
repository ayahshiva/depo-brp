    
        </div>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <p class="text-center text-muted">&copy; <?=  date('Y'); ?> PT. BAHARI RAHARJA PERMAI</p>
        </footer>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!--Bootstrap JS -->    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <!-- Typehead -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

    <!-- Datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom JS -->    
    <script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>

    <?php $this->load->view('include/sweetalert_js.php'); ?>
    <?php $this->load->view('include/datatables.php'); ?>
    <?php $this->load->view('include/modal_js.php'); ?>

    <script type="text/javascript">
        $(function() {
            $(document).ready(function(){
                $( "#no_cont" ).autocomplete({
                  source: "<?php echo site_url('dashboard/nomorContainer/?');?>"
                });
            });

            const siteUrl = "<?php echo base_url();?>"
            $.ajax({
                url: siteUrl+'Dashboard/chartbar',
                dataType: 'json',
                method: 'get',
                success: function(data) {
                    console.log(data);
                    var label = [];
                    var value = [];
                    for (var i in data) {
                        label.push(data[i].namamlo);
                        value.push(data[i].jumlahcontainer);
                    }
                    var ctx = document.getElementById("chartBar1").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'Jumlah Container per MLO',
                                data: value,
                                backgroundColor: ['#ffc107', '#198754', '#6f42c1', '#d63384', '#dc3545', '#fd7e14'],
                                hoverOffset: 4

                            }]
                        },
                    });
                }
            });
            

        });
    </script>

    </body>
</html>