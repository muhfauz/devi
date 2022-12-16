<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"> <i class="fa fa-fighter-jet"></i> <?php echo $x1; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">


    <div class="info-box">
      <h4 class="text-primary"><i class="fa fa-fighter-jet"></i> <?php echo $x1; ?></h4>
      <p><?php echo $nama_perush; ?></p>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <!-- <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata" > <i class="fa fa-plus-square mr-2" ></i> Tambah Data</a> -->
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class="bg-aqua">
            <tr>
              <th class="text-center text-white" width="10px">No</th>
              <th class="text-center text-white" width="400px">Nama Pendaftaran</th>
              <th class="text-center text-white">Tanggal Pendaftaran</th>
              <th class="text-center text-white">Tanggal Penutupan</th>
              <th class="text-center text-white">Tanggal Seleksi</th>
              <th class="text-center text-white">Tanggal Pengumuman</th>
              <th class="text-center text-white">Besar Biaya</th>
              <th class="text-center text-white" width="200px">Status</th>
              <th class="text-center text-white" width="200px"></th>

            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($pendaftaran as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td><?php echo $a->nama_pendaftaran ?></td>
                <td><?php echo $this->Mglobal->tanggalindo($a->tgl_pendaftaran) ?></td>
                <td><?php echo $this->Mglobal->tanggalindo($a->tgl_penutupan) ?></td>
                <td><?php echo $this->Mglobal->tanggalindo($a->tgl_seleksi) ?></td>
                <td><?php echo $this->Mglobal->tanggalindo($a->tgl_pengumuman) ?></td>
                <td><?php echo $a->besar_biaya ?></td>
                <td><?php echo $a->status_pendaftaran ?></td>

                <td class="float-right">
                  <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_pendaftaran ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a> -->
                  <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_pendaftaran ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                  <!-- <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_jadwal ?>" > <i class="fa fa-trash mr-2" ></i> Hapus</a> -->
                </td>
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
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('jadwal/master/jadwal/aksitambahjadwal') ?>" method="post">
          <div class="form-group">
            <label for="">Nama</label>
            <input name="nama_jadwal" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input name="username_jadwal" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input name="password_jadwal" type="password" class="form-control" required>
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
<?php foreach ($pendaftaran as $a) : ?>


  <div class="modal fade" id="editdata<?php echo $a->kd_pendaftaran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-fighter-jet mr-2"></i> Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/pengaturan/jadwal/aksieditjadwal') ?>" method="post">
            <div class="form-group">
              <label for="">Nama</label>
              <input name="nama_pendaftaran" type="text" class="form-control" value="<?php echo $a->nama_pendaftaran ?>" required>
              <input name="kd_pendaftaran" type="hidden" class="form-control" value="<?php echo $a->kd_pendaftaran ?>" required>
            </div>
            <div class="form-group">
              <label for="">Tanggal Pendaftaran</label>
              <input name="tgl_pendaftaran" type="date" class="form-control" value="<?php echo $a->tgl_pendaftaran ?>" required>
            </div>
            <div class="form-group">
              <label for="">Tanggal Seleksi</label>
              <input name="tgl_seleksi" type="date" class="form-control" value="<?php echo $a->tgl_seleksi ?>" required>
            </div>
            <div class="form-group">
              <label for="">Tanggal Pengumuman</label>
              <input name="tgl_pengumuman" type="date" class="form-control" value="<?php echo $a->tgl_pengumuman ?>" required>
            </div>
            <div class="form-group">
              <label for="">Tanggal Penutupan</label>
              <input name="tgl_penutupan" type="date" class="form-control" value="<?php echo $a->tgl_penutupan ?>" required>
            </div>
            <div class="form-group">
              <label for="">Total Biaya</label>
              <input name="besar_biaya" type="number" class="form-control" value="<?php echo $a->besar_biaya ?>" required>
            </div>
            <div class="form-group">
              <label for="">Status</label>

              <select name="status_pendaftaran" class="form-control" required>
                <option value="<?= $a->status_pendaftaran ?>"><?= $a->status_pendaftaran ?></option>
                <option value="buka">Buka</option>
                <option value="tutup">Tutup</option>
              </select>
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
<?php endforeach; ?>