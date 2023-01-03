<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <?php
    $kd_admin = $this->session->userdata('kd_admin');
    $kd_penyewa = $this->session->userdata('kd_penyewa');

    ?>
    <?php if ($this->session->userdata('posisi') == 'Administrator') { ?>

      <h4 class="fa fa-home" aria-hidden="true"> Selamat Datang, <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?> [ADMINISTRATOR]</h4>

    <?php } else { ?>
      <h4 class="fa fa-home" aria-hidden="true"> Selamat Datang, <?php echo $this->db->query("select * from tbl_penyewa where kd_penyewa='$kd_penyewa'")->row()->nama_penyewa ?> [PENYEWA]</h4>
    <?php } ?>


    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><i class="fa fa-angle-right"></i>Home</li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">
    <!-- Small boxes (Stat box) -->
    <?php if ($this->session->userdata('posisi') == 'Administrator') { ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/master/admin') ?>">
            <div class="info-box"> <span class="info-box-icon bg-blue-active "><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number">Data Admin</span> <span class="info-box-text"><?php echo $this->db->query("select * from tbl_admin")->num_rows() ?> admin </span> </div>
              <!-- /.info-box-content -->
            </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/master/jam') ?>">
            <div class="info-box"> <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>
              <div class="info-box-content"> <span class="info-box-number">Data Jam</span> <span class="info-box-text"><?php echo $this->db->query("select * from tbl_jam")->num_rows() ?> jam</span></div>
              <!-- /.info-box-content -->
            </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/master/lapangan') ?>">
            <div class="info-box"> <span class="info-box-icon bg-black"><i class="fa fa-futbol-o"></i></span>
              <div class="info-box-content"> <span class="info-box-number">Lapangan</span> <span class="info-box-text"><?php echo $this->db->query("select * from tbl_lapangan")->num_rows() ?> lapangan </span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/master/penyewa') ?>">
            <div class="info-box"> <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number "> Penyewa </span> <span class="info-box-text"><?php echo $this->db->query("select * from tbl_penyewa")->num_rows() ?> </span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->


    <?php } else { ?>

      <!-- apoteker -->

      <div class="row">

        <!-- /.col -->

        <!-- /.col -->


        <div class="col-lg-3 col-xs-6">


          <a href="<?php echo base_url('admin/pengaturan/datadiri') ?>">
            <div class="info-box"> <span class="info-box-icon bg-blue"><i class="fa fa-user text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number "> Data Diri</span> <span class="info-box-text">Data Diri Saya</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>

        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/penyewaan/sewauser/pilih') ?>">
            <div class="info-box"> <span class="info-box-icon bg-info"><i class="fa fa-wpexplorer text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> Sewa</span> <span class="info-box-text">Lihat</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/penyewaan/historysewa') ?>">
            <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="fa fa-file-archive-o text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> History Sewa</span> <span class="info-box-text">Lihat</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/pengaturan/gantipasspenyewa') ?>">
            <div class="info-box"> <span class="info-box-icon bg-danger"><i class="fa fa-key text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> Ganti </span> <span class="info-box-text">Password</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>

        <!-- /.col -->

        <!-- /.col -->

        <!-- /.col -->
      </div>



      <!-- keuangan -->



      <!-- pajak -->


      <!-- penjualan -->




    <?php } ?>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->