<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"> <i class="fa fa-user"></i> <?php echo $x1; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">


    <div class="info-box">
      <h4 class="text-primary"><i class="fa fa-user"></i> <?php echo $x1; ?></h4>
      <p></p>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <a href="<?php echo base_url('admin/laporan/lpaket/laporan_pdf_paket') ?>" class="btn btn-secondary mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a>
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class="bg-aqua">
            <tr>
              <th class="text-center text-white" width="10px">No</th>
              <th class="text-center text-white">Kode paket</th>
              <th class="text-center text-white">Nama Paket</th>
              <th class="text-center text-white">Detail Paket</th>
              <th class="text-center text-white">Harga Paket</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($paket as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $a->kd_paket ?></td>
                <td><?php echo $a->nama_paket ?></td>
                <td><?php echo $a->detail_paket ?></td>
                <td><?php echo $a->harga_paket ?></td>

              </tr>
            <?php endforeach ?>

        </table>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<!-- <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/master/admin/aksitambahadmin') ?>" method="post">
          <div class="form-group">
            <label for="">Nama</label>
            <input name="nama_admin" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input name="username_admin" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input name="password_admin" type="password" class="form-control" required>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal detail -->


<!-- akhir detail -->
<!-- modal detail -->


<!-- akhir detail -->

<!-- Modal -->