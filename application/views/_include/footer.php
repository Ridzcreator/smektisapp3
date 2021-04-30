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
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('vendor/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('vendor/AdminLTE/dist/js/demo.js') ?>"></script>
    <!-- Page specific script -->
    <!-- Select2 -->
    <script src="<?php echo base_url('vendor/AdminLTE/plugins/select2/js/select2.full.min.js') ?>"></script>
    <script>
      $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#barang_table").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["colvis"]
        }).buttons().container().appendTo('#barang_table_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    </body>

    </html>