<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-instagram"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-instagram"></i> <?php echo $x1; ?></h4>
            <!-- <p>Data Table With Full Features</p> -->
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>

                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Nama</th>
                            <th class="text-center text-white">URL</th>
                            <th class="text-center text-white">Password </th>
                            <th class="text-center text-white">Nomor Pemulihan</th>
                            <th class="text-center text-white">Dibuat Oleh</th>
                            <th class="text-center text-white" width="300px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($instagram as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>

                                <td><?php echo $a->nama_instagram ?></td>
                                <td> <a href="<?php echo $a->url_instagram ?>" target="_blank"> <?php echo $a->url_instagram ?></a></td>
                                <td><?php echo md5($a->password_instagram) ?></td>
                                <td><?php echo $a->hp_instagram ?></td>
                                <td><?php echo $a->nama_admin ?></td>
                                <!-- <td><img src="<?php echo base_url('assets/toko/images/instagram/') . $a->foto_instagram ?>" alt=""> -->
                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_instagram ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_instagram ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_instagram ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-instagram-circle-o mr-2"></i> Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="instagramjs" action="<?php echo base_url('admin/email/instagram/aksitambahinstagram') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Nama instagram</label>
                        <input id="nama_instagram" name="nama_instagram" type="text" class="form-control" required>
                        <input id="kd_instagram" name="kd_instagram" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_instagram', 'tbl_instagram', 'FB'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password instagram</label>
                        <input name="password_instagram" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email instagram</label>
                        <input name="email_instagram" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Verifikasi</label>
                        <input name="hp_instagram" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">URL instagram</label>
                        <input name="url_instagram" type="text" class="form-control" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Foto instagram</label>
                        <input name="foto_instagram" type="file" class="form-control" required>
                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div> -->



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php foreach ($instagram as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_instagram ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-instagram-circle-o mr-2"></i> Detail Data instagram</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama instagram</th>
                            <td><?php echo $a->nama_instagram ?></td>
                        </tr>
                        <!-- <tr>
                            <th>Foto instagram</th>
                            <td>
                                <img src="<?php echo base_url('assets/toko/images/instagram/') . $a->foto_instagram ?>" alt="">
                            </td>
                        </tr> -->

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
<?php foreach ($instagram as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_instagram ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-instagram-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/email/instagram/hapusinstagram') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_instagram" type="text" class="form-control" value="<?php echo $a->nama_instagram ?>" required> -->
                            <input name="kd_instagram" type="hidden" class="form-control" value="<?php echo $a->kd_instagram ?>" required>
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
<?php foreach ($instagram as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_instagram ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-instagram-circle-o mr-2"></i> Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/email/instagram/aksieditinstagram') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama instagram</label>
                            <input name="nama_instagram" type="text" class="form-control" value="<?php echo $a->nama_instagram ?>" required>
                            <input name="kd_instagram" type="hidden" class="form-control" value="<?php echo $a->kd_instagram ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password instagram</label>
                            <input name="password_instagram" type="text" class="form-control" value="<?php echo $a->password_instagram ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">URL instagram</label>
                            <input name="url_instagram" type="text" class="form-control" value="<?php echo $a->url_instagram ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email instagram</label>
                            <input name="email_instagram" type="text" class="form-control" value="<?php echo $a->email_instagram ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Verifikasi</label>
                            <input name="hp_instagram" type="number" class="form-control" value="<?php echo $a->hp_instagram ?>" required>
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