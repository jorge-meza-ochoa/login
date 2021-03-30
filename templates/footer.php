</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo URL ?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo URL ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo URL ?>public/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URL ?>public/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo URL ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL ?>public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo URL ?>public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo URL ?>public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

</body>
</html>

<script>
  $(document).on('click','.logout',function(e){
    url = "<?php echo URL ?>sources/logout.php";
    $.getJSON(url,{},function(data){
     Swal.fire({
     icon: data.icon,
     title: data.title,
     text: data.text,
     timer : 3000,
     showConfirmButton : false
      });
     setTimeout(function() {
      window.location.href="<?php echo URL ?>";
     }, 3000);
    });


  e.preventDefault();
  });
</script>
