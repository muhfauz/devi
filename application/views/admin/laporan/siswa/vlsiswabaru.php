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

                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#bydate" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-child mr-2" aria-hidden="true"></i> Siswa By Kelas
                </button>
            </p>

            <div class="collapse" id="bydate">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-outline">
                                <div class="card-header bg-blue">
                                    <h5 class="text-white text-lg-center m-b-0">Pilih Tingkat dan Kelas</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('admin/laporan/lsiswa/kelas') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tingkat</label>

                                            <select name="kd_tingkat" class="form-control" id="">
                                                <?php foreach ($tingkat as $t) : ?>
                                                    <option value="<?php echo $t->kd_tingkat ?>"><?php echo $t->tingkat ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Kelas</label>
                                            <select name="kd_kelas" class="form-control" id="">
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

<!-- Main content -->





<!-- /.content -->

<!-- /.content-wrapper -->

<!-- Modal -->