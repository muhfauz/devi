<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-graduation-cap"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-graduation-cap"></i> <?php echo $x1; ?></h4>
            <div class="row ml-1 mr-1 mt-3 bg-blue-gradient ">
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
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Status </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" name="kd_outlet" id="kd_outlet" placeholder="Nama outlet" type="hidden">
                                <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $status ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Kelas </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" name="kd_outlet" id="kd_outlet" placeholder="Nama outlet" type="hidden">
                                <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $tingkat . ' ' . $kelas ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <p> <?php echo $x4; ?></p> -->
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <table id="examplex" class="table table-bordered table-striped table-hover mt-3">
                    <thead class="bg-blue">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Nama</th>
                            <th class="text-center text-white">Kelas</th>
                            <th class="text-center text-white">Bulan</th>
                            <th class="text-center text-white">Besar SPP</th>
                            <th class="text-center text-white">Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalspp = 0;
                        $no = 1;
                        foreach ($sppdetail as $a) :
                            $totalspp = $totalspp + $a->besar_spp;
                        ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->nama_siswa ?></td>
                                <td><?php echo $a->tingkat . ' ' . $a->kelas ?></td>
                                <td><?php echo $a->bulan ?></td>
                                <td>Rp. <?php echo number_format($a->besar_spp) ?></td>
                                <td><?php if ($a->tgl_bayar == '0000-00-00') { ?>
                                        <span class="badge badge-primary text-center">Belum Bayar</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger text-center">Lunas, dibayar tanggal <?php echo $this->Mglobal->tanggalindo($a->tgl_bayar) . ' diterima oleh ' . $a->nama_admin ?></span>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php endforeach ?>

                </table>
            </div>
            <div class="row ml-1 mr-1 mt-3 bg-blue-gradient ">
                <div class="col-6 sm-8 mt-2 ml-2 mr-2">
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Jumlah SPP </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value="Rp. <?php echo number_format($totalspp); ?>" required>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 sm-8 mt-2 ml-2 mr-2 mb-2">
                    <a href="<?php echo base_url('admin/laporan/lspp') ?>">
                        <button class="btn btn-secondary"> <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i></button>
                    </a>
                    <?php if ($totalspp > 0) { ?>
                        <a href="<?php echo base_url('admin/laporan/lspp/laporan_pdf_spp_kelas') ?>">
                            <button class="btn btn-secondary"><i class="fa fa-print mr-2" aria-hidden="true"></i></button>
                        </a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>