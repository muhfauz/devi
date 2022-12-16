<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-wpexplorer"></i> <?php echo $judul1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-wpexplorer"></i> <?php echo $judul1; ?></h4>
            <p><?php echo $x4 ?></p>
            <div class="row ml-1 mr-1 mt-3 bg-aqua">
                <div class="col sm-1 mt-2 ml-2 mr-2">
                    <!-- <form class="form" action="<?php echo base_url('admin/transaksi/penjualan/simpanpenjualan') ?>" method="POST"> -->
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Bulan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value="<?php echo $bulan ?>" required>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Tahun </label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $tahun ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <!-- <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a> -->
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white align-middle" width="10px" rowspan="2">No</th>
                            <th class="text-center text-white align-middle" rowspan="2">Nama </th>
                            <th class="text-center text-white align-middle" rowspan="2">Jabatan</th>
                            <th class="text-center text-white align-middle" colspan="4">Gaji </th>

                            <th class="text-center text-white align-middle" colspan="3">Potongan</th>


                            <th class="text-center text-white align-middle" rowspan="2">Gaji Diterima</th>
                            <th class=" text-center text-white" width="300px" rowspan="2"></th>
                            <!-- <th class=" text-center text-white" width="300px" rowspan="2"></th> -->

                        </tr>
                        <tr>
                            <th class="text-center text-white align-middle">Gaji Pokok</th>
                            <th class="text-center text-white align-middle">Uang Makan</th>
                            <th class="text-center text-white align-middle">Insentif Reguler</th>
                            <th class="text-center text-white align-middle">Insentif Penjualan</th>
                            <th class="text-center text-white align-middle">BPJS Kesehatan</th>
                            <th class="text-center text-white align-middle">BPJS Ketenagakerjaan</th>
                            <th class="text-center text-white align-middle">Pensiun</th>



                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_gaji = 0;
                        foreach ($karyawan as $a) :
                            $total_gaji = $total_gaji + ($a->gaji_pokok + ($a->jumlah_masuk * $a->uang_makan) + $a->insentif_reguler + $a->tunjangan_jabatan) - ($a->bpjs_kes + $a->bpjs_tk + $a->bpjs_pen);
                        ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <!-- <td><?php echo $a->kd_karyawan ?></td> -->
                                <td><?php echo $a->nama_karyawan ?></td>
                                <td><?php echo $a->nama_jabatan ?></td>
                                <!-- <td><?php echo $a->nama_bagian ?></td> -->
                                <td class="text-right"><?php echo number_format($a->gaji_pokok) ?></td>
                                <td class="text-right"><?php echo number_format($a->jumlah_masuk * $a->uang_makan) ?></td>
                                <td class="text-right"><?php echo number_format($a->insentif_reguler) ?></td>
                                <td class="text-right"><?php echo number_format($a->tunjangan_jabatan) ?></td>
                                <td class="text-right"><?php echo number_format($a->bpjs_kes) ?></td>
                                <td class="text-right"><?php echo number_format($a->bpjs_tk) ?></td>
                                <td class="text-right"><?php echo number_format($a->bpjs_pen) ?></td>
                                <td class="text-right"><?php echo number_format(($a->gaji_pokok + ($a->jumlah_masuk * $a->uang_makan) + $a->insentif_reguler + $a->tunjangan_jabatan) - ($a->bpjs_kes + $a->bpjs_tk + $a->bpjs_pen)) ?></td>


                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_karyawan ?>"> <i class="fa fa-info mr-2"></i> Detail</a>
                                    <!-- <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_karyawan ?>"> <i class="fa fa-plus mr-2"></i>Input Kehadiran</a> -->
                                </td>
                            </tr>
                        <?php endforeach ?>

                </table>
            </div>
            <div class="row ml-1 mr-1 mt-3 bg-aqua ">
                <div class="col-6 sm-8 mt-2 ml-2 mr-2">
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Total Gaji </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value="Rp.<?php echo number_format($total_gaji) ?> ,00" required>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 sm-8 mt-2 ml-2 mr-2 mb-2">
                    <a href="<?php echo base_url('admin/laporan/lgaji') ?>">
                        <button class="btn btn-secondary"> <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i></button>
                    </a>
                    <?php if ($total_gaji > 0) { ?>
                        <a href="" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#printdata"> <i class="fa fa-file-pdf-o mr-2"></i> Print </a>
                    <?php } ?>





                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->


