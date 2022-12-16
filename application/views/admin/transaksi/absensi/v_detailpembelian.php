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
            <?php foreach ($pembelian as $p) { ?>
                <div class="row ml-1 mr-1 bg-blue-gradient ">
                    <div class="col sm-1 mt-2 ml-2 mr-2 mt-3">
                        <form class="form" action="<?php echo base_url('admin/transaksi/pembelian/simpanpembelian') ?>" method="POST">

                            <div class="form-group row">
                                <label for="exampleInputuname3" class="col-sm-4 control-label ">No Transaksi</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_pembelian" id="kd_pembelian" placeholder="No Tranaksi" type="text" readonly value="<?php echo $kd_pembelian; ?>">
                                        <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail3" class="col-sm-4 control-label">Nama Suplier*</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control" name="kd_suplier" id="kd_suplier" placeholder="Nama suplier" type="hidden">
                                        <input class="form-control" id="namasuplier" placeholder="Nama Suplier" type="text" value="<?php echo $p->nama_suplier ?>" readonly>
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
                                    <input class="form-control" name="tgl_pembelian" id="exampleInputuname3" placeholder="" type="text" value="<?php echo date('d F Y', strtotime($p->tgl_pembelian)) ?>" readonly>
                                    <div class="input-group-addon"><i class="fa fa-themeisle" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword5" class="col-sm-3 control-label">Nomor Faktur</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" name="no_fakturpembelian" id="uang_mukazss" placeholder="Nomor Faktur Pembelian" type="text" value="<?php echo $p->no_fakturpembelian ?>" readonly>
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
                            <th class="text-center text-white">Ijin Edar</th>
                            <th class="text-center text-white">Expired Date</th>
                            <th class="text-center text-white">Banyak</th>
                            <th class="text-center text-white">Harga </th>
                            <th class="text-center text-white">Total bayar </th>


                        </tr>
                    </thead>
                    <tbody id="tampilkanbarang">
                        <?php $no = 0;

                        foreach ($detailpembelian as $a) {
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $a->kd_barang ?></td>
                                <td><?php echo $a->nama_barang ?></td>
                                <td><?php echo $a->ijin_edar ?></td>
                                <td><?php echo date('d F Y', strtotime($a->ED)) ?></td>
                                <td><?php echo $a->jumlah_pembelian ?></td>
                                <td>Rp. <?php echo number_format($a->hna_std) ?></td>
                                <td class="float-right">Rp.
                                    <?php echo number_format($a->total_bayar, '0', '.', '.') ?>

                                </td>
                                <!-- <td>
                                    <a href="#" class="btn btn-danger btn-sm mb-1 hapus" kd_detailpembeliantemp="<?php echo $a->kd_detailpembeliantemp ?>"> <i class="fa fa-trash mr-2"></i> Batal</a>
                                    <a href="#" class="btn btn-info btn-sm mb-1 edit" kd_detailpembeliantemp="<?php echo $a->kd_detailpembeliantemp ?>" kd_barang="<?php echo $a->kd_barang ?>" nama_barang="<?php echo $a->nama_barang ?>" hna_std="<?php echo $a->hna_std ?>" jumlah_pembelian="<?php echo $a->jumlah_pembelian ?>" ED="<?php echo $a->ED ?>" ijin_edar="<?php echo $a->ijin_edar ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>

                                </td> -->
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="font-weight-bold">Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right font-weight-bold ">Rp. <?php echo number_format($this->db->query("select sum(total_bayar) as total from tbl_detailpembelian where kd_pembelian='$kd_pembelian'")->row()->total) ?></td>
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