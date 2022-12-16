<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"> <i class="fa fa-slack"></i> <?php echo $x1; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2; ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x3; ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">


        <div class="info-box">
            <h4 class="text-primary"><i class="fa fa-slack"></i> <?php echo $x1; ?></h4>
            <p><?php echo $nama_perush; ?></p>
            <div class="table-responsive">
                <?php echo $this->session->userdata('pesan'); ?>
                <a href="" class="btn btn-primary bg-aqua mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah gaji</a>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class=" bg-aqua ">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Bulan</th>
                            <th class="text-center text-white">Tahun</th>
                            <th class="text-center text-white">Status</th>
                            <th class="text-center text-white" width="0px"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($gaji as $a) :  ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?php echo $no++; ?></td>
                                <td><?php echo $a->bulan_gaji ?></td>
                                <td><?php echo $a->tahun_gaji ?></td>
                                <td class="text-center">
                                    <?php if ($a->status_gaji == 'aktif') { ?>
                                        <button class="btn btn-sm btn-primary"><i class="fa fa-check mr-2" aria-hidden="true"></i>Aktif</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-secondary ">Tidak Aktif</button>
                                    <?php } ?>
                                </td>

                                <td class="float-right">
                                    <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#datadetail<?php echo $a->kd_gaji ?>"> <i class="fa fa-info mr-2"></i> Detail</a>
                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editdata<?php echo $a->kd_gaji ?>"> <i class="fa fa-edit mr-2"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#hapusdata<?php echo $a->kd_gaji ?>"> <i class="fa fa-trash mr-2"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-slack-circle-o mr-2"></i> Tambah gaji</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/transaksi/gaji/aksitambahgaji') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Bulan </label>
                        <input name="kd_gaji" type="hidden" class="form-control" value="<?php echo $this->Mglobal->kode_otomatis('kd_gaji', 'tbl_gaji', 'GAJ') ?>" required>
                        <select name="bulan_gaji" id="" class="form-control" required>
                            <option value="">Pilih </option>
                            <?php foreach ($bulan as $b) { ?>
                                <option value="<?= $b->nama_bulan ?>"><?= $b->nama_bulan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <select name="tahun_gaji" id="" class="form-control" required>
                            <option value="">Pilih </option>
                            <?php for ($i = 2020; $i <= 2025; $i++) { ?>

                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status </label>
                        <select name="status_gaji" id="" class="form-control" required>
                            <option value="aktif" selected>Aktif</option>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="noaktif">Tidak Aktif</option>

                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o mr-2" aria-hidden="true"></i>Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Simpan</button>
            </div>
            </form>
            <script>
                CKEDITOR.replace('isi_gaji');
            </script>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php foreach ($gaji as $a) : ?>
    <div class="modal fade" id="datadetail<?php echo $a->kd_gaji ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-slack-circle-o mr-2"></i> Detail gaji Kami</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Bulan</th>
                            <td><?php echo $a->bulan_gaji ?></td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td><?php echo $a->tahun_gaji ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?php echo $a->status_gaji ?></td>
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
<?php foreach ($gaji as $a) : ?>


    <div class="modal fade" id="hapusdata<?php echo $a->kd_gaji ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-slack-circle-o mr-2"></i> Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/gaji/hapusgaji') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan menghapus data ini ?
                            <!-- <label for="">Nama</label>
                  <input name="nama_admin" type="text" class="form-control" value="<?php echo $a->nama_admin ?>" required> -->
                            <input name="kd_gaji" type="hidden" class="form-control" value="<?php echo $a->kd_gaji ?>" required>
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
<?php foreach ($gaji as $a) : ?>


    <div class="modal fade" id="editdata<?php echo $a->kd_gaji ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-aqua">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-slack-circle-o mr-2"></i> Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/gaji/aksieditgaji') ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Bulan </label>
                            <input name="kd_gaji" type="hidden" class="form-control" value="<?php echo $a->kd_gaji ?>" required>
                            <select name="bulan_gaji" id="" class="form-control" required>
                                <option value="<?= $a->bulan_gaji ?>" selected><?= $a->bulan_gaji ?></option>
                                <option value="">Pilih </option>
                                <?php foreach ($bulan as $b) { ?>
                                    <option value="<?= $b->nama_bulan ?>"><?= $b->nama_bulan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun </label>
                            <select name="tahun_gaji" id="" class="form-control" required>
                                <option value="<?php echo $a->tahun_gaji ?>" selected><?php echo $a->tahun_gaji ?></option>
                                <option value="">Pilih</option>
                                <?php for ($i = 2020; $i <= 2025; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status </label>
                            <select name="status_gaji" id="" class="form-control" required>
                                <option value="<?php echo $a->status_gaji ?>"><?php echo $a->status_gaji ?></option>
                                <option value="aktif" selected>Aktif</option>
                                <option value="">Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="noaktif">Tidak Aktif</option>

                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save mr-2"></i>Simpan</button>
                </div>
                </form>
                <script>
                    CKEDITOR.replace('isi_gaji2');
                </script>

            </div>
        </div>
    </div>
<?php endforeach; ?>