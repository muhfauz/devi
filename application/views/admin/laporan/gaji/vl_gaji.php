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
                <!-- <a href="" class="btn btn-primary bg-aqua mb-2" data-toggle="modal" data-target="#tambahdata"> <i class="fa fa-plus-square mr-2"></i> Tambah gaji</a> -->
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class=" bg-aqua ">
                        <tr>
                            <th class="text-center text-white" width="10px">No</th>
                            <th class="text-center text-white">Bulan</th>
                            <th class="text-center text-white">Tahun</th>
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

                                    <a href="" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#lihatdata<?php echo $a->kd_gaji ?>"> <i class="fa fa-superpowers mr-2"></i>Lihat Gaji</a>

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

<!-- modal detail -->
<?php foreach ($gaji as $a) : ?>
    <div class="modal fade" id="settingdata<?php echo $a->kd_gaji ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-cog mr-2"></i> Setting Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/absensi/settingabsensi') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin akan setting data ini ?
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
<?php foreach ($gaji as $a) : ?>
    <div class="modal fade" id="lihatdata<?php echo $a->kd_gaji ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-superpowers mr-2"></i> Lihat Gaji <?php echo $a->bulan_gaji ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/laporan/lgaji/lihatgajix') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Ingin Lihat Data Ini ?
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
<!-- unsetting -->
<?php foreach ($gaji as $a) : ?>
    <div class="modal fade" id="unsettingdata<?php echo $a->kd_gaji ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa fa-trash mr-2"></i> UnSetting Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/transaksi/absensi/unsettingabsensi') ?>" method="post">
                        <div class="form-group">
                            Apakah Anda Yakin Unsetting data ?
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