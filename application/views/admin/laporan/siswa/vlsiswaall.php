<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"> <i class="fa fa-graduation-cap"></i> <?php echo $x1; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">


    <div class="info-box">
      <h4 class="text-primary"><i class="fa fa-graduation-cap"></i> <?php echo $x1; ?></h4>
      <p></p>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <a href="<?php echo base_url('admin/laporan/lsiswa/laporan_pdf_siswaall') ?>" class="btn btn-secondary bg-aqua-gradient mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a>
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class=" bg-aqua-gradient">
            <tr>
              <th class="text-center text-white" width="10px">No</th>
              <th class="text-center text-white">Nama</th>
              <th class="text-center text-white">Nomor Induk</th>
              <th class="text-center text-white">NISN</th>
              <th class="text-center text-white">Kelas</th>
              <th class="text-center text-white">Alamat</th>
              <th class="text-center text-white">Ayah</th>
              <th class="text-center text-white">Ibu</th>
              <th class="text-center text-white">No Telp</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($siswa as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $a->nama_siswa ?></td>
                <td><?php echo $a->nis ?></td>
                <td><?php echo $a->nisn ?></td>
                <td><?php echo $a->tingkat . ' ' . $a->kelas ?> </td>
                <td><?php echo $a->alamat_siswa ?></td>
                <td><?php echo $a->nama_ayah ?></td>
                <td><?php echo $a->nama_ibu ?></td>
                <td><?php echo $a->nohp_ayah ?></td>

              </tr>
            <?php endforeach ?>

        </table>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->