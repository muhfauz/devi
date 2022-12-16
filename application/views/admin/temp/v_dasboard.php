<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <?php
    $kd_admin = $this->session->userdata('kd_admin');

    ?>
    <?php if ($this->session->userdata('posisi') == 'admin') { ?>

      <h4 class="fa fa-home" aria-hidden="true"> Selamat Datang, <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?> [ADMINISTRATOR]</h4>
    <?php } elseif ($this->session->userdata('posisi') == 'service') { ?>
      <h4 class="fa fa-home" aria-hidden="true"> Selamat Datang, <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?> [ADMIN SERVICE]</h4>
    <?php } else { ?>
      <h4 class="fa fa-home" aria-hidden="true"> Selamat Datang, <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?> [ADMIN SALES]</h4>
    <?php } ?>


    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><i class="fa fa-angle-right"></i>Home</li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">
    <!-- Small boxes (Stat box) -->
    <?php if ($this->session->userdata('posisi') == 'admin') { ?>
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
          <a href="<?php echo base_url('admin/master/jabatan') ?>">
            <div class="info-box"> <span class="info-box-icon bg-green"><i class="fa fa-star"></i></span>
              <div class="info-box-content"> <span class="info-box-number">Jabatan</span> <span class="info-box-text"><?php echo $this->db->query("select * from tbl_jabatan")->num_rows() ?> jabatan</span></div>
              <!-- /.info-box-content -->
            </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/master/karyawan') ?>">
            <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
              <div class="info-box-content"> <span class="info-box-number">Karyawan</span> <span class="info-box-text"><?php echo $this->db->query("select * from tbl_karyawan")->num_rows() ?> karyawan </span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/master/mobil') ?>">
            <div class="info-box"> <span class="info-box-icon bg-red"><i class="fa fa-car" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number "> Mobil </span> <span class="info-box-text"><?php echo $this->db->query("select * from tbl_mobil")->num_rows() ?> </span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    <?php } elseif ($this->session->userdata('posisi') == 'service') { ?>
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
          <a href="<?php echo base_url('admin/transaksi/service/') ?>">
            <div class="info-box"> <span class="info-box-icon bg-info"><i class="fa fa-wpexplorer text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-bo-number"> Input Service </span> <span class="info-box-text">Lihat</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/seleksi/seleksihrd/arsiservice') ?>">
            <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="fa fa-file-archive-o text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> Arsip</span> <span class="info-box-text">Service</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/pengaturan/gantipassadmin') ?>">
            <div class="info-box"> <span class="info-box-icon bg-danger"><i class="fa fa-key text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> Ganti</span> <span class="info-box-text">Password</span></div>
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
          <a href="<?php echo base_url('admin/transaksi/penjualan/') ?>">
            <div class="info-box"> <span class="info-box-icon bg-info"><i class="fa fa-wpexplorer text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> Input Penjualan</span> <span class="info-box-text">Lihat</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/seleksi/seleksipelamar/arsippelamar') ?>">
            <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="fa fa-file-archive-o text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> Arsipku</span> <span class="info-box-text">Lihat</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <div class="col-lg-3 col-xs-6">
          <a href="<?php echo base_url('admin/pengaturan/gantipassadmin') ?>">
            <div class="info-box"> <span class="info-box-icon bg-danger"><i class="fa fa-key text-white" aria-hidden="true"></i></span>
              <div class="info-box-content"> <span class="info-box-number"> Ganti</span> <span class="info-box-text">Password</span></div>
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