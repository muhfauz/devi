<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1 class="text-black"><i class="fa fa-key mr-2" aria-hidden="true"></i><?php echo $x1 ?></h1>
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
            <?php foreach ($admin as $p) :  ?>
                <form action="<?php echo base_url('admin/pengaturan/gantipassadmin/aksigantipassword') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label>Password Lama </label>
                                <input class="form-control" name="password_lama" id="basicInput" type="password" value="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label>Password Baru </label>
                                <input class="form-control" name="password_baru" id="basicInput" type="password" value="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label>Konfirmasi Password </label>
                                <input class="form-control" name="konfirmasipassword_baru" id="basicInput" type="password" value="">
                            </fieldset>
                        </div>

                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Simpan</button>
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