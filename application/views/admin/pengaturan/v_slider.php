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
            <h4 class="text-primary"><i class="fa fa-meetup"></i> <?php echo $x1; ?></h4>
            <p>Data Table With Full Features</p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Judul slider Atas</th>
                            <th class="text-center text-white">Judul slider Tengah</th>
                            <th class="text-center text-white">Judul slider Bawah</th>
                            <th class="text-center text-white">Foto</th>
                            <th class="text-center text-white" width="300px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($slider as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>

                                <td><?php echo $a->atas_slider ?></td>
                                <td><?php echo $a->tengah_slider ?></td>
                                <td><?php echo $a->bawah_slider ?></td>
                                <td><img class="img-fluid" width="300" height="100" src="<?php echo base_url('assets/depan/images/') . $a->gambar_slider ?>" alt="">
                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_slider ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_slider ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_slider ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
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
                <form action="<?php echo base_url('admin/pengaturan/slider/aksitambahslider') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Judul Atas slider</label>
                        <input name="atas_slider" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Tengah slider</label>
                        <input name="tengah_slider" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Bawah slider</label>
                        <input name="bawah_slider" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Foto slider</label>
                        <input name="gambar_slider" type="file" class="form-control" required>
                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 1920 x 960 px untuk tampilan terbaik</span>
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
<?php foreach ($slider as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_slider ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Data slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Judul atas slider</th>
                            <td><?php echo $a->atas_slider ?></td>
                        </tr>
                        <tr>
                            <th>Judul tengah slider</th>
                            <td><?php echo $a->tengah_slider ?></td>
                        </tr>
                        <tr>
                            <th>Judul bawah slider</th>
                            <td><?php echo $a->bawah_slider ?></td>
                        </tr>
                        <tr>
                            <th>Foto slider</th>
                            <td>
                                <img width="300" height="100" src="<?php echo base_url('assets/depan/images/') . $a->gambar_slider ?>" alt="">
                                <span class="text-danger">Ukuran gambar untuk tampilan terbaik 1920 x 960 </span>
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
<?php foreach ($slider as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_slider ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturan/slider/hapusslider') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_slider" type="text" class="form-control" value="<?php echo $a->nama_slider ?>" required> -->
                            <input name="kd_slider" type="hidden" class="form-control" value="<?php echo $a->kd_slider ?>" required>
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
<?php foreach ($slider as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_slider ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturan/slider/aksieditslider') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Judul atas slider</label>
                            <input name="atas_slider" type="text" class="form-control" value="<?php echo $a->atas_slider ?>" required>
                            <input name="kd_slider" type="hidden" class="form-control" value="<?php echo $a->kd_slider ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Judul tengah slider</label>
                            <input name="tengah_slider" type="text" class="form-control" value="<?php echo $a->tengah_slider ?>" required>

                        </div>
                        <div class="form-group">
                            <label for="">Judul bawah slider</label>
                            <input name="bawah_slider" type="text" class="form-control" value="<?php echo $a->bawah_slider ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Foto slider</label>
                            <img class="form-control img-fluid mb-1" src="<?php echo base_url('assets/depan/images/') . $a->gambar_slider ?>" alt="">
                            <input name="gambar_slider" type="file" class="form-control" value="<?php echo $a->gambar_slider ?>">
                            <span class="text-red font-italic text-sm-left">Gambar harus berukuran 1920 x 960 px untuk tampilan terbaik dan maksimal 2 MB</span>
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