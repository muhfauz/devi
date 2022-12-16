<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-user"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-user"></i> <?php echo $x1; ?></h4>
            <p>Data Table With Full Features</p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary bg-aqua-gradient mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua-gradient">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Kode detailbarang</th>
                            <th class="text-center text-white">Nama Barang</th>
                            <th class="text-center text-white">Ijin Edar</th>
                            <th class="text-center text-white" width="100px">Expired Date</th>
                            <th class="text-center text-white">Stok </th>
                            <!-- <th class="text-center text-white">Foto</th> -->
                            <th class="text-center text-white" width="300px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($detailbarang as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->kd_detailbarang ?></td>
                                <td><?php echo $a->nama_barang ?></td>
                                <td><?php echo $a->ijin_edar ?></td>
                                <td><?php echo date('d F Y', strtotime($a->ED)); ?></td>
                                <td><?php echo $a->stok_barang ?></td>
                                <!-- <td><img src="<?php echo base_url('assets/toko/images/detailbarang/') . $a->foto_detailbarang ?>" alt=""> -->
                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_detailbarang ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_detailbarang ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_detailbarang ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/master/detailbarang/aksitambahdetailbarang') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Kode detailbarang</label>
                        <input name="kd_detailbarang" type="text" class="form-control" readonly value="<?php echo $this->Mglobal->kode_otomatis("kd_detailbarang", "tbl_detailbarang", "DTL") ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <select name="kd_barang" id="" class="form-control" required>
                            <?php foreach ($barang as $b) : ?>
                                <option value="<?php echo $b->kd_barang ?>"><?php echo $b->nama_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ijin Edar</label>
                        <input name="ijin_edar" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">HNA Sbd</label>
                        <input name="hna_sbd" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input name="discount" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">LOT</label>
                        <input name="lot" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Expired Date</label>
                        <input name="ED" type="date" class="form-control" required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="">Foto detailbarang</label>
                        <input name="foto_detailbarang" type="file" class="form-control" required>
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
<?php foreach ($detailbarang as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_detailbarang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Detail Data detailbarang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Barang</th>
                            <td><?php echo $a->nama_barang ?></td>
                        </tr>
                        <tr>
                            <th>Ijin Edar</th>
                            <td><?php echo $a->ijin_edar ?></td>
                        </tr>
                        <tr>
                            <th>HNA SBD</th>
                            <td><?php echo $a->hna_sbd ?></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><?php echo $a->discount ?></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><?php echo $a->discount ?></td>
                        </tr>
                        <tr>
                            <th>Lot</th>
                            <td><?php echo $a->lot ?></td>
                        </tr>
                        <tr>
                            <th>Expired Date</th>
                            <td><?php echo date('d F Y', strtotime($a->ED)); ?></td>
                        </tr>
                        <!-- <tr>
                            <th>Foto detailbarang</th>
                            <td>
                                <img src="<?php echo base_url('assets/toko/images/detailbarang/') . $a->foto_detailbarang ?>" alt="">
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
<?php foreach ($detailbarang as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_detailbarang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/detailbarang/hapusdetailbarang') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_detailbarang" type="text" class="form-control" value="<?php echo $a->nama_detailbarang ?>" required> -->
                            <input name="kd_detailbarang" type="hidden" class="form-control" value="<?php echo $a->kd_detailbarang ?>" required>
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
<?php foreach ($detailbarang as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_detailbarang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-user-circle-o mr-2"></i> Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/detailbarang/aksieditdetailbarang') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select name="kd_barang" id="" class="form-control" required>
                                <option value="<?php echo $a->kd_barang ?>"><?php echo $a->nama_barang ?></option>
                                <option value="">--Pilih Nama Barang--</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?php echo $b->kd_barang ?>"><?php echo $b->nama_barang ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input name="kd_detailbarang" type="text" class="form-control" required value="<?php echo $a->kd_detailbarang ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Ijin Edar</label>
                            <input name="ijin_edar" type="text" class="form-control" required value="<?php echo $a->ijin_edar ?>">
                        </div>
                        <div class="form-group">
                            <label for="">HNA Sbd</label>
                            <input name="hna_sbd" type="text" class="form-control" required value="<?php echo $a->hna_sbd ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Discount</label>
                            <input name="discount" type="text" class="form-control" required value="<?php echo $a->discount ?>">
                        </div>
                        <div class="form-group">
                            <label for="">LOT</label>
                            <input name="lot" type="text" class="form-control" required value="<?php echo $a->lot ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Expired Date</label>
                            <input name="ED" type="date" class="form-control" required value="<?php echo $a->ED ?>">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Foto detailbarang</label>
                            <img class="form-control img-fluid mb-1" src="<?php echo base_url('assets/toko/images/detailbarang/') . $a->foto_detailbarang ?>" alt="">
                            <input name="foto_detailbarang" type="file" class="form-control" value="<?php echo $a->foto_detailbarang ?>">
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