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
            <div class="row ml-1 mr-1 mt-3 bg-aqua">
                <div class="col sm-1 mt-2 ml-2 mr-2 mb-1">

                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Tanggal </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control text-left" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $this->Mglobal->tanggalindo($this->session->userdata('tgl_penyewaan')) ?>" readonly>
                                <div class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Lapangan </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input class="form-control text-left" id="namaoutlet" placeholder="Nama outlet" type="text" value="<?php echo $this->session->userdata('nama_lapangan') ?>" readonly>
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
                            <th class="text-center text-white" width="10px">No</th>
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
                                <td><?php echo $a->jam ?></td>
                                <td class="text-right"><?php echo $this->Mglobal->rupiah($a->harga_sewa) ?></td>
                                <td><?php if ($a->kd_penyewa == "") { ?>
                                        <button class="btn btn-info btn-sm mb-1"> <i class="fa fa-info mr-2"></i> Tersedia</button>
                                    <?php } else { ?>
                                        <button class="btn btn-danger btn-sm mb-1"> <i class="fa fa-close mr-2"></i> Kosong </button>
                                    <?php } ?>

                                </td>
                                <td>
                                    <?php if ($a->kd_penyewa == "") { ?>
                                        <!-- <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapussetting"> <i class="fa fa-trash mr-2"></i> Hapus Data</a> -->
                                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#booking<?php echo $a->kd_penyewaan ?>"> <i class="fa fa-check-square-o mr-1"></i> Booking Lapangn</a>
                                    <?php } ?>
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