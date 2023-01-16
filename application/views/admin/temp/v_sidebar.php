<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <?php
      $kd_admin = $this->session->userdata('kd_admin');
      $kd_penyewa = $this->session->userdata('kd_penyewa');

      ?>
      <?php if ($this->session->userdata('posisi') == 'Administrator') { ?>
        <div class="image text-center"><img src="<?php echo base_url() ?>gambar/<?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->gambar_admin ?>" class="img-circle" alt="User Image"> </div>
      <?php } else { ?>
        <div class="image text-center"><img src="<?php echo base_url() ?>gambar/<?php echo $this->db->query("select * from tbl_penyewa where kd_penyewa='$kd_penyewa'")->row()->gambar_penyewa ?>" class="img-circle" alt="User Image"> </div>
      <?php } ?>

      <div class="info">
        <?php if ($this->session->userdata('posisi') == 'Administrator') { ?>
          <p>
            <?php echo $this->db->query("select * from tbl_admin where kd_admin='$kd_admin'")->row()->nama_admin ?>
          </p>
          <p>ADMINISTRATOR</p>

        <?php } else { ?>
          <p>
            <?php echo $this->db->query("select * from tbl_penyewa where kd_penyewa='$kd_penyewa'")->row()->nama_penyewa ?>
          </p>
          <p>PENYEWA</p>
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
            <li class="ml-4"><a href="<?php echo base_url('admin/penyewaan/penyewaan') ?>"> <i class="fa fa-renren mr-1"></i>Input Penyewaan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/penyewaan/penyewaanok') ?>"> <i class="fa fa-user-circle-o mr-1"></i>Penyewaan</a></li>


          </ul>
        </li>




        <!-- <li class="header">Pengaturan</li> -->
        <li class="treeview"> <a href="#"> <i class="fa fa-cogs mr-2"></i><span>Pengaturan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/judul') ?>"> <i class="fa fa-user-o mr-1"></i>Judul</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/perush') ?>"> <i class="fa fa-building mr-1"></i>Data Perusahaan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/logo') ?>"> <i class="fa fa-image mr-1"></i>Logo Perusahaan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/slider') ?>"> <i class="fa fa-image mr-1"></i>Slider</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/deskripsi/tentang') ?>"> <i class="fa fa-image mr-1"></i>Tentang Kami</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/faq') ?>"> <i class="fa fa-image mr-1"></i>FAQ</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/rekening') ?>"> <i class="fa fa-image mr-1"></i>Rekening</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/gantipas') ?>"> <i class="fa fa-image mr-1"></i>Ganti Passwordr</a></li>

          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-file-pdf-o mr-2"></i><span>Laporan Penyewaan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/laporan/ladmin') ?>"> <i class="fa fa-history mr-1"></i> Admin</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/laporan/lpenyewa') ?>"> <i class="fa fa-history mr-1"></i> Penyewa</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/laporan/lpenyewaan/pilih') ?>"> <i class="fa fa-history mr-1"></i> Penyewaan</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/laporan/lpenyewaanperiode/pilih') ?>"> <i class="fa fa-history mr-1"></i> Penyewaan Periode</a></li>
          </ul>
        </li>

      <?php } else { ?>

        <li class="treeview"> <a href="#"><i class="fa fa-shopping-basket mr-2" aria-hidden="true"></i><span> Sewa Lapangan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/penyewaan/sewauser/pilih') ?>"><i class="fa fa-chevron-circle-right mr-2" aria-hidden="true"></i>Sewa</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/penyewaan/historysewa') ?>"><i class="fa fa-chevron-circle-right mr-2" aria-hidden="true"></i>History Sewa</a></li>

          </ul>
        </li>

        <li class="treeview"> <a href="#"><i class="fa fa-cogs mr-2" aria-hidden="true"></i><span>Pengaturan</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/datadiri') ?>"><i class="fa fa-user mr-2" aria-hidden="true"></i>Data Diri</a></li>
            <li class="ml-4"><a href="<?php echo base_url('admin/pengaturan/gantipasspenyewa') ?>"><i class="fa fa-key mr-2" aria-hidden="true"></i>Ganti Password</a></li>

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