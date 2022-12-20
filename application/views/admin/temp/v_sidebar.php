<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <?php
      $kd_admin = $this->session->userdata('kd_admin');

      ?>
      <?php if ($this->session->userdata('posisi') == 'Administrator') { ?>
        <div class="image text-center"><img src="<?php echo base_url() ?>gambar/<?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->gambar_admin ?>" class="img-circle" alt="User Image"> </div>
      <?php } elseif ($this->session->userdata('posisi') == 'service') { ?>
        <div class="image text-center"><img src="<?php echo base_url() ?>gambar/<?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->gambar_admin ?>" class="img-circle" alt="User Image"> </div>
      <?php } else { ?>
        <div class="image text-center"><img src="<?php echo base_url() ?>gambar/<?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->gambar_admin ?>" class="img-circle" alt="User Image"> </div>
      <?php } ?>

      <div class="info">
        <?php if ($this->session->userdata('posisi') == 'Administrator') { ?>
          <p>
            <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?>
          </p>
          <p>ADMINISTRATOR</p>
        <?php } elseif ($this->session->userdata('posisi') == 'service') { ?>
          <p>
            <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?>
          </p>
          <p>ADMIN SERVICE</p>
        <?php } else { ?>
          <p>
            <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?>
          </p>
          <p>ADMIN SALES</p>
        <?php } ?>

        <a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-power-off"></i></a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">PERSONAL</li>
      <li> <a href="<?php echo base_url('welcome') ?>"> <i class="fa fa-home mr-2"></i> <span>Home</span> <span class="pull-right-container"> </span> </a> </li>
      <?php if ($this->session->userdata('posisi') == 'Administrator') { ?>
        <li class="treeview"> <a href="#"> <i class="fa fa-database mr-2"></i> <span>Master</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/master/admin') ?>"> <i class="fa fa-user-o mr-1"></i>Data Admin</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/master/jam') ?>"> <i class="fa fa-clock-o mr-1"></i>Data Jam</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/master/lapangan') ?>"> <i class="fa fa-futbol-o mr-1"></i>Data Lapangan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/master/penyewa') ?>"> <i class="fa fa-users mr-1"></i>Data Penyewa</a></li>

          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-retweet mr-2"></i> <span>Data Penyewaan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/email/email') ?>"> <i class="fa fa-envelope-o mr-1"></i>Data Email</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/email/facebook') ?>"> <i class="fa fa-facebook-official mr-1"></i>Facebook</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/email/instagram') ?>"> <i class="fa fa-instagram mr-1"></i>Instagram</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/email/hosting') ?>"> <i class="fa fa-server mr-1"></i>Hosting Domain</a></li>

          </ul>
        </li>




        <!-- <li class="header">Pengaturan</li> -->
        <li class="treeview"> <a href="#"> <i class="fa fa-cogs mr-2"></i><span>Pengaturan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/judul') ?>"> <i class="fa fa-user-o mr-1"></i>Judul</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/perush') ?>"> <i class="fa fa-building mr-1"></i>Data Perusahaan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/logo') ?>"> <i class="fa fa-image mr-1"></i>Logo Perusahaan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/gantipas') ?>"> <i class="fa fa-image mr-1"></i>Ganti Passwordr</a></li>

          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-file-pdf-o mr-2"></i><span>Laporan Penyewaan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/laporan/lgaji') ?>"> <i class="fa fa-history mr-1"></i>Gaji Karyawan</a></li>
          </ul>
        </li>

      <?php } elseif ($this->session->userdata('posisi') == 'service') { ?>
        <li class="treeview"> <a href="#"><i class="fa fa-car mr-2" aria-hidden="true"></i><span>Input Service</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/transaksi/service') ?>"><i class="fa fa-chevron-circle-right mr-2" aria-hidden="true"></i>Input Service</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/transaksi/service') ?>"><i class="fa fa-chevron-circle-right mr-2" aria-hidden="true"></i>History Service</a></li>

          </ul>
        </li>

        <li class="treeview"> <a href="#"><i class="fa fa-cogs mr-2" aria-hidden="true"></i><span>Pengaturan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/datadiri') ?>"><i class="fa fa-user mr-2" aria-hidden="true"></i>Data Diri</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/gantipassadmin') ?>"><i class="fa fa-key mr-2" aria-hidden="true"></i>Ganti Password</a></li>

          </ul>
        </li>

      <?php } else { ?>

        <li class="treeview"> <a href="#"><i class="fa fa-shopping-basket mr-2" aria-hidden="true"></i><span> Penjualan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/transaksi/penjualan') ?>"><i class="fa fa-chevron-circle-right mr-2" aria-hidden="true"></i>Input Penjualan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/transaksi/penjualan') ?>"><i class="fa fa-chevron-circle-right mr-2" aria-hidden="true"></i>History Service</a></li>

          </ul>
        </li>

        <li class="treeview"> <a href="#"><i class="fa fa-cogs mr-2" aria-hidden="true"></i><span>Pengaturan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/datadiri') ?>"><i class="fa fa-user mr-2" aria-hidden="true"></i>Data Diri</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/gantipassadmin') ?>"><i class="fa fa-key mr-2" aria-hidden="true"></i>Ganti Password</a></li>

          </ul>
        </li>
      <?php } ?>

      <li>
        <a href="<?php echo base_url('login/logout') ?>"> <i class="fa fa-power-off "></i> <span>Keluar</span> <span class="pull-right-container"> </span> </a>
      </li>
    </ul>
  </div>
  <!-- /.sidebar -->
</aside>