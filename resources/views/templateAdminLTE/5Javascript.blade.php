
<!-- jQuery -->
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}">
</script>
<!-- AdminLTE App -->
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/dist/js/pages/dashboard.js')}}"></script> -->
<!-- Datatables -->
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('TemplateAdmin/AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
@stack('js')
</body>

</html>
