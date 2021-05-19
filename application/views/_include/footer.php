<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <!-- <b>Version</b> 3.1.0-rc -->
    </div>
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io">BeeMovie</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('vendor/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/chart.js/Chart.min.js') ?>"></script>

<script src="<?php echo base_url('vendor/AdminLTE/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('vendor/AdminLTE/plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('vendor/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('vendor/AdminLTE/dist/js/demo.js') ?>"></script>
<!-- Page specific script -->
<!-- Select2 -->
<script src="<?php echo base_url('vendor/AdminLTE/plugins/select2/js/select2.full.min.js') ?>"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        $("#example").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["colvis"]
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        <?php 
        if (isset($kategoriByBulan)) {
         ?>

        var colorsRgba = [
            '23,162,184',
            '40,167,69',
            '255,193,7',
            '220,53,69',
        ];

        var colorsCode = [
            '#17a2b8',
            '#28a745',
            '#ffc107',
            '#dc3545',
        ];

        var kategoriByBulan = <?php echo $kategoriByBulan ? json_encode($kategoriByBulan) : null; ?>;
        var transaksiByKategori = <?php echo $transaksiByKategori ? json_encode($transaksiByKategori) : null; ?>;

        var bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        var labels = [];
        var kategori = [];
        var datasets = [];

        kategoriByBulan.forEach( function(element, index) {
            labels.push(bulan[parseInt(element.bulan) - 1]);
            element.kategori.split(", ").forEach( function(k, i) {
                if (!kategori.includes(k)) {
                    kategori.push(k);
                }
            });
        });

        var colorIndex = 0;

        kategori.forEach( function(kat, ki) {
            
            var data = [];
            kategoriByBulan.forEach( function(katBulan, kbi) {
                data.push(0);
                transaksiByKategori.forEach( function(trans, ti) {
                    if (trans.nama == kat && trans.bulan == katBulan.bulan) {
                        data[kbi] += trans.jumlah;
                    }
                });
            });

            var dataset = {
                label               : kat,
                backgroundColor     : 'rgba('+colorsRgba[colorIndex]+',0.9)',
                borderColor         : 'rgba('+colorsRgba[colorIndex]+',0.8)',
                pointRadius         : false,
                pointColor          : colorsCode[colorIndex],
                pointStrokeColor    : 'rgba('+colorsRgba[colorIndex]+',1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba('+colorsRgba[colorIndex]+',1)',
                data                : data
            };
            datasets.push(dataset);

            if (colorIndex++ > colorsCode.length) {
                colorIndex = 0;
            }
        });

        var barChartData = {
            labels  : labels,
            datasets: datasets
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, barChartData)
        var temp0 = barChartData.datasets[0]
        var temp1 = barChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        <?php } ?>

    });

    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            document.getElementById("date_start").value = start.format('YYYY-MM-DD');
            document.getElementById("date_end").value = end.format('YYYY-MM-DD');
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
</body>

</html>