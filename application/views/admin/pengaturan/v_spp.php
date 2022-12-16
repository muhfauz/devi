<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-ils" aria-hidden="true"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-ils" aria-hidden="true"></i> <?php echo $x1; ?></h4>
            <p><?php echo $nama_perush ?></p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary bg-aqua-gradient mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah </a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class=" bg-blue ">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Tahun Ajaran</th>
                            <th class="text-center text-white">Dibuat</th>
                            <th class="text-center text-white">Pembuat</th>
                            <th class="text-center text-white">Status</th>
                            <th class="text-center text-white">Bulan</th>
                            <th class="text-center text-white"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($spp as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>

                                <td><?php echo $a->tahun_ajaran ?></td>
                                <td><?php echo $this->Mglobal->tanggalindo($a->cd_spp)  ?></td>
                                <td><?php echo $a->nama_admin ?></td>
                                <td class="text-center">
                                    <?php if ($a->status_spp == 'aktif') { ?>
                                        <span class="badge badge-primary text-center">Aktif</span>
                                    <?php } else { ?>
                                        <span class="badge badge-info text-center">Tidak Aktif</span>
                                    <?php } ?>
                                </td>
                                <td><?php echo $a->bulan_spp ?></td>

                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_spp ?>"> <i class="fa fa-info" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i></a>

                                    <?php $isi = $this->db->query("select * from tbl_sppdetail where kd_spp='$a->kd_spp'")->num_rows() ?>
                                    <?php if ($isi > 0) {
                                    ?>
                                        # code...
                                    <?php } else { ?>
                                        <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_spp ?>"> <i class="fa fa-edit mr-2"></i> </a>
                                        <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_spp ?>"> <i class="fa fa-trash mr-2"></i></a>
                                        <a href="" class="btn btn-facebook btn-sm mb-1" data-toggle="modal" data-target="#inputdata<?php echo $a->kd_spp ?>"> <i class="fa fa-check-square" aria-hidden="true"></i></a>
                                    <?php  }  ?>


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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-ils mr-2" aria-hidden="true"></i> Tambah spp </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/pengaturan/spp/aksitambahspp') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Tahun Ajaran</label>
                        <select name="kd_tahunajaran" id="" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <?php foreach ($tahunajaran as $ta) { ?>
                                <option value="<?php echo $ta->kd_tahunajaran ?>"> Tahun <?php echo $ta->tahun_ajaran ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status_spp" id="" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Tidak Aktif</option>
                        </select>
                        <input name="kd_spp" type="hidden" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_spp", "tbl_spp", "SPP") ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select name="bulan_spp" id="" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                        <input name="kd_spp" type="hidden" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_spp", "tbl_spp", "SPP") ?>">
                    </div>


                    <!-- <div class="form-group">
                        <label for="">Foto spp</label>
                        <input name="foto_spp" type="file" class="form-control" required>
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
<?php foreach ($spp as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_spp ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-ils mr-2" aria-hidden="true"></i> Detail Pembayaran Tahun <?php echo $a->spp ?></h5>
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
                            <th>Dibuat</th>
                            <td><?php echo $this->Mglobal->tanggalindo($a->cd_spp)  ?></td>
                        </tr>
                        <tr>
                            <th>Pembuat</th>
                            <td><?php echo $a->nama_admin  ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td> <?php if ($a->status_spp == 'aktif') { ?>
                                    <span class="badge badge-primary text-center">Aktif</span>
                                <?php } else { ?>
                                    <span class="badge badge-info text-center">Tidak Aktif</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <th></th>


                        <!-- <tr>
                            <th>Foto spp</th>
                            <td>
                                <img src="<?php echo base_url('assets/toko/images/spp/') . $a->foto_spp ?>" alt="">
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
<?php foreach ($spp as $a) : ?>
    <div class="modal fade" id="hapusdata<?php echo $a->kd_spp ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-ils mr-2"></i> Hapus Tahun Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturan/spp/hapusspp') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_spp" type="text" class="form-control" value="<?php echo $a->nama_spp ?>" required> -->
                            <input name="kd_spp" type="hidden" class="form-control" value="<?php echo $a->kd_spp ?>" required>
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

<?php foreach ($spp as $a) : ?>
    <div class="modal fade" id="inputdata<?php echo $a->kd_spp ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-facebook text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-check-square mr-2" aria-hidden="true"></i> Input Bulan <?php echo $a->bulan_spp ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturan/spp/inputspp') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan memasukkan bulan ini ?
                            <label for="">Nama</label>

                            <input name="kd_spp" type="hidden" class="form-control" value="<?php echo $a->kd_spp ?>" required>
                            <input name="bulan_spp" type="hidden" class="form-control" value="<?php echo $a->bulan_spp ?>" required>
                            <input name="besar_spp" type="hidden" class="form-control" value="<?php echo $a->spp ?>" required>
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
<?php foreach ($spp as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_spp ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-ils mr-2" aria-hidden="true"></i> Edit spp <?php echo $a->spp ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pengaturan/spp/aksieditspp') ?>" method="post">
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <input name="kd_spp" type="text" class="form-control" readonly value="<?php echo $a->kd_spp ?>">
                            <select name="kd_tahunajaran" id="" class="form-control" required>
                                <option value="<?php echo $a->kd_tahunajaran ?>" selected> Tahun <?php echo $a->tahun_ajaran ?></option>
                                <option value="">-Pilih-</option>
                                <?php foreach ($tahunajaran as $ta) { ?>
                                    <option value="<?php echo $ta->kd_tahunajaran ?>"> Tahun <?php echo $ta->tahun_ajaran ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status_spp" id="" class="form-control">
                                <?php if ($a->status_spp == 'aktif') { ?>
                                    <option value="aktif" selected>Aktif</option>
                                <?php } else { ?>
                                    <option value="nonaktif" selected> Tidak Aktif</option>
                                <?php } ?>
                                <option value="">-Pilih-</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Tidak Aktif</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="">Bulan</label>
                            <select name="bulan_spp" id="" class="form-control">
                                <option value="<?php echo $a->bulan_spp ?>" selected><?php echo $a->bulan_spp ?></option>
                                <option value="">-Pilih-</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
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