<!-- modal detail -->
<?php foreach ($karyawan as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Gaji <?php echo $a->nama_karyawan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Kode karyawan</th>
                            <td><?php echo $a->kd_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Nama karyawan</th>
                            <td><?php echo $a->nama_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tangal Lahir</th>
                            <td><?php echo $a->tempatlahir_karyawan . ', ' . $this->Mglobal->tanggalindo($a->tgllahir_karyawan) ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?php echo $a->jk_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $a->alamat_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td><?php echo $a->nohp_karyawan ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?php echo $a->nama_jabatan ?></td>
                        </tr>

                        <tr>
                            <th>Gaji Pokok</th>
                            <td><?php echo number_format($a->gaji_pokok) ?></td>

                        </tr>
                        <tr>
                            <th>Uang Makan</th>
                            <td><?php echo number_format($a->jumlah_masuk * $a->uang_makan) ?></td>
                        </tr>
                        <tr>
                            <th>Insentif Reguler</th>
                            <td><?php echo number_format($a->insentif_reguler) ?></td>

                        </tr>
                        <tr>
                            <th>Insentif Penjualan</th>
                            <td><?php echo number_format($a->tunjangan_jabatan) ?></td>

                        </tr>
                        <tr>
                            <th>BPJS Kesehatan</th>
                            <td><?php echo number_format($a->bpjs_kes) ?></td>
                        </tr>
                        <tr>
                            <th>BPJS Ketenagakerjaan</th>
                            <td><?php echo number_format($a->bpjs_tk) ?></td>
                        </tr>
                        <tr>
                            <th>Pensiun</th>
                            <td><?php echo number_format($a->bpjs_pen) ?></td>

                        </tr>
                        <tr>
                            <th>Gaji Diterima</th>
                            <td class="text-bold">Rp. <?php echo number_format(($a->gaji_pokok + ($a->jumlah_masuk * $a->uang_makan) + $a->insentif_reguler + $a->tunjangan_jabatan) - ($a->bpjs_kes + $a->bpjs_tk + $a->bpjs_pen)) ?></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                <img src="<?php echo base_url('gambar/') . $a->gambar_karyawan ?>" alt="">
                            </td>
                        </tr>


                    </table>

                </div>
                <form action="<?php echo base_url('admin/laporan/lgaji/cetakgajidetail') ?>" method="post">
                    <input type="hidden" name="kd_gajidetail" value="<?php echo $a->kd_gajidetail ?>">
                    <input type="hidden" name="kd_karyawan" value="<?php echo $a->kd_karyawan ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close-o mr-2" aria-hidden="true"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print mr-2" aria-hidden="true"></i>Cetak PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- akhir detail -->
<!-- modal detail -->
<?php foreach ($karyawan as $a) : ?>


    <div class="modal fade" id="printdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-print mr-2"></i> Cetak PDF Gaji <?php echo $bulan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/laporan/lgaji/cetakgaji') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Mencetak data ini ?
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
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Input Kehadiran Bulan <?php echo $bulan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/absensi/inputkehadiran') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama karyawan</label>
                            <input name="nama_karyawan" type="text" class="form-control" value="<?php echo $a->nama_karyawan ?>" readonly>
                            <input name="kd_gaji" type="hidden" class="form-control" value="<?php echo $a->kd_gaji ?>" readonly>
                            <input name="kd_gajidetail" type="hidden" class="form-control" value="<?php echo $a->kd_gajidetail ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Kehadiran</label>
                            <input name="jumlah_masuk" type="number" class="form-control" value="<?php echo $a->jumlah_masuk ?>" required>
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