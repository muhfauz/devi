<footer class="main-footer bg-facebook text-white">
  <div class="pull-right hidden-xs text-white">
    <?php echo $this->db->query("select * from tbl_judul where kd_judul='1'")->row()->oleh; ?>
  </div>

  <?php echo $this->db->query("select * from tbl_judul where kd_judul='1'")->row()->judul; ?>

</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

<!-- v4.0.0-alpha.6 -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- template -->
<script src="<?php echo base_url() ?>assets/js/niche.js"></script>

<!-- Morris JavaScript -->
<script src="<?php echo base_url() ?>assets/plugins/raphael/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/morris/morris.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/functions/dashboard1.js"></script>

<!-- DataTable -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>

<script src="<?php echo base_url() ?>assets/plugins/table-expo/filesaver.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/table-expo/xls.core.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/table-expo/tableexport.js"></script>
<script>
  $("tablex").tableExport({
    formats: ["xlsx", "xls", "csv", "txt"],
  });
</script>
</body>

</html>