<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"><i class="fa fa-user mr-2" aria-hidden="true"></i><?php echo $x1 ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $x2 ?></li>
            <li><i class="fa fa-angle-right"></i> <?php echo $x1 ?></li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="info-box">
            <p><?php echo $this->session->userdata('pesan') ?></p>
            <!-- <h4 class="text-black"><?php echo $x1 ?></h4> -->
            <?php foreach ($penyewa as $p) :  ?>
                <form action="<?php echo base_url('penyewa/pengaturan/datadiri/aksieditdatadiri') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label>Nama </label>
                                <input class="form-control" name="nama_penyewa" id="basicInput" type="text" value="<?php echo $p->nama_penyewa ?>">
                            </fieldset>
                        </div>



                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat_penyewa" id="basicInput" type="text" value="<?php echo $p->alamat_penyewa ?>">
                            </fieldset>
                        </div>
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label>Nomor HP</label>
                                <input class="form-control" name="nohp_penyewa" id="basicInput" type="text" value="<?php echo $p->nohp_penyewa ?>">
                            </fieldset>
                        </div>

                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label for="">Foto</label>
                                <br>
                                <img width="100" height="100" src="<?php echo base_url('gambar/') . $p->gambar_penyewa ?>" alt="">
                                <br>
                                <input name="gambar_penyewa" type="file" class="form-control" value="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Simpan</button>
                            </fieldset>
                        </div>
                    </div>



                </form>
            <?php endforeach; ?>

        </div>
        <!-- Main row -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->