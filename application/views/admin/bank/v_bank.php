<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-address-card"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-address-card"></i> <?php echo $x1; ?></h4>
            <!-- <p>Data Table With Full Features</p> -->
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah Data</a>

                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="bg-aqua">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Nama</th>
                            <th class="text-center text-white">Rek</th>

                            <th class="text-center text-white">Dibuat Oleh</th>
                            <th class="text-center text-white" width="300px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bank as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>

                                <td><?php echo $a->nama_bank ?></td>
                                <td><?php echo $a->no_bank ?></td>
                                <td><?php echo $a->nama_admin ?></td>
                                <!-- <td><img src="<?php echo base_url('assets/toko/images/bank/') . $a->foto_bank ?>" alt=""> -->
                                </td>
                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_bank ?>"> <i class="fa fa-plus-square mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_bank ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_bank ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-address-card-circle-o mr-2"></i> Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="bankjs" action="<?php echo base_url('admin/lowongan/bank/aksitambahbank') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Nama bank</label>
                        <input id="nama_bank" name="nama_bank" type="text" class="form-control" required>
                        <input id="kd_bank" name="kd_bank" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_bank', 'tbl_bank', 'BANK'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="">No Rekening</label>
                        <input name="no_bank" type="text" class="form-control" required>
                    </div>





                    <!-- <div class="form-group">
                        <label for="">Foto bank</label>
                        <input name="foto_bank" type="file" class="form-control" required>
                        <span class="text-red font-italic text-sm-left">Gambar harus berukuran 370 x 240px untuk tampilan terbaik</span>
                    </div> -->



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php foreach ($bank as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_bank ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-address-card-circle-o mr-2"></i> Detail Data bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama bank</th>
                            <td><?php echo $a->nama_bank ?></td>
                        </tr>
                        <!-- <tr>
                            <th>Foto bank</th>
                            <td>
                                <img src="<?php echo base_url('assets/toko/images/bank/') . $a->foto_bank ?>" alt="">
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
<?php foreach ($bank as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_bank ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-address-card-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/lowongan/bank/hapusbank') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_bank" type="text" class="form-control" value="<?php echo $a->nama_bank ?>" required> -->
                            <input name="kd_bank" type="hidden" class="form-control" value="<?php echo $a->kd_bank ?>" required>
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
<?php foreach ($bank as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_bank ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-address-card-circle-o mr-2"></i> Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/lowongan/bank/aksieditbank') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama bank</label>
                            <input name="nama_bank" type="text" class="form-control" value="<?php echo $a->nama_bank ?>" required>
                            <input name="kd_bank" type="hidden" class="form-control" value="<?php echo $a->kd_bank ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Rekening</label>
                            <input name="no_bank" type="text" class="form-control" value="<?php echo $a->no_bank ?>" required>
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