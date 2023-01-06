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
            <p><?php echo $nama_perush; ?></p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <!-- <a href="" class="btn btn-primary bg-aqua-gradient mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a> -->
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class=" bg-aqua-gradient ">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Judul</th>
                            <th class="text-center text-white">Tentang Kami</th>
                            <th class="text-center text-white">Gambar</th>
                            <!-- <th class="text-center text-white"></th> -->
                            <th class="text-center text-white" width="300px"></th>
                            <th class="text-center text-white" width="0px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tentang as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->judul_tentang ?></td>
                                <td><?php echo substr($a->isi_tentang, 0, 200) . '...';  ?></td>
                                <td> <img class="img-thumbnail" src=" <?php echo base_url('gambar/') . $a->gambar_tentang ?>" alt=""> </td>
                                <td class="float-right">

                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_tentang ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_tentang ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>



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
                <form action="<?php echo base_url('admin/master/admin/aksitambahadmin') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input name="kd_admin" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_admin', 'tbl_admin', 'ADM') ?>" required>
                        <input name="nama_admin" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat </label>
                        <input name="alamat_admin" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor HP </label>
                        <input name="nohp_admin" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Status Admin </label>
                        <select class="form-control" name="status_admin" id="">
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Foto </label>
                        <input name="gambar_admin" type="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input name="username_admin" type="text" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_admin', 'tbl_admin', 'ADM') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password_admin" type="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">text editor</label>
                        <textarea name="tekeditor" id="tekeditor" cols="30" rows="10" class="form-control"></textarea>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            <script>
                CKEDITOR.replace('tekeditor');
            </script>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php foreach ($tentang as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_tentang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Tentang Kami</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Judul</th>
                            <td><?php echo $a->judul_tentang ?></td>
                        </tr>
                        <tr>
                            <th>Deksripsi</th>
                            <td><?php echo $a->isi_tentang ?></td>
                        </tr>


                        <tr>
                            <th>Foto</th>
                            <td class="image text-center">
                                <img width="100" height="100" src="<?php echo base_url('gambar/') . $a->gambar_tentang ?>" alt="">
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
<?php foreach ($tentang as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_tentang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/admin/hapusadmin') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_admin" type="text" class="form-control" value="<?php echo $a->nama_admin ?>" required> -->
                            <input name="kd_admin" type="hidden" class="form-control" value="<?php echo $a->kd_tentang ?>" required>
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
<?php foreach ($tentang as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_tentang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/deskripsi/tentang/aksiedittentang') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input name="judul_tentang" type="text" class="form-control" value="<?php echo $a->judul_tentang ?>" required>
                            <input name="kd_tentang" type="hidden" class="form-control" value="<?php echo $a->kd_tentang ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>

                            <textarea class="form-control" name="isi_tentang" id="isi_tentang" cols="30" rows="10"><?php echo $a->isi_tentang ?></textarea>
                        </div>

                        <div class="form-group">

                            <label for="">Foto</label>
                            <br>
                            <img width="100" height="100" src="<?php echo base_url('gambar/') . $a->gambar_tentang ?>" alt="">
                            <br>
                            <input name="gambar_tentang" type="file" class="form-control" value="">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save mr-2"></i>Simpan</button>
                </div>
                </form>
                <script>
                    CKEDITOR.replace('isi_tentang');
                </script>

            </div>
        </div>
    </div>
<?php endforeach; ?>