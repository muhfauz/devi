<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-crosshairs"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-crosshairs"></i> <?php echo $x1; ?></h4>
            <p><?php echo $x4 ?></p>
            <div class="row ml-1 mr-1 mt-3 bg-aqua">
                <div class="col sm-1 mt-2 ml-2 mr-2">
                    <!-- <form class="form" action="<?php echo base_url('admin/transaksi/penjualan/simpanpenjualan') ?>" method="POST"> -->
                    <!-- <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Luas</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control text-right" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value=" m2" required>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Total Aset aset </label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <input class="form-control text-right" id="namaoutlet" placeholder="Nama outlet" type="text" value="Rp. <?php echo number_format($total_aset) ?>" readonly>
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
                            <th class="text-center text-white align-middle" width="10px">No</th>
                            <th class="text-center text-white align-middle">Nama Barang </th>
                            <th class="text-center text-white align-middle">Kode Barang</th>
                            <th class="text-center text-white align-middle">NUP</th>
                            <th class="text-center text-white align-middle">Tahun Perolehan</th>
                            <th class="text-center text-white align-middle">Merk/Type</th>
                            <th class="text-center text-white align-middle">Nilai </th>
                            <th class="text-center text-white align-middle">Keterangan</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($aset as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->nama_jenisaset ?></td>
                                <td><?php echo $a->kd_barang ?></td>
                                <td><?php echo $a->nup_aset ?></td>
                                <td><?php echo $this->Mglobal->tahunsaja($a->tahunperolehan_aset) ?></td>
                                <td><?php echo $a->nama_aset ?></td>
                                <td class="text-right"><?php echo $this->Mglobal->rupiah($a->nilaiperolehan_aset) ?></td>
                                <td><?php echo $a->ket_kategori ?></td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_aset ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a>
                                    <!-- <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_aset ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_aset ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a> -->
                                </td>
                                <!-- <td><img src="<?php echo base_url('assets/toko/images/aset/') . $a->foto_aset ?>" alt="">
                                </td> -->

                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
            <!-- jumlah -->
            <div class="row ml-1 mr-1 mt-3 bg-aqua ">
                <div class="col-6 sm-8 mt-2 ml-2 mr-2">
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Total aset </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control" name="kd_penjualan" id="kd_penjualan" placeholder="No Tranaksi" type="text" readonly value="Rp. <?php echo number_format($total_aset) ?>,00" required>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 sm-8 mt-2 ml-2 mr-2 mb-2">
                    <a href="<?php echo base_url('admin/laporan/laset') ?>">
                        <button class="btn btn-secondary"> <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i></button>
                    </a>
                    <?php if ($total_aset > 0) : ?>
                        <a href="" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#printdata"> <i class="fa fa-file-pdf-o mr-2"></i> Print </a>
                    <?php endif; ?>



                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- modal detail -->
<?php foreach ($aset as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_aset ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-book mr-2"></i> Detail Data aset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama aset</th>
                            <td><?php echo $a->nama_aset ?></td>
                        </tr>

                        <tr>
                            <th>Foto aset</th>
                            <td>
                                <img src="<?php echo base_url('gambar/') . $a->foto_aset ?>" alt="" height="650" width="650">
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



<div class="modal fade" id="printdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-file-pdf-o mr-2"></i> Cetak Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/laporan/laset/cetakasetsemua') ?>" method="post">
                    <div class="form-group">
                        Cetak Data ini ?
                        <!-- <label for="">Nama</label>
                  <input name="nama_aset" type="text" class="form-control" value="<?php echo $a->nama_aset ?>" required> -->
                        <!-- <input name="kd_aset" type="hidden" class="form-control" value="<?php echo $a->kd_aset ?>" required> -->
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