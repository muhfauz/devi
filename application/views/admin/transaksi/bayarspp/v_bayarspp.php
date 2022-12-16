<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-users"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-users"></i> <?php echo $x1; ?></h4>
            <div class="row ml-1 mr-1 mt-3 bg-blue-gradient ">
                <?php foreach ($siswa as $s) : ?>


                    <div class="col sm-1 mt-2 ml-2 mr-2">
                        <!-- <form class="form" action="<?php echo base_url('admin/transaksi/penjualan/simpanpenjualan') ?>" method="POST"> -->
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">NIS</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value="<?php echo $s->kd_siswa ?>" required>
                                    <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Nama </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="kd_outlet" id="kd_outlet" placeholder="Nama outlet" type="hidden">
                                    <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $s->nama_siswa ?>" readonly>
                                    <div class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-2 col sm-1 mr-2 mb-0">
                        <div class="form-group row">
                            <label for="web" class="col-sm-3 control-label">Kelas</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="tgl_penjualan" id="exampleInputuname3" placeholder="" type="text" value="<?php echo $s->tingkat . ' ' . $s->kelas ?>" readonly>
                                    <div class="input-group-addon"><i class="fa fa-themeisle" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword5" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="no_fakturpenjualan" id="uang_mukazss" placeholder="Nomor Faktur penjualan" type="text" value="<?php echo $s->alamat_siswa ?>" readonly>
                                    <input class="form-control" name="total_penjualan" id="total_penjualan" placeholder="Total Bayar" type="hidden">
                                    <div class="input-group-addon"><i class="fa fa-google-wallet" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
        <?php endforeach; ?>
        <!-- <p> <?php echo $x4; ?></p> -->
        <div class="table-responsive">
            <?php echo $this->session->userdata('pesan'); ?>
            <!-- <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a> -->
            <!-- <a href="<?php echo base_url('admin/sppdetail/sppdetail/tambahsppdetail') ?>" class="btn btn-primary mb-2"> <i class="fa fa-plus-square mr-2"></i> sppdetail Baru</a> -->
            <table id="examplex" class="table table-bordered table-striped table-hover mt-3">
                <thead class="bg-blue">
                    <tr>
                        <th class="text-center text-white" width="10px">No</th>
                        <th class="text-center text-white">Bulan</th>
                        <th class="text-center text-white">Besar SPP</th>
                        <th class="text-center text-white">Keterangan</th>


                        <!-- <th class="text-center text-white">Foto 1</th>
                            <th class="text-center text-white">Foto 2</th> -->
                        <th class="text-center text-white" width="300px"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($sppdetail as $a) :  ?>
                        <tr>
                            <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                            <td><?php echo $a->bulan ?></td>
                            <td>Rp. <?php echo number_format($a->besar_spp) ?></td>
                            <td><?php if ($a->tgl_bayar == '0000-00-00') { ?>
                                    <span class="badge badge-primary text-center">Belum Bayar</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger text-center">Lunas, dibayar tanggal <?php echo $this->Mglobal->tanggalindo($a->tgl_bayar) . ' diterima oleh ' . $a->nama_admin ?></span>
                                <?php } ?>

                            </td>




                            <td class="float-left">
                                <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_spp ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a> -->

                                <!-- <a href="<?php echo base_url('admin/transaksi/sppdetail/detailsppdetail/') . $a->kd_spp; ?>" class="btn btn-primary btn-sm mb-1"> <i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                                <a href="<?php echo base_url('admin/transaksi/sppdetail/editsppdetail/') . $a->kd_spp; ?>" class="btn btn-info btn-sm mb-1"> <i class="fa fa-edit mr-2"></i> Edit</a> -->
                                <?php if ($a->tgl_bayar == '0000-00-00') { ?>
                                    <a href="" class="btn btn-facebook btn-sm mb-1" data-toggle="modal" data-target="#inputdata<?php echo $a->kd_sppdetail ?>"> <i class="fa fa-check mr-2"></i> Bayar</a>

                                <?php } else { ?>
                                    <a href="" class="btn btn-secondary btn-sm mb-1" data-toggle="modal" data-target="#cetakdata<?php echo $a->kd_sppdetail ?>"> <i class="fa fa-print mr-2"></i> Cetak</a>
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

<!-- Modal hapus -->
<?php foreach ($sppdetail as $a) : ?>


    <div class="modal fade" id="inputdata<?php echo $a->kd_sppdetail ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-black-active text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Bayar SPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/bayarspp/inputspp') ?>" method="post">
                        <div class="form-group">
                            Apakah Yakin akan siswa bernama <?php echo $a->nama_siswa . ' sudah membayar spp untuk bulan ' . $a->bulan ?>tersebut sudah membayar ?

                            <input name="kd_sppdetail" type="hidden" class="form-control" value="<?php echo $a->kd_sppdetail ?>" required>
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
<?php foreach ($sppdetail as $a) : ?>


    <div class="modal fade" id="cetakdata<?php echo $a->kd_sppdetail ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-print mr-2"></i> Cetak Bukti SPP <?php echo $a->nama_siswa ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/bayarspp/cetakbukti') ?>" method="post">
                        <div class="form-group">
                            Apakah Yakin akan mencetak bukti SPP <?php echo $a->nama_siswa . ' bulan ' . $a->bulan ?> ?

                            <input name="kd_sppdetail" type="hidden" class="form-control" value="<?php echo $a->kd_sppdetail ?>" required>
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

<!-- Modal lunas -->
<?php foreach ($sppdetail as $a) : ?>


    <div class="modal fade" id="selesaidata<?php echo $a->kd_spp ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-facebook text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-check mr-2"></i> sppdetail Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/sppdetail/sppdetail/sppdetailselesai') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin tranasksi sudah selesai ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_suplier" type="text" class="form-control" value="<?php echo $a->nama_suplier ?>" required> -->
                            <input name="kd_spp" type="hidden" class="form-control" value="<?php echo $a->kd_spp ?>" required>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-facebook">Yakin</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>