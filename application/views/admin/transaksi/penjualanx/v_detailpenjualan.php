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
    <div class="content">
        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-users"></i> <?php echo $x1; ?></h4>
            <?php foreach ($penjualan as $p) { ?>
                <div class="row ml-1 mr-1 bg-blue-gradient ">
                    <div class="col sm-1 mt-2 ml-2 mr-2 mt-3">
                        <form class="form" action="<?php echo base_url('admin/transaksi/pembelian/simpanpembelian') ?>" method="POST">

                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-4 control-label ">No Transaksi</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_pembelian" id="kd_pembelian" placeholder="No Tranaksi" type="text" readonly value="<?php echo $kd_penjualan; ?>">
                                        <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-4 control-label">Nama outlet*</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_outlet" id="kd_outlet" placeholder="Nama outlet" type="hidden">
                                        <input class="form-control" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $p->nama_outlet ?>" readonly>
                                        <div class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="mt-2 col sm-1 mr-2 mb-0 mt-3">
                        <div class="form-group row">
                            <label for="web" class="col-sm-3 control-label">Tanggal Pembelian</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="tgl_pembelian" id="exampleInputuname3" placeholder="" type="text" value="<?php echo date('d F Y', strtotime($p->tgl_penjualan)) ?>" readonly>
                                    <div class="input-group-addon"><i class="fa fa-themeisle" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword5" class="col-sm-3 control-label">Nomor Faktur</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="no_fakturpembelian" id="uang_mukazss" placeholder="Nomor Faktur Pembelian" type="text" value="<?php echo $p->no_fakturpenjualan ?>" readonly>
                                    <input class="form-control" name="total_pembelian" id="total_pembelian" placeholder="Total Bayar" type="hidden">
                                    <div class="input-group-addon"><i class="fa fa-google-wallet" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Main content -->


    <div class="content">
        <div class="info-box">

            <!-- <h4 class="text-primary"><i class="fa fa-users"></i> <?php echo $x1; ?></h4> -->

            <!-- <form> -->

            <!-- </form> -->
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <?php echo $this->session->userdata('pesanx'); ?>
                <!-- <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a> -->
                <table id="example1x" class="table table-bordered table-striped table-hover">
                    <thead class="bg-blue">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Kode barang</th>
                            <th class="text-center text-white">Nama barang</th>
                            <th class="text-center text-white">Jumlah </th>
                            <th class="text-center text-white">Expired Date</th>
                            <th class="text-center text-white">Harga </th>
                            <th class="text-center text-white">Total bayar </th>


                        </tr>
                    </thead>
                    <tbody id="tampilkanbarang">
                        <?php $no = 0;

                        foreach ($detailpenjualan as $a) {
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $a->kd_barang ?></td>
                                <td><?php echo $a->nama_barang ?></td>
                                <td><?php echo $a->jumlah_penjualan ?></td>
                                <td><?php echo date('d F Y', strtotime($a->ED)) ?></td>
                                <td>Rp. <?php echo number_format($a->hargajual_barang) ?></td>
                                <td class="float-right">Rp.
                                    <?php echo number_format($a->total_bayarpenjualan, '0', '.', '.') ?>

                                </td>

                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="font-weight-bold">Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td class="text-right font-weight-bold ">Rp. <?php echo number_format($this->db->query("select sum(total_bayarpenjualan) as total from tbl_detailpenjualan where kd_penjualan='$kd_penjualan'")->row()->total) ?></td>
                        </tr>


                    </tbody>

                </table>


                <!-- <button class="btn btn-facebook tombol_simpan" type="submit">Simpan</button> -->




            </div>
        </div>

    </div>

    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->