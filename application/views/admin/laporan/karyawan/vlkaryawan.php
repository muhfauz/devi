<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"> <i class="fa fa-bullseye"></i> <?php echo $x1; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">


    <div class="info-box">
      <h4 class="text-primary"><i class="fa fa-bullseye"></i> <?php echo $x1; ?></h4>
      <p></p>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <a href="<?php echo base_url('admin/laporan/lkaryawan/laporan_pdf_karyawan') ?>" class="btn btn-secondary bg-aqua-gradient mb-2 text-center"> <i class="fa fa-print mr-2"></i>Cetak PDF</a>
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class=" bg-aqua-gradient">
            <tr>
              <th class="text-center text-white" width="10px">No</th>
              <th class="text-center text-white">Kode karyawan</th>
              <th class="text-center text-white">Nama karyawan</th>
              <th class="text-center text-white">Alamat karyawan</th>
              <th class="text-center text-white">Nomor HP</th>
              <th class="text-center text-white">Bagian</th>
              <th class="text-center text-white">Username</th>


            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($karyawan as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $a->kd_karyawan ?></td>
                <td><?php echo $a->nama_karyawan ?></td>
                <td><?php echo $a->alamat_karyawan ?></td>
                <td><?php echo $a->nohp_karyawan ?></td>
                <td><?php echo $a->nama_bagian ?></td>
                <td><?php echo $a->username_karyawan ?></td>

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
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-bullseye-circle-o mr-2"></i> Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('karyawan/master/karyawan/aksitambahkaryawan') ?>" method="post">
          <div class="form-group">
            <label for="">Nama</label>
            <input name="nama_karyawan" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input name="username_karyawan" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input name="password_karyawan" type="password" class="form-control" required>
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
<?php foreach ($karyawan as $a) : ?>
  <div class="modal fade" id="datadetail<?php echo $a->kd_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-bullseye-circle-o mr-2"></i> Detail Data karyawan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-borderless">
            <tr>
              <th>Nama karyawan</th>
              <td><?php echo $a->nama_karyawan ?></td>
            </tr>
            <tr>
              <th>Username karyawan</th>
              <td><?php echo $a->username_karyawan ?></td>
            </tr>
            <tr>
              <th>Ratting</th>
              <td>
                <div style="color:gold">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-alt"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
              </td>
            </tr>
          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- akhir detail -->
<!-- modal detail -->
<?php foreach ($karyawan as $a) : ?>


  <div class="modal fade" id="hapusdata<?php echo $a->kd_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-bullseye-circle-o mr-2"></i> Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('karyawan/master/karyawan/hapuskaryawan') ?>" method="post">
            <div class="form-group">
              Apakah Anda Yakin akan menghapus data ini ?
              <!-- <label for="">Nama</label>
                  <input name="nama_karyawan" type="text" class="form-control" value="<?php echo $a->nama_karyawan ?>" required> -->
              <input name="kd_karyawan" type="hidden" class="form-control" value="<?php echo $a->kd_karyawan ?>" required>
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- akhir detail -->

<!-- Modal -->
<?php foreach ($karyawan as $a) : ?>


  <div class="modal fade" id="editdata<?php echo $a->kd_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-bullseye-circle-o mr-2"></i> Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('karyawan/master/karyawan/aksieditkaryawan') ?>" method="post">
            <div class="form-group">
              <label for="">Nama</label>
              <input name="nama_karyawan" type="text" class="form-control" value="<?php echo $a->nama_karyawan ?>" required>
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input name="username_karyawan" type="text" class="form-control" value="<?php echo $a->username_karyawan ?>" required>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-save mr-2"></i>Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?> -->