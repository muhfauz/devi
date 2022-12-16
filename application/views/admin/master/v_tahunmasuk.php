<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $x1; ?></h4>
            <p><?php echo $nama_perush ?></p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary bg-aqua-gradient mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah </a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class=" bg-blue ">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Tahun Masuk</th>
                            <!-- <th class="text-center text-white">Uang Gedung Kelas I</th>
                            <th class="text-center text-white">Uang Gedung Kelas II</th>
                            <th class="text-center text-white">Uang Gedung Kelas III</th> -->
                            <!-- <th class="text-center text-white">Foto</th> -->
                            <th class="text-center text-white"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tahunmasuk as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>

                                <td><?php echo $a->tahun_masuk ?></td>
                                <!-- <td class="text-right"><?php echo number_format($a->gedung1) ?></td>
                                <td class="text-right"><?php echo number_format($a->gedung2) ?></td>
                                <td class="text-right"><?php echo number_format($a->gedung3) ?></td> -->
                                <!-- <td><img src="<?php echo base_url('assets/toko/images/tahunmasuk/') . $a->foto_tahunmasuk ?>" alt=""> -->
                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_tahunmasuk ?>"> <i class="fa fa-info" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i></a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_tahunmasuk ?>"> <i class="fa fa-edit mr-2"></i> </a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_tahunmasuk ?>"> <i class="fa fa-trash mr-2"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-calendar mr-2" aria-hidden="true"></i> Formulir Tahun Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/master/tahunmasuk/aksitambahtahunmasuk') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Tahun Masuk</label>
                        <input name="tahun_masuk" type="text" class="form-control" required>
                        <input name="kd_tahunmasuk" type="hidden" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_tahunmasuk", "tbl_tahunmasuk", "THN") ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Uang Gedung Kelas I</label>
                        <input name="gedung1" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Gedung Kelas II</label>
                        <input name="gedung2" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Gedung Kelas III</label>
                        <input name="gedung3" type="number" class="form-control" required>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="">Foto tahunmasuk</label>
                        <input name="foto_tahunmasuk" type="file" class="form-control" required>
                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div> -->


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
<?php foreach ($tahunmasuk as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_tahunmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-calendar mr-2" aria-hidden="true"></i> Besar Uang Gedung Tahun Masuk <?php echo $a->tahun_masuk ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Tahun Masuk</th>
                            <td><?php echo $a->tahun_masuk ?></td>
                        </tr>
                        <!-- <tr>
                            <th>Uang Gedung Kelas I</th>
                            <td>Rp <?php echo number_format($a->gedung1) ?></td>
                        </tr>
                        <tr>
                            <th>Uang Gedung Kelas II</th>
                            <td>Rp <?php echo number_format($a->gedung2) ?></td>
                        </tr>
                        <tr>
                            <th>Uang Gedung Kelas II</th>
                            <td>Rp <?php echo number_format($a->gedung3) ?></td>
                        </tr> -->
                        <!-- <tr>
                            <th>Total Uang Gedung </th>
                            <td>Rp <?php echo number_format($a->gedung3 + $a->gedung2 + $a->gedung1) ?></td>
                        </tr> -->
                        <!-- <tr>
                            <th>Foto tahunmasuk</th>
                            <td>
                                <img src="<?php echo base_url('assets/toko/images/tahunmasuk/') . $a->foto_tahunmasuk ?>" alt="">
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
<?php foreach ($tahunmasuk as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_tahunmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-calendar mr-2"></i> Hapus Tahun Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/tahunmasuk/hapustahunmasuk') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_tahunmasuk" type="text" class="form-control" value="<?php echo $a->nama_tahunmasuk ?>" required> -->
                            <input name="kd_tahunmasuk" type="hidden" class="form-control" value="<?php echo $a->kd_tahunmasuk ?>" required>
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
<?php foreach ($tahunmasuk as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_tahunmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-calendar mr-2" aria-hidden="true"></i> Formulir Edit Tahun Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/tahunmasuk/aksiedittahunmasuk') ?>" method="post">
                        <div class="form-group">
                            <label for="">Tahun Masuk</label>
                            <input name="tahun_masuk" type="text" class="form-control" value="<?php echo $a->tahun_masuk ?>" required>
                            <input name="kd_tahunmasuk" type="hidden" class="form-control" value="<?php echo $a->kd_tahunmasuk ?>" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Uang Gedung Kelas I</label>
                            <input name="gedung1" type="number" class="form-control" value="<?php echo $a->gedung1 ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Uang Gedung Kelas II</label>
                            <input name="gedung2" type="number" class="form-control" value="<?php echo $a->gedung2 ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Uang Gedung Kelas III</label>
                            <input name="gedung3" type="number" class="form-control" value="<?php echo $a->gedung3 ?>" required>
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="">Foto tahunmasuk</label>
                            <img class="form-control img-fluid mb-1" src="<?php echo base_url('assets/toko/images/tahunmasuk/') . $a->foto_tahunmasuk ?>" alt="">
                            <input name="foto_tahunmasuk" type="file" class="form-control" value="<?php echo $a->foto_tahunmasuk ?>">
                        </div> -->


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