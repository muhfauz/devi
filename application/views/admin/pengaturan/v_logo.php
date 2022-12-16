<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"> <i class="fa fa-building"></i> <?php echo $x1; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">


    <div class="info-box">
      <h4 class="text-primary"><i class="fa fa-building"></i> <?php echo $x1; ?></h4>
      <p><?php echo $nama_perush; ?></p>
      <div class="table-responsive">
        <?php echo $this->session->userdata('pesan'); ?>
        <!-- <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata" > <i class="fa fa-plus-square mr-2" ></i> Tambah Data</a> -->
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead class="bg-aqua">
            <tr>
              <th class="text-center text-white" width="10px">No</th>
              <th class="text-center text-white" width="400px">Logo Admin Besar</th>
              <th class="text-center text-white" width="10px"><i class="fa fa-cog font-weight-bold "></i></th>
              <th class="text-center text-white">Logo Admin Kecil</th>
              <th class="text-center text-white" width="10px"><i class="fa fa-cog font-weight-bold "></i></th>
              <th class="text-center text-white">Logo Home</th>
              <th class="text-center text-white" width="10px"></i></th>


            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($perush as $a) :  ?>
              <tr>
                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                <td>
                  <img src="<?php echo base_url() ?>assets/img/<?php echo $a->logob_perush ?>" alt="">
                </td>
                <td>
                  <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editlogob<?php echo $a->kd_perush ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                </td>
                <td><img src="<?php echo base_url() ?>assets/img/<?php echo $a->logok_perush ?>" alt=""></td>
                <td>
                  <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editlogok<?php echo $a->kd_perush ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                </td>
                </td>
                <td><img src="<?php echo base_url() ?>assets/img/<?php echo $a->logo_depan ?>" alt=""></td>
                <td>
                  <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editlogdepan<?php echo $a->kd_perush ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
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
        <form action="<?php echo base_url('perush/master/perush/aksitambahperush') ?>" method="post">
          <div class="form-group">
            <label for="">Nama</label>
            <input name="nama_perush" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input name="username_perush" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input name="password_perush" type="password" class="form-control" required>
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
<?php foreach ($perush as $a) : ?>
  <div class="modal fade" id="datadetail<?php echo $a->kd_perush ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-building mr-2"></i> Detail Data Perusahan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-borderless">
            <tr>
              <th>Nama Perusahaan</th>
              <td><?php echo $a->nama_perush ?></td>
            </tr>
            <tr>
              <th>Alamat Perusahaan </th>
              <td><?php echo $a->alamat_perush ?></td>
            </tr>
            <tr>
              <th>Tentang </th>
              <td><?php echo $a->tentang_perush ?></td>
            </tr>
            <tr>
              <th>No Telepon </th>
              <td><?php echo $a->telepon_perush ?></td>
            </tr>
            <tr>
              <th>Email </th>
              <td><?php echo $a->email_perush ?></td>
            </tr>
            <tr>
              <th>Logo Besar </th>
              <td class="bg-aqua">
                <img src="<?php echo base_url() ?>assets/img/<?php echo $a->logob_perush ?>" alt="">
                <!-- <?php echo $a->logob_perush ?> -->
              </td>
            </tr>
            <tr>
              <th>Logo Kecil </th>
              <td class="bg-aqua">
                <img src="<?php echo base_url() ?>assets/img/<?php echo $a->logok_perush ?>" alt="">
                <!-- <?php echo $a->logob_perush ?> -->
              </td>
            </tr>

          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">
            <i class="fa fa-close mr-2"></i>Close</button>
          <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- akhir detail -->
<!-- modal detail -->
<?php foreach ($perush as $a) : ?>


  <div class="modal fade" id="hapusdata<?php echo $a->kd_perush ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('perush/master/perush/hapusperush') ?>" method="post">
            <div class="form-group">
              Apakah Anda Yakin akan menghapus data ini ?
              <!-- <label for="">Nama</label>
                  <input name="nama_perush" type="text" class="form-control" value="<?php echo $a->nama_perush ?>" required> -->
              <input name="kd_perush" type="hidden" class="form-control" value="<?php echo $a->kd_perush ?>" required>
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

<!-- Modal logo besar-->
<?php foreach ($perush as $a) : ?>


  <div class="modal fade" id="editlogob<?php echo $a->kd_perush ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-building mr-2"></i> Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 bg-primary ml-2">
              <img src="<?php echo base_url() ?>assets/img/<?php echo $a->logob_perush ?>" alt="">
            </div>
            <div class="col-md-4">
              <form action="<?php echo base_url('admin/pengaturan/logo/aksieditlogo') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="">Logo Besar File png/jpg/jpeg</label>
                  <input name="kd_perush" type="hidden" class="form-control" value="<?php echo $a->kd_perush ?>" required>
                  <input name="logob_perush" type="file" class="form-control" value="<?php echo $a->logob_perush ?>">
                  <small style="color:red">Ukuran gambar harus 90px x 30px</small>
                </div>
            </div>
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

<!-- Modal logo besar-->
<?php foreach ($perush as $a) : ?>


  <div class="modal fade" id="editlogok<?php echo $a->kd_perush ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-building mr-2"></i> Form Edit Logo Kecil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 bg-primary ml-2">
              <img src="<?php echo base_url() ?>assets/img/<?php echo $a->logok_perush ?>" alt="">
            </div>
            <div class="col-md-4">
              <form action="<?php echo base_url('admin/pengaturan/logo/aksieditlogok') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="">Logo Kecil File png/jpg/jpeg</label>
                  <input name="kd_perush" type="hidden" class="form-control" value="<?php echo $a->kd_perush ?>" required>
                  <input name="logok_perush" type="file" class="form-control" value="<?php echo $a->logob_perush ?>">
                  <small style="color:red">Ukuran gambar harus 30 px x 30px</small>
                </div>
            </div>
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
<?php foreach ($perush as $a) : ?>


  <div class="modal fade" id="editlogdepan<?php echo $a->kd_perush ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-aqua">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-building mr-2"></i> Form Edit Logo Kecil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 bg-primary ml-2">
              <img src="<?php echo base_url() ?>assets/img/<?php echo $a->logo_depan ?>" alt="">
            </div>
            <div class="col-md-4">
              <form action="<?php echo base_url('admin/pengaturan/logo/aksieditlogodepan') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="">Logo Depan File png/jpg/jpeg</label>
                  <input name="kd_perush" type="hidden" class="form-control" value="<?php echo $a->kd_perush ?>" required>
                  <input name="logo_depan" type="file" class="form-control" value="<?php echo $a->logo_depan ?>">
                  <small style="color:red">Ukuran gambar harus 169 px x 43px</small>
                </div>
            </div>
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