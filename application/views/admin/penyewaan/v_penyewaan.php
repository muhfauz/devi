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
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Tanggal</th>
                            <th class="text-center text-white">Lapangan</th>
                            <th class="text-center text-white">Jam</th>
                            <th class="text-center text-white">Harga Sewa</th>
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
                                <td><?php echo $a->nama_lapangan ?></td>
                                <td><?php echo $a->jam ?></td>
                                <td class="text-right"><?php echo $this->Mglobal->rupiah($a->harga_sewa) ?></td>
                                <td><?php if ($a->kd_penyewa == "") { ?>

                                        <button class="btn btn-info btn-sm mb-1"> <i class="fa fa-info mr-2"></i> Kosong</button>
                                    <?php } else { ?>
                                        <button class="btn btn-danger btn-sm mb-1"> <i class="fa fa-close mr-2"></i> Kosong</button>
                                    <?php } ?>
                                </td>


                                <!-- <td><img src="<?php echo base_url('assets/toko/images/penyewaan/') . $a->foto_penyewaan ?>" alt=""> -->
                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-info mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-futbol-o mr-2"></i> Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/penyewaan/penyewaan/aksitambahpenyewaan') ?>" method="post" enctype="multipart/form-data">
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

<!-- modal detail -->
<?php foreach ($penyewaan as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_penyewaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-futbol-o mr-2"></i> Detail Data penyewaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode penyewaan</th>
                            <td><?php echo $a->kd_penyewaan ?></td>
                        </tr>
                        <tr>
                            <th>Nama penyewaan</th>
                            <td><?php echo $a->nama_penyewaan ?></td>
                        </tr>



                        <!-- <tr>
                            <th>Foto penyewaan</th>
                            <td>
                                <img src="<?php echo base_url('assets/toko/images/penyewaan/') . $a->foto_penyewaan ?>" alt="">
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
<?php foreach ($penyewaan as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_penyewaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-futbol-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/penyewaan/hapuspenyewaan') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_penyewaan" type="text" class="form-control" value="<?php echo $a->nama_penyewaan ?>" required> -->
                            <input name="kd_penyewaan" type="hidden" class="form-control" value="<?php echo $a->kd_penyewaan ?>" required>
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
<?php foreach ($penyewaan as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_penyewaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-futbol-o mr-2"></i> Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/master/penyewaan/aksieditpenyewaan') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama penyewaan</label>
                            <input name="nama_penyewaan" type="text" class="form-control" value="<?php echo $a->nama_penyewaan ?>" required>
                            <input name="kd_penyewaan" type="hidden" class="form-control" value="<?php echo $a->kd_penyewaan ?>" required>
                        </div>





                        <!-- <div class="form-group">
                            <label for="">Foto penyewaan</label>
                            <img class="form-control img-fluid mb-1" src="<?php echo base_url('assets/toko/images/penyewaan/') . $a->foto_penyewaan ?>" alt="">
                            <input name="foto_penyewaan" type="file" class="form-control" value="<?php echo $a->foto_penyewaan ?>">
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