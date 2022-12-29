<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-futbol-o"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-futbol-o"></i> <?php echo $x1; ?></h4>
            <p><?php echo $x4 ?></p>
            <div class="row ml-1 mr-1 mt-3 bg-aqua">
                <div class="col sm-1 mt-2 ml-2 mr-2 mb-1">

                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Nama </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control text-left" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $nama_penyewa ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Alamat </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control text-left" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $alamat_penyewa ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Tanggal</th>
                            <th class="text-center text-white">Nama Lapangan</th>
                            <th class="text-center text-white">Metode Bayar</th>
                            <th class="text-center text-white">Harga Sewa</th>
                            <th class="text-center text-white">Metode Bayar</th>
                            <th class="text-center text-white">Status</th>

                            <!-- <th class="text-center text-white">Foto</th> -->
                            <th class="text-center text-white" width="300px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penyewaan as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $this->Mglobal->tanggalindo($a->tgl_penyewaan) ?></td>
                                <td><?php echo $a->nama_lapangan . ' Jam ' . $a->jam ?></td>
                                <td><?php echo $a->pembayaran_sewa ?></td>
                                <td class="text-right"><?php echo $this->Mglobal->rupiah($a->harga_sewa) ?></td>
                                <td><?php if ($a->kd_penyewa == "") { ?>
                                        <button class="btn btn-info btn-sm mb-1"> <i class="fa fa-info mr-2"></i> Lunas</button>
                                    <?php } else { ?>
                                        <button class="btn btn-info btn-sm mb-1"> <i class="fa fa-close mr-2"></i> Kosong </button>
                                    <?php } ?>

                                </td>
                                <td>
                                    <?php if ($a->jumlah_bayar > 0) { ?>
                                        <!-- <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapussetting"> <i class="fa fa-trash mr-2"></i> Hapus Data</a> -->
                                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#booking<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-check-square-o mr-1"></i> Booking Lapangn</a>
                                    <?php } else { ?>
                                        <button class="btn btn-danger btn-sm mb-1"> <i class="fa fa-info mr-2"></i> Hutang</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($a->jumlah_bayar > 0) { ?>
                                        <!-- <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapussetting"> <i class="fa fa-trash mr-2"></i> Hapus Data</a> -->
                                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#booking<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-check-square-o mr-1"></i> Booking Lapangn</a>
                                    <?php } else { ?>
                                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#booking<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-check-square-o mr-1"></i> Bayar DP/ Pelunasan</a>
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
<?php foreach ($penyewaan as $a) : ?>

    <div class="modal fade" id="booking<?php echo $a->kd_penyewaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-futbol-o mr-2"></i> Form Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/penyewaan/sewauser/aksisewauser') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Kode penyewaan</label>
                            <input name="kd_penyewaan" type="text" class="form-control" readonly value="<?php echo $a->kd_penyewaan ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Pembayaran Dengan Transfer</label>
                            <select name="pembayaran_sewa" class="form-control" required>
                                <option value="">-- Pilih Pembayaran --</option>
                                <option value="Lunas <?php echo $a->harga_sewa ?>">Lunas <?php echo $a->harga_sewa ?></option>
                                <option value="DP <?php echo $a->harga_sewa / 2 ?>">DP 50% [ <?php echo $a->harga_sewa / 2 ?>]</option>

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Booking</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal -->
<div class="modal fade" id="hapussetting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-futbol-o mr-2"></i> Form Hapus Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/penyewaan/penyewaan/aksihapussetting') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Kode penyewaan</label>
                        <input name="kd_penyewaan" type="text" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_penyewaan", "tbl_penyewaan", "LAP") ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input name="tgl_penyewaan" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Lapangan</label>
                        <select name="kd_lapangan" class="form-control" required>

                            <option value="">-- Pilih Lapangan --</option>
                            <?php foreach ($lapangan as $l) : ?>
                                <option value="<?php echo $l->kd_lapangan ?>"><?php echo $l->nama_lapangan ?></option>
                            <?php endforeach ?>

                        </select>

                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>