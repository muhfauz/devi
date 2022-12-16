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
            <!-- <p> <?php echo $x4; ?></p> -->
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <!-- <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a> -->
                <!-- <a href="<?php echo base_url('admin/pembelian/pembelian/tambahpembelian') ?>" class="btn btn-primary mb-2"> <i class="fa fa-plus-square mr-2"></i> pembelian Baru</a> -->
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-blue">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Kode pembelian</th>
                            <th class="text-center text-white">No Faktur</th>
                            <th class="text-center text-white">Nama suplier</th>
                            <th class="text-center text-white">Alamat</th>
                            <th class="text-center text-white">Tanggal Selesai</th>
                            <th class="text-center text-white">Total Bayar</th>
                            >
                            <!-- <th class="text-center text-white">Foto 1</th>
                            <th class="text-center text-white">Foto 2</th> -->
                            <th class="text-center text-white" width="300px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pembelian as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->kd_pembelian ?></td>
                                <td><?php echo $a->no_fakturpembelian ?></td>
                                <td><?php echo $a->nama_suplier ?></td>
                                <td><?php echo $a->alamat_suplier ?></td>
                                <td><?php echo date('d F Y', strtotime($a->tgl_pembelian)) ?></td>

                                <td>Rp. <?php echo number_format($a->total_pembelian) ?></td>


                                <td class="float-left">
                                    <!-- <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_pembelian ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a> -->

                                    <a href="<?php echo base_url('admin/transaksi/pembelian/detailpembelian/') . $a->kd_pembelian; ?>" class="btn btn-primary btn-sm mb-1"> <i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                                    <a href="<?php echo base_url('admin/transaksi/pembelian/editpembelian/') . $a->kd_pembelian; ?>" class="btn btn-info btn-sm mb-1"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_pembelian ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
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
<?php foreach ($pembelian as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_pembelian ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/pembelian/hapuspembelian') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_suplier" type="text" class="form-control" value="<?php echo $a->nama_suplier ?>" required> -->
                            <input name="kd_pembelian" type="hidden" class="form-control" value="<?php echo $a->kd_pembelian ?>" required>
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
<?php foreach ($pembelian as $a) : ?>


    <div class="modal fade" id="selesaidata<?php echo $a->kd_pembelian ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-facebook text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-check mr-2"></i> pembelian Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/pembelian/pembelian/pembelianselesai') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin tranasksi sudah selesai ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_suplier" type="text" class="form-control" value="<?php echo $a->nama_suplier ?>" required> -->
                            <input name="kd_pembelian" type="hidden" class="form-control" value="<?php echo $a->kd_pembelian ?>" required>
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