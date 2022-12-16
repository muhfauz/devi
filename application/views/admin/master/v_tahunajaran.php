<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $x1; ?></h4>
            <p><?php echo $nama_perush ?></p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary bg-aqua-gradient mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah </a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class=" bg-blue ">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Tahun Ajaran</th>
                            <th class="text-center text-white">Uang SPP</th>
                            <!-- <th class="text-center text-white">Uang Osis dan Pramuka</th>
                            <th class="text-center text-white">Uang Ujian Akhir Madrasah</th> -->
                            <!-- <th class="text-center text-white">Foto</th> -->
                            <th class="text-center text-white"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tahunajaran as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>

                                <td><?php echo $a->tahun_ajaran ?></td>
                                <td class="text-right"><?php echo number_format($a->spp) ?></td>
                                <!-- <td class="text-right"><?php echo number_format($a->pramuka) ?></td>
                                <td class="text-right"><?php echo number_format($a->uam) ?></td> -->
                                <!-- <td><img src="<?php echo base_url('assets/toko/images/tahunajaran/') . $a->foto_tahunajaran ?>" alt=""> -->
                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_tahunajaran ?>"> <i class="fa fa-info" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i></a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_tahunajaran ?>"> <i class="fa fa-edit mr-2"></i> </a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_tahunajaran ?>"> <i class="fa fa-trash mr-2"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-calendar mr-2" aria-hidden="true"></i> Tambah Data Pembayaran Tahun Ajaran </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/master/tahunajaran/aksitambahtahunajaran') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Tahun Ajaran</label>
                        <input name="tahun_ajaran" type="text" class="form-control" placeholder="2021/2022" required>
                        <input name="kd_tahunajaran" type="hidden" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_tahunajaran", "tbl_tahunajaran", "THA") ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Uang SPP</label>
                        <input name="spp" type="number" class="form-control" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Uang Penilaian Tengah Semester I</label>
                        <input name="pts1" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Penilaian Tengah Semester II</label>
                        <input name="pts2" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Penilaian Akhir Semester I</label>
                        <input name="pas1" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Penilaian Akhir Semester II</label>
                        <input name="pas2" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang OSIS dan Pramuka</label>
                        <input name="pramuka" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Ujian Akhir Madrasah</label>
                        <input name="uam" type="number" class="form-control" required>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="">Foto tahunajaran</label>
                        <input name="foto_tahunajaran" type="file" class="form-control" required>
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
<?php foreach ($tahunajaran as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_tahunajaran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i> Detail Pembayaran Tahun <?php echo $a->tahun_ajaran ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Tahun Ajaran</th>
                            <td><?php echo $a->tahun_ajaran ?></td>
                        </tr>
                        <tr>
                            <th>Uang SPP</th>
                            <td>Rp <?php echo number_format($a->spp) ?></td>
                        </tr>
                        <!-- <tr>
                            <th>Uang OSIS dan Pramuka </th>
                            <td>Rp <?php echo number_format($a->pramuka) ?></td>
                        </tr>
                        <tr>
                            <th>Uang Penilaian Tengah Semester I</th>
                            <td>Rp <?php echo number_format($a->pts1) ?></td>
                        </tr>
                        <tr>
                            <th>Uang Penilaian Tengah Semester II</th>
                            <td>Rp <?php echo number_format($a->pts2) ?></td>
                        </tr>
                        <tr>
                            <th>Uang Penilaian Tengah Semester I</th>
                            <td>Rp <?php echo number_format($a->pas1) ?></td>
                        </tr>
                        <tr>
                            <th>Uang Penilaian Akhir Semester II</th>
                            <td>Rp <?php echo number_format($a->pas2) ?></td>
                        </tr>
                        <tr>
                            <th>Uang Ujian Akhir Madrasah Khusus Kelas III</th>
                            <td>Rp <?php echo number_format($a->uam) ?></td>
                        </tr> -->

                        <!-- <tr>
                            <th>Foto tahunajaran</th>
                            <td>
                                <img src="<?php echo base_url('assets/toko/images/tahunajaran/') . $a->foto_tahunajaran ?>" alt="">
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
<?php foreach ($tahunajaran as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_tahunajaran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-graduation-cap mr-2"></i> Hapus Tahun Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/tahunajaran/hapustahunajaran') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_tahunajaran" type="text" class="form-control" value="<?php echo $a->nama_tahunajaran ?>" required> -->
                            <input name="kd_tahunajaran" type="hidden" class="form-control" value="<?php echo $a->kd_tahunajaran ?>" required>
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
<?php foreach ($tahunajaran as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_tahunajaran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i> Edit Data Pembayaran Tahun <?php echo $a->tahun_ajaran ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/tahunajaran/aksiedittahunajaran') ?>" method="post">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <input name="tahun_ajaran" type="text" class="form-control" value="<?php echo $a->tahun_ajaran ?>" required>
                            <input name="kd_tahunajaran" type="hidden" class="form-control" value="<?php echo $a->kd_tahunajaran ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Uang SPP</label>
                            <input name="spp" type="number" class="form-control" required value="<?php echo $a->spp ?>">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Uang Penilaian Tengah Semester I</label>
                            <input name="pts1" type="number" class="form-control" required value="<?php echo $a->pts1 ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Uang Penilaian Tengah Semester II</label>
                            <input name="pts2" type="number" class="form-control" required value="<?php echo $a->pts2 ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Uang Penilaian Akhir Semester I</label>
                            <input name="pas1" type="number" class="form-control" required value="<?php echo $a->pas1 ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Uang Penilaian Akhir Semester II</label>
                            <input name="pas2" type="number" class="form-control" required value="<?php echo $a->pas2 ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Uang OSIS dan Pramuka</label>
                            <input name="pramuka" type="number" class="form-control" required value="<?php echo $a->pramuka ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Uang Ujian Akhir Madrasah</label>
                            <input name="uam" type="number" class="form-control" required value="<?php echo $a->uam ?>">
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="">Foto tahunajaran</label>
                            <img class="form-control img-fluid mb-1" src="<?php echo base_url('assets/toko/images/tahunajaran/') . $a->foto_tahunajaran ?>" alt="">
                            <input name="foto_tahunajaran" type="file" class="form-control" value="<?php echo $a->foto_tahunajaran ?>">
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