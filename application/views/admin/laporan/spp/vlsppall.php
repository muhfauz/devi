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
            <h4 class="text-primary"><i class="fa fa-graduation-cap"></i> <?php echo $x1; ?></h4>
            <p>
                <a class="btn btn-primary all" href="<?php echo base_url('admin/laporan/lsiswa/lihat') ?>">
                    <i class="fa fa-child mr-2 semua" aria-hidden="true"></i>Semua Siswa
                </a>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#byall" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-child mr-2" aria-hidden="true"></i> SPP By ALL
                </button>

                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#bytingkat" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-child mr-2" aria-hidden="true"></i> SPP by Tingkat
                </button>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#bykelas" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-child mr-2" aria-hidden="true"></i> SPP by Kelas
                </button>
            </p>

            <div class="collapse" id="byall">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-outline">
                                <div class="card-header bg-blue">
                                    <h5 class="text-white text-lg-center m-b-0">Pilih Bulan</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('admin/laporan/lspp/all') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bulan</label>

                                            <select name="bulan" class="form-control" id="" required>
                                                <option value="">- Pilih Bulan -</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                                <option value="Semua">Semua Bulan</option>


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select name="status" class="form-control" id="" required>
                                                <option value="">- Pilih Status Pembayaran -</option>
                                                <option value="Lunas">Lunas</option>
                                                <option value="Hutang">Hutang</option>
                                                <option value="Semua">Semua</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-telegram mr-2" aria-hidden="true"></i>Lihat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="collapse" id="bytingkat">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-outline">
                                <div class="card-header bg-blue">
                                    <h5 class="text-white text-lg-center m-b-0">Pilih Bulan, Status dan Tingkat</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('admin/laporan/lspp/tingkat') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bulan</label>
                                            <select name="bulan" class="form-control" id="" required>
                                                <option value="">- Pilih Bulan -</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                                <option value="Semua">Semua Bulan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select name="status" class="form-control" id="" required>
                                                <option value="">- Pilih Status -</option>
                                                <option value="Lunas">Lunas</option>
                                                <option value="Hutang">Hutang</option>
                                                <option value="Semua">Semua</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tingkat</label>
                                            <select name="kd_tingkat" class="form-control" id="" required>
                                                <?php foreach ($tingkat as $t) : ?>
                                                    <option value="<?php echo $t->kd_tingkat ?>"><?php echo $t->tingkat ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-telegram mr-2" aria-hidden="true"></i>Lihat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="collapse" id="bykelas">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-outline">
                                <div class="card-header bg-blue">
                                    <h5 class="text-white text-lg-center m-b-0">Pilih Bulan, Status dan Kelas</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('admin/laporan/lspp/kelas') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bulan</label>
                                            <select name="bulan" class="form-control" id="" required>
                                                <option value="">- Pilih Bulan -</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                                <option value="Semua">Semua Bulan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select name="status" class="form-control" id="" required>
                                                <option value="">- Pilih Status -</option>
                                                <option value="Lunas">Lunas</option>
                                                <option value="Hutang">Hutang</option>
                                                <option value="Semua">Semua</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tingkat</label>
                                            <select name="kd_tingkat" class="form-control" id="" required>
                                                <option value="">- Pilih Tingkat -</option>
                                                <?php foreach ($tingkat as $t) : ?>
                                                    <option value="<?php echo $t->kd_tingkat ?>"><?php echo $t->tingkat ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Kelas</label>
                                            <select name="kd_kelas" class="form-control" id="" required>
                                                <option value="">- Pilih Kelas -</option>
                                                <?php foreach ($kelas as $k) : ?>
                                                    <option value="<?php echo $k->kd_kelas ?>"><?php echo $k->kelas ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-telegram mr-2" aria-hidden="true"></i>Lihat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>