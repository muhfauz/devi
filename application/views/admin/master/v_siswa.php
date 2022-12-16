<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"> <i class="fa fa-safari"></i> <?php echo $x1; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">


    <div class="info-box">
      <h4 class="text-primary"><i class="fa fa-safari"></i> <?php echo $x1; ?></h4>
      <p><?php echo $nama_perush; ?></p>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <a href="" class="btn btn-primary bg-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Siswa</a>
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class=" bg-blue-gradient ">
            <tr>
              <th class="text-center text-white" width="10px">No</th>
              <th class="text-center text-white">Nama</th>
              <th class="text-center text-white">Nomor Induk</th>
              <th class="text-center text-white">NISN</th>
              <th class="text-center text-white">Kelas</th>
              <th class="text-center text-white">Alamat</th>
              <th class="text-center text-white" width="100px"></th>

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
                <td class="float-right">
                  <?php if ($a->kd_siswa == 'ADM001') { ?>
                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_siswa ?>"> <i class="fa fa-info mr-1 ml-1"></i></a>
                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_siswa ?>"> <i class="fa fa-edit mr-1 ml-1"></i></a>
                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_siswa ?>"> <i class="fa fa-trash mr-1 ml-1"></i></a>
                  <?php } else { ?>
                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_siswa ?>"> <i class="fa fa-info mr-1 ml-1"></i></a>
                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_siswa ?>"> <i class="fa fa-edit mr-1 ml-1"></i></a>
                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_siswa ?>"> <i class="fa fa-trash mr-1 ml-1"></i></a>
                  <?php } ?>

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
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-safari mr-2"></i> Form Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/master/siswa/aksitambahsiswa') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama</label>
            <input name="kd_siswa" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_siswa', 'tbl_siswa', 'SIS') ?>" required>
            <input name="nama_siswa" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nomor Induk </label>
            <input name="nis" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nomor Induk Siswa Nasional</label>
            <input name="nisn" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama Ayah</label>
            <input name="nama_ayah" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama Ibu</label>
            <input name="nama_ibu" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">No HP</label>
            <input name="nohp_ayah" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Alamat </label>
            <input name="alamat_siswa" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Tingkat </label>
            <select class="form-control" name="kd_tingkat" id="" required>
              <?php foreach ($tingkat as $t) { ?>
                <option value="<?php echo $t->kd_tingkat ?>"><?php echo $t->tingkat ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Kelas </label>
            <select class="form-control" name="kd_kelas" id="" required>
              <?php foreach ($kelas as $k) { ?>
                <option value="<?php echo $k->kd_kelas ?>"><?php echo $k->kelas ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Angkatan / Tahun Masuk </label>
            <select class="form-control" name="kd_tahunmasuk" id="" required>
              <?php foreach ($tahunmasuk as $tm) { ?>
                <option value="<?php echo $tm->kd_tahunmasuk ?>"><?php echo $tm->tahun_masuk ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Foto </label>
            <input name="gambar_siswa" type="file" class="form-control">
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
<?php foreach ($siswa as $a) : ?>
  <div class="modal fade" id="datadetail<?php echo $a->kd_siswa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-safari mr-2"></i> Detail Data siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-borderless">
            <tr>
              <th>Nama Siswa</th>
              <td><?php echo $a->nama_siswa ?></td>
            </tr>
            <tr>
              <th>Nomor Induk</th>
              <td><?php echo $a->nis ?></td>
            </tr>
            <tr>
              <th>Nomor Induk Siswa Nasional</th>
              <td><?php echo $a->nisn ?></td>
            </tr>
            <tr>
              <th>Kelas</th>
              <td><?php echo $a->tingkat . ' ' . $a->kelas ?></td>
            </tr>
            <tr>
              <th>Tahun masuk</th>
              <td><?php echo $a->tahun_masuk ?></td>
            </tr>
            <tr>
              <th>Alamat siswa</th>
              <td><?php echo $a->alamat_siswa ?></td>
            </tr>
            <tr>
              <th>Nama Ayah </th>
              <td><?php echo $a->nama_ayah ?></td>
            </tr>
            <tr>
              <th>Nama Ibu </th>
              <td><?php echo $a->nama_ibu ?></td>
            </tr>
            <tr>
              <th>No HP </th>
              <td><?php echo $a->nohp_ayah ?></td>
            </tr>
            <tr>
              <th>Foto</th>
              <td class="image text-center">
                <img width="100" height="100" src="<?php echo base_url('assets/img/fotosiswa/') . $a->gambar_siswa ?>" alt="">
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
<?php foreach ($siswa as $a) : ?>

  <div class="modal fade" id="hapusdata<?php echo $a->kd_siswa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-safari mr-2"></i> Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/master/siswa/hapussiswa') ?>" method="post">
            <div class="form-group">
              Apakah Anda Yakin akan menghapus data ini ?
              <!-- <label for="">Nama</label>
                  <input name="nama_siswa" type="text" class="form-control" value="<?php echo $a->nama_siswa ?>" required> -->
              <input name="kd_siswa" type="hidden" class="form-control" value="<?php echo $a->kd_siswa ?>" required>
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
<?php foreach ($siswa as $a) : ?>


  <div class="modal fade" id="editdata<?php echo $a->kd_siswa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-safari mr-2"></i> Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/master/siswa/aksieditsiswa') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Nama</label>
              <input name="kd_siswa" type="hidden" class="form-control" value="<?php echo $a->kd_siswa ?>" required>
              <input name="nama_siswa" type="text" class="form-control" value="<?php echo $a->nama_siswa ?>" required>
            </div>
            <div class="form-group">
              <label for="">Nomor Induk </label>
              <input name="nis" type="text" class="form-control" value="<?php echo $a->nis ?>" required>
            </div>
            <div class="form-group">
              <label for="">Nomor Induk Siswa Nasional</label>
              <input name="nisn" type="text" class="form-control" value="<?php echo $a->nisn ?>" required>
            </div>
            <div class="form-group">
              <label for="">Nama Ayah</label>
              <input name="nama_ayah" type="text" class="form-control" value="<?php echo $a->nama_ayah ?>" required>
            </div>
            <div class="form-group">
              <label for="">Nama Ibu</label>
              <input name="nama_ibu" type="text" class="form-control" value="<?php echo $a->nama_ibu ?>" required>
            </div>
            <div class="form-group">
              <label for="">No HP</label>
              <input name="nohp_ayah" type="text" class="form-control" value="<?php echo $a->nohp_ayah ?>" required>
            </div>
            <div class="form-group">
              <label for="">Alamat </label>
              <input name="alamat_siswa" type="text" class="form-control" value="<?php echo $a->alamat_siswa ?>" required>
            </div>
            <div class="form-group">
              <label for="">Tingkat </label>
              <select class="form-control" name="kd_tingkat" id="" required>
                <option value="<?php echo $a->kd_tingkat ?>"><?php echo $a->tingkat ?></option>
                <option value="">- PIlih -</option>
                <?php foreach ($tingkat as $t) { ?>
                  <option value="<?php echo $t->kd_tingkat ?>"><?php echo $t->tingkat ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Kelas </label>
              <select class="form-control" name="kd_kelas" id="" required>
                <option value="<?php echo $a->kd_kelas ?>"><?php echo $a->kelas ?></option>
                <option value="">- PIlih -</option>
                <?php foreach ($kelas as $k) { ?>
                  <option value="<?php echo $k->kd_kelas ?>"><?php echo $k->kelas ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Angkatan / Tahun Masuk </label>
              <select class="form-control" name="kd_tahunmasuk" id="" required>
                <option value="<?php echo $a->kd_tahunmasuk ?>"><?php echo $a->tahun_masuk ?></option>
                <option value="">- Pilih -</option>
                <?php foreach ($tahunmasuk as $tm) { ?>
                  <option value="<?php echo $tm->kd_tahunmasuk ?>"><?php echo $tm->tahun_masuk ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">

              <label for="">Foto</label>
              <br>
              <img width="100" height="100" src="<?php echo base_url('assets/img/fotosiswa/') . $a->gambar_siswa ?>" alt="">
              <br>
              <input name="gambar_siswa" type="file" class="form-control" value="">
